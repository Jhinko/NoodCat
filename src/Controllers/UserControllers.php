<?php

namespace App\Controllers;

session_start();

use App\Entity\User;
use App\Helpers\EntityManagerHelpers as Em;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UserControllers
{
    const REQUIRES = [
        "lastname", 
        "firstname",
        "mail",
        "password",
        "age"
];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository(
            $em,
            new ClassMetadata('App\Entity\User')
        );

        $oTable = $repo->findAll();
    }

    public function add()
    {
        foreach (self::REQUIRES as $value) {
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Table/AddUser.php";
                exit();
            }
                if (!array_key_exists($value, $_POST)) {
                    $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                    include __DIR__ . "/../Vues/Table/AddUser.php";
                    exit();
                }
            }
            
        $aUser = new User($_POST['lastname'],$_POST['firstname'],$_POST['mail'],$_POST['password'], (int) $_POST['age']);
        // var_dump((int) $_POST['num_place'], (int) $_POST['num_pad']);
        // die('---END---');
        $em = Em::getEntityManager();
        $em->persist($aUser);
        // var_dump($aTable);
        // die('---END---');
        $em->flush();
        
        include __DIR__ . "/../Vues/Table/AddUser.php";
    }

    public function modify(string $sId)
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository(
            $em,
            new ClassMetadata('App\Entity\User')
        );

        $mUser = $repo->find($sId);

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                $exist= array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Table/ModifyUser.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Table/ModifyUser.php";
                    exit;

                }
            }

            if ($_POST["lastname"] !== $mUser->getLastname()) {
                $mTableReserv->setLastname($_POST["lastname"]);
            }
            
            if ($_POST["lastname"] !== $mUser->getFirstname()) {
                $mTableReserv->setFirstname($_POST["firstname"]);
            }
            if ($_POST["mail"] !== $mUser->getMail()) {
                $mTableReserv->setMail($_POST["mail"]);
            }
            if ($_POST["password"] !== $mUser->getPassword()) {
                $mTableReserv->setPassword($_POST["password"]);
            }
            if ($_POST["age"] !== $mUser->getAge()) {
                $mTableReserv->setAge($_POST["age"]);
            }

            $em->persist($mTableReserv);
            $em->flush();

        }

        include __DIR__ . "/../Vues/Table/ModifyUser.php";
    }

    public function delete(string $sId)
    {
        $em = Em::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $dUser = $repo->find($sId);

        $em->remove($dUser);
        $em->flush();
    }
}
