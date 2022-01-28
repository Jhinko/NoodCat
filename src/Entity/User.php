<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity 
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string") 
 * @ORM\DiscriminatorMap({"Pdg" = "Pdg", "User" = "User", "Customer" = "Customer", "PayMaster" = "PayMaster"})
 * @ORM\Table(name="User",uniqueConstraints={@ORM\UniqueConstraint(columns= {"mail"})})
*/

class User
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * */
    private int $id;

    /** @ORM\Column(length=100) */
    private string $lastname; //protected?

    /** @ORM\Column(length=100) */
    private string $firstname; //protected?

    /** @ORM\Column(length=150)*/
    private string $mail;

    /** @ORM\Column(length=255)*/
    private string $password;

    /** @ORM\Column(type="smallint")*/
    private int $age;



    public function __construct(string $lastname, string $firstname, string $mail, string $password, int $age)

    public function __construct(string $lastname, string $firstname, string $mail, string $password, int $age)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->age = $age;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }



    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of age
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param int $age
     *
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
