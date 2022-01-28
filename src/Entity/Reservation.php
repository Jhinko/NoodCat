<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $date_reservation;

    /**
     * @ORM\ManyToOne(targetEntity="Cat")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     */
    private Cat $cat;

    /**
     * @ORM\ManyToOne(targetEntity="Table")
     * @ORM\JoinColumn(name="table_id", referencedColumnName="id")
     */
    private Table $table;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private Customer $customer;

    public function __construct(int $id, DateTime $date_reservation, Cat $cat, Table $table, Customer $customer)
    {
        $this->id = $id;
        $this->date_reservation = $date_reservation;
        $this->cat = $cat;
        $this->table = $table;
        $this->customer = $customer;
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
     * Get the value of date_reservation
     */
    public function getDate_reservation(): DateTime
    {
        return $this->date_reservation;
    }

    /**
     * Set the value of date_reservation
     *
     * @return  self
     */
    public function setDate_reservation($date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    /**
     * Get the value of cat
     */
    public function getCat(): Cat
    {
        return $this->cat;
    }

    /**
     * Set the value of cat
     *
     * @return  self
     */
    public function setCat($cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get the value of table
     */
    public function getTable(): Table
    {
        return $this->table;
    }

    /**
     * Set the value of table
     *
     * @return  self
     */
    public function setTable($table): self
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get the value of customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */
    public function setCustomer($customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
