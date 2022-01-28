<?php

namespace App\Controllers;

session_start();

use App\Entity\Cat;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class CatControllers
{
    const NEEDS = [
        "id",
        "name",
        "num_chip"
    ];

    public function showAll()
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));
        $aCat = $repository->findAll();
        print $aCat; //je suis pas sur que cela soit juste!!
    }

    public function add()
    {
        foreach (self::NEEDS as $value) {
            if (!empty($_POST)) {
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "Il manque des champs à remplir";

                include __DIR__ . "/../Vues/CatBar/AddCat.php";
                die();
            }
            $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
        }

        $Cat = new Cat((int) $_POST["id"], $_POST["name_bar"], $_POST["location"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($Cat);
        $entityManager->flush();

        include __DIR__ . "/../Vues/Cat/AddCat.php";
        die();
    }

    public function modify(string $sId)
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));

        $cat = $repository->find((int)$sId);

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../Vues/Cat/ModifyCat.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if ($_POST[$value] === "") {
                    echo "Il manque des champs...";
                    include __DIR__ . "/../Vues/Cat/ModifyCat.php";
                    die();
                }
            }

            $cat->setId((int)$_POST["id"]);
            $cat->setName($_POST["name"]);
            $cat->setNum_chip($_POST["num_chip"]);

            $entityManager->persist($cat);
            $entityManager->flush();

            echo "Information well edit";
        }

        include __DIR__ . "/../Vues/Cat/ModifyCat.php";
        }


    public function delete(string $sId)
    {

        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\DeleteCat"));

        $cat = $repository->find($sId);

        $entityManager->persist($cat);
        $entityManager->flush();

        echo "Data well delete";
    }
}
