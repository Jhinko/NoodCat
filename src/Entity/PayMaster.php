<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */

class PayMaster extends User {

    /** @ORM\Column(type="integer") */
    private int $numMatricul;

    public function __construct(string $lastname, string $firstname, string $mail, string $password, int $age, int $numMatricul)
    {
       parent::__construct($lastname, $firstname, $mail, $password, $age);

       $this->numMatricul = $numMatricul;
    }
    

    /**
     * Get the value of numMatricul
     *
     * @return int
     */
    public function getNumMatricul(): int
    {
        return $this->numMatricul;
    }

    /**
     * Set the value of numMatricul
     *
     * @param int $numMatricul
     *
     * @return self
     */
    public function setNumMatricul(int $numMatricul): self
    {
        $this->numMatricul = $numMatricul;

        return $this;
    }
}