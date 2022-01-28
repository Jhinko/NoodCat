<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CatBar
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
    private string $name_bar;

    /**
     * @ORM\Column(type="string")
     */
    private string $location;

    public function __construct(int $id, string $name_bar, string $location)
    {
        $this->id = $id;
        $this->name_bar = $name_bar;
        $this->location = $location;
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
     * Get the value of name_bar
     */
    public function getName_bar(): string
    {
        return $this->name_bar;
    }

    /**
     * Set the value of name_bar
     *
     * @return  self
     */
    public function setName_bar($name_bar): self
    {
        $this->name_bar = $name_bar;

        return $this;
    }

    /**
     * Get the value of location
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */
    public function setLocation($location): self
    {
        $this->location = $location;

        return $this;
    }
}
