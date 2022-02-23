<?php
namespace App\Domain\Model;

class Product
{
    public function __construct($id = null, $name = null, $value = null, $quantity = null)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setValue($value);
        $this->setQuantity($quantity);
    }

    private $id;
    private $name;
    private $value;
    private $quantity;

    public function setId($value)
    {
        $this->id = $value;
    }
    public function setName($value)
    {
        $this->name = $value;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function setQuantity($value)
    {
        $this->quantity = $value;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
}