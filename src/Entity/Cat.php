<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Cat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private int $num_chip;

    public function __construct(int $id, string $name, int $num_chip)
    {
        $this->id = $id;
        $this->name = $name;
        $this->num_chip = $num_chip;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of num_chip
     */
    public function getNum_chip(): string
    {
        return $this->num_chip;
    }

    /**
     * Set the value of num_chip
     *
     * @return  self
     */
    public function setNum_chip($num_chip): self
    {
        $this->num_chip = $num_chip;

        return $this;
    }
}
