<?php
namespace App\Domain\Model;

class User
{
    public function __construct(?int $id, ?string $name, ?string $email, ?string $password)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    private int $id;
    private string $name;
    private string $email;
    private string $password;

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

    public function getId(): int
    {
      return $this->id;
    }
    public function getName(): string
    {
      return $this->name;
    }
    public function getEmail(): string
    {
      return $this->email;
    }
    public function getPassword(): string
    {
      return $this->password;
    }
    public function passwordVerify(string $rawPassword): bool
    {
        return password_verify($rawPassword, $this->getPassword());
    }
}
?>