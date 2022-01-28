<?php

namespace App\Controllers;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\Customer;

class CustomerControllers
{
    const CUSTOMER = [
        "email", "password", "lastname", "firstname", "age"
    ];

    public static function getEM()
    {
        require "bootstrap.php";
        return $entityManager;
    }
    public function showAll($id)
    {
        $em = self::getEM();

        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Customer"));

        $r = $repository->find((int) $id);
        var_dump($r);
    }

    public function add()
    {
        $em = self::getEM();

        if (empty($_POST)) {
            include(__DIR__ . "/../Vues/PayMaster/AddPayMaster.php");
            die();
        }

        foreach (self::CUSTOMER as $value) {

            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === "") {
                $error = "Le Champs est vide";
                include(__DIR__ . "/../Vues/Customer/CustomerAdd.php");
                echo $error;
            }

            if (array_key_exists($value, $_POST)) {
                $error = "Le Champs est vide";
                include(__DIR__ . "/../Vues/Customer/CustomerAdd.php");
                echo $error;
            }
        }

        $CustomerLastName = $_POST["lastname"];
        $CustomerFirstName = $_POST["firstname"];
        $CustomerAge = $_POST["age"];
        $CustomerEmail = $_POST["email"];
        $CustomerPassword = $_POST["password"];

        $NewCustomer = new Customer($CustomerLastName, $CustomerFirstName, $CustomerEmail, $CustomerPassword, $CustomerAge);
        $em->persist($NewCustomer);
        $em->flush();

        include(__DIR__ . "/../Vues/Customer/CustomerAdd.php");
    }
    
    public function modify(string $id)
    {
        $em = self::getEM();

        $repositoryCustomer = new EntityRepository($em, new ClassMetadata("App\Entity\Customer"));
        $Customer = $repositoryCustomer->find($id);

        if (!empty($_POST)) {
            foreach (self::CUSTOMER as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "erreur";
                    include(__DIR__ . "/../Vues/Customer/CustomerModify.php");
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                if ($_POST[$values] === "") {
                    echo "Champs $value vide";
                    include(__DIR__ . "/../Vues/Customer/CustomerModify.php");
                    die();
                }
            }

            $Customer->setMail($_POST["email"]);
            $Customer->setPassword($_POST["password"]);
            $Customer->setLastname($_POST["lastname"]);
            $Customer->setFirstname($_POST["firstname"]);
            $Customer->setAge($_POST["age"]);
            $em->persist($Customer);
            $em->flush();

        }
    }
    
    public function delete(string $id)
    {
        $em = self::getEM();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Customer"));
        $obj = $repository->find($id);

        $em->remove($obj);
        $em->flush();
    }
}