<?php

namespace App\Domain\Repository;


use App\Domain\Model\User;

interface UserRepository
{
    public function save(User $user): bool;
    public function insert(User $user): bool;
    public function update(User $user): bool;
    public function remove($id): bool;
    public function hydrateUserList(\PDOStatement $stmt): array;
    public function bringByEmail($email): User;
    public function passwordVerify(string $rawPassword): bool;

    public function getId(): int;
    public function getName(): string;
    public function getEmail(): string;
    public function getPassword(): string;





}