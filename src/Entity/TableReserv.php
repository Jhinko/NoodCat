<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TableReserv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $num_place;

    /**
     * @ORM\Column(type="integer")
     */
    private int $num_pad;

    public function __construct(int $num_place, int $num_pad)
    {
        $this->num_place = $num_place;
        $this->num_pad = $num_pad;
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
     * Get the value of num_place
     */
    public function getNum_place(): int
    {
        return $this->num_place;
    }

    /**
     * Set the value of num_place
     *
     * @return  self
     */
    public function setNum_place($num_place): self
    {
        $this->num_place = $num_place;

        return $this;
    }

    /**
     * Get the value of num_pad
     */
    public function getNum_pad(): int
    {
        return $this->num_pad;
    }

    /**
     * Set the value of num_pad
     *
     * @return  self
     */
    public function setNum_pad($num_pad): self
    {
        $this->num_pad = $num_pad;

        return $this;
    }
}
