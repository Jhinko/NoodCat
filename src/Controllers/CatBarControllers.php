<?php

namespace App\Controllers;

session_start();

use App\Entity\CatBar;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class CatBarControllers
{

    const NEEDS = [
        "id",
        "name_bar",
        "location"
    ];

    public function showAll()
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\CatBar"));
        $CatBar = $repository->findAll();
        print $CatBar; //je suis pas sur que cela soit juste!!
    }

    public function add()
    {
        foreach (self::NEEDS as $value) {
            if (!empty($_POST)) {
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "Il manque des champs à remplir";

                include __DIR__ . "/../Vues/CatBar/AddCatBar.php";
                die();
            }
            $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
        }

        $CatBar = new CatBar((int) $_POST["id"], $_POST["name_bar"], $_POST["location"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($CatBar);
        $entityManager->flush();

        include __DIR__ . "/../Vues/CatBar/AddCatBar.php";
        die();
    }

    public function modify(string $sId)
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));

        $catBar = $repository->find((int)$sId);

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if ($_POST[$value] === "") {
                    echo "Il manque des champs...";
                    include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
                    die();
                }
            }

            $catBar->setId((int)$_POST["id"]);
            $catBar->setName_bar($_POST["name_bar"]);
            $catBar->setLocation($_POST["location"]);

            $entityManager->persist($catBar);
            $entityManager->flush();

            echo "Information well edit";
        }

        include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
        }
    

    public function delete(string $sId)
    { 
            $entityManager = EH::getRequireEntityManager();
            $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\DeleteCatBar"));

            $catBar = $repository->find($sId);

            $entityManager->persist($catBar);
            $entityManager->flush();

            echo "Data well delete";
        }
    
    }
