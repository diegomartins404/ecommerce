<?php

namespace App\Domain\Infrastructure\Repository;

use App\Domain\Model\User;
use App\Domain\Repository\UserRepository;
use PDO;

class PdoUserRepository implements UserRepository
{
    private PDO $connection;
    const TABLE = 'tb_users';
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): bool
    {
        if($this->getId() === null){
            return this->insert($user);
        }
        return $this->update($user);
    }

    public function insert(User $user): bool
    {
        $insertQuery = 'INSERT INTO ' . SELF::TABLE . ' (nome, email, senha) VALUES (:name, :email, :password)';
        $stmt = $this->connection->prepare($insertQuery);
        $stmt->bindValue('name', $user->getId());
        $stmt->bindValue('email', $user->getEmail());
        $stmt->bindValue('password', $user->getSenha());

        return $stmt->execute();
    }

    public function update(User $user): bool
    {
        $updateQuery = "UPDATE " . SELF::TABLE . " SET nome = :name, email = :email, senha = :password";
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue('name', $user->getNome());
        $stmt->bindValue('email', $user->getEmail());
        $stmt->bindValue('password', $user->getSenha());
        return $stmt->execute();
    }

    public function remove($id): bool
    {
        $deleteQuery = "DELETE FROM " . SELF::TABLE . " WHERE id = :id";
        $stmt = $this->connection->prepare($deleteQuery);
        $stmt->bindValue('id', $id);
        return $stmt->execute();
    }

    public function hydrateUserList(\PDOStatement $stmt): array
    {
        $usersDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userList = [];
        foreach ($usersDataList as $userData) {
            $userList[] = new User(
                $userData['id'],
                $userData['name'],
                $userData['email'],
                $userData['password']
            );
        }
        return $userList;
    }

    public function bringByEmail($email): User
    {
        $bringByEmailQuery = "SELECT * FROM " . SELF::TABLE . " WHERE email = :email";
        $stmt = $this->connection->prepare($bringByEmailQuery);
        $stmt->bindValue('email', $email);
        $success = $stmt->execute();
        if($success){
            $this->hydrateUserList($stmt);
        }
    }
}