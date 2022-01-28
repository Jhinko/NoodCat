<?php

namespace App\Helpers;

class EntityManagerHelpers{
    public static function getEntityManager()
    {
        require('bootstrap.php');
    
        return $entityManager;
    }
}