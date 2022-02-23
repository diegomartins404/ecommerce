<?php
namespace App\Domain\Model;

use App\Domain\Repository\UserRepository;

class User
{
    public function __construct(int $id = null,
                                string $name = null,
                                string $email = null,
                                string $password = null)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    private $id;
    private $name;
    private $email;
    private $password;

    public function setId($value)
    {
      $this->id = $value;
    }
    public function setName($value)
    {
      $this->name = $value;
    }
    public function setEmail($value)
    {
      $this->email = $value;
    }
    public function setPassword($value)
    {
      $this->password = $value;
    }

    public function getId()
    {
      return $this->id;
    }
    public function getName()
    {
      return $this->name;
    }
    public function getEmail()
    {
      return $this->email;
    }
    public function getPassword()
    {
      return $this->password;
    }
    public function passwordVerify(string $rawPassword): bool
    {
        return password_verify($rawPassword, $this->getPassword());
    }
}
?>