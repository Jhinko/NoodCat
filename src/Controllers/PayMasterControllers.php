<?php

namespace App\Controllers;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\PayMaster;

class PayMasterControllers
{
    const PAYMASTER = [
        "email", "password", "lastname", "firstname", "age", "numMatricul"
    ];

    public static function getEM()
    {
        require "bootstrap.php";
        return $entityManager;
    }

    public function showAll($id)
    {
        $em = self::getEM();

        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\PayMaster"));

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

        foreach (self::PAYMASTER as $value) {

            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === "") {
                $error = "Le Champs est vide";
                include(__DIR__ . "/../Vues/PayMaster/AddPayMaster.php");
                echo $error;
            }

            if (array_key_exists($value, $_POST)) {
                $error = "Le Champs est vide";
                include(__DIR__ . "/../Vues/PayMaster/AddPayMaster.php");
                echo $error;
            }
        }

        $PayMasterLastname = $_POST["lastname"];
        $PayMasterFirstName = $_POST["firstname"];
        $PayMasterAge = $_POST["age"];
        $PayMasterNumMatricul = $_POST["numMatricul"];
        $PayMasterEmail = $_POST["email"];
        $PayMasterPassWord = $_POST["password"];

        $NewPaysMaster = new PayMaster($PayMasterLastname, $PayMasterFirstName, $PayMasterEmail, $PayMasterPassWord, $PayMasterAge, $PayMasterNumMatricul);
        $em->persist($NewPaysMaster);
        $em->flush();

        include(__DIR__ . "/../Vues/PayMaster/AddPayMaster.php");
    }

    public function modify(string $id)
    {
        $em = self::getEM();

        $repositoryPayMaster = new EntityRepository($em, new ClassMetadata("App\Entity\PayMaster"));
        $PayMaster = $repositoryPayMaster->find($id);

        if (!empty($_POST)) {
            foreach (self::PAYMASTER as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "erreur";
                    include(__DIR__ . "/../Vues/PayMaster/ModifyPayMaster.php");
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                if ($_POST[$values] === "") {
                    echo "Champs $value vide";
                    include(__DIR__ . "/../Vues/PayMaster/ModifyPayMaster.php");
                    die();
                }
            }

            $PayMaster->setMail($_POST["email"]);
            $PayMaster->setPassword($_POST["password"]);
            $PayMaster->setLastname($_POST["lastname"]);
            $PayMaster->setFirstname($_POST["firstname"]);
            $PayMaster->setAge($_POST["age"]);
            $PayMaster->setNumMatricul($_POST["numMatricul"]);
            $em->persist($PayMaster);
            $em->flush();

        }
    }

    public function delete(string $id)
    {
        $em = self::getEM();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\PayMaster"));
        $obj = $repository->find($id);

        $em->remove($obj);
        $em->flush();
    }
}
