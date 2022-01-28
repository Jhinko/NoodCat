<?php

namespace App\Controllers;

session_start();

use App\Entity\TableReserv;
use App\Helpers\EntityManagerHelpers as Em;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class TableControllers
{
    const REQUIRES = [
        "num_place", 
        "num_pad"
];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository(
            $em,
            new ClassMetadata('App\Entity\Table')
        );

        $oTable = $repo->findAll();
    }

    public function add()
    {
        foreach (self::REQUIRES as $value) {
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Table/AddTable.php";
                exit();
            }
                if (!array_key_exists($value, $_POST)) {
                    $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                    include __DIR__ . "/../Vues/Table/AddTable.php";
                    exit();
                }
            }
            
        $aTable = new TableReserv((int) $_POST['num_place'], (int) $_POST['num_pad']);
        // var_dump((int) $_POST['num_place'], (int) $_POST['num_pad']);
        // die('---END---');
        $em = Em::getEntityManager();
        $em->persist($aTable);
        // var_dump($aTable);
        // die('---END---');
        $em->flush();
        
        include __DIR__ . "/../Vues/Table/AddTable.php";
    }

    public function modify(string $sId)
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository(
            $em,
            new ClassMetadata('App\Entity\TableReserv')
        );

        $mTableReserv = $repo->find($sId);

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                $exist= array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Table/ModifyTable.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Table/ModifyTable.php";
                    exit;

                }
            }

            if ($_POST["num_place"] !== $mTableReserv->getNum_place()) {
                $mTableReserv->setNum_place($_POST["num_place"]);
            }
            
            if ($_POST["num_pad"] !== $mTableReserv->getNum_pad()) {
                $mTableReserv->setNum_pad($_POST["num_pad"]);
            }

            $em->persist($mTableReserv);
            $em->flush();

        }

        include __DIR__ . "/../Vues/Table/ModifyTable.php";
    }

    public function delete(string $sId)
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\TableReserv"));

        $dTable = $repo->find($sId);

        $em->remove($dTable);
        $em->flush();
    }
}
