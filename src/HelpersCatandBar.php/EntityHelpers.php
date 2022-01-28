<?php

namespace App\Helpers;

class EntityHelpers {

     public static function getRequireEntityManager()
    {
        require('bootstrap.php');

        return $entityManager;
    }
}