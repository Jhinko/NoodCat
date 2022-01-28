<?php

namespace App;

use Router\Router\Router;

require_once("vendor/autoload.php");


$router = new Router($_GET['url']);

$router->get("/User", "App\Controllers\UserControllers@showAll");
$router->get("/UserD/:id", "App\Controllers\UserControllers@delete");
$router->get("/UserM/:id", "App\Controllers\UserControllers@modify");
$router->post("/UserM/:id", "App\Controllers\UserControllers@modify");
$router->get("/UserA/:id", "App\Controllers\UserControllers@add");
$router->post("/UserA/:id", "App\Controllers\UserControllers@add");

$router->get("/Customer", "App\Controllers\CustomerControllers@showAll");
$router->get("/CustomerD/:id", "App\Controllers\CustomerControllers@delete");
$router->get("/CustomerM/:id", "App\Controllers\CustomerControllers@modify");
$router->post("/CustomerM/:id", "App\Controllers\CustomerControllers@modify");
$router->get("/CustomerA/:id", "App\Controllers\CustomerControllers@add");
$router->post("/CustomerA/:id", "App\Controllers\CustomerControllers@add");

$router->get("/Paymaster", "App\Controllers\PlayMasterControllers@showAll");
$router->get("/PaymasterD/:id", "App\Controllers\PlayMasterControllers@delete");
$router->get("/PaymasterM/:id", "App\Controllers\PlayMasterControllers@modify");
$router->post("/PaymasterM/:id", "App\Controllers\PlayMasterControllers@modify");
$router->get("/PaymasterA/:id", "App\Controllers\PlayMasterControllers@add");
$router->post("/PaymasterA/:id", "App\Controllers\PlayMasterControllers@add");

$router->get("/PDG", "App\Controllers\PDGControllers@showAll");
$router->get("/PDGD/:id", "App\Controllers\PDGControllers@delete");
$router->get("/PDGM/:id", "App\Controllers\PDGControllers@modify");
$router->post("/PDGM/:id", "App\Controllers\PDGControllers@modify");
$router->get("/PDGA/:id", "App\Controllers\PDGControllers@add");
$router->post("/PDGA/:id", "App\Controllers\PDGControllers@add");

$router->get("/CatBar", "App\Controllers\CatBarControllers@showAll");
$router->get("/CatBarD/:id", "App\Controllers\CatBarControllers@delete");
$router->get("/CatBarM/:id", "App\Controllers\CatBarControllers@modify");
$router->post("/CatBarM/:id", "App\Controllers\CatBarControllers@modify");
$router->get("/CatBarA/:id", "App\Controllers\CatBarControllers@add");
$router->post("/CatBarA/:id", "App\Controllers\CatBarControllers@add");

$router->get("/Table", "App\Controllers\TableControllers@showAll");
$router->get("/TableD/:id", "App\Controllers\TableControllers@delete");
$router->get("/TableM/:id", "App\Controllers\TableControllers@modify");
$router->post("/TableM/:id", "App\Controllers\TableControllers@modify");
$router->get("/TableA/:id", "App\Controllers\TableControllers@add");
$router->post("/TableA/:id", "App\Controllers\TableControllers@add");

$router->get("/Cat", "App\Controllers\CatControllers@showAll");
$router->get("/CatD/:id", "App\Controllers\CatControllers@delete");
$router->get("/CatM/:id", "App\Controllers\CatControllers@modify");
$router->post("/CatM/:id", "App\Controllers\CatControllers@modify");
$router->get("/CatA/:id", "App\Controllers\CatControllers@add");
$router->post("/CatA/:id", "App\Controllers\CatControllers@add");

$router->get("/PictureCat", "App\Controllers\PictureCatControllers@showAll");
$router->get("/PictureCatD/:id", "App\Controllers\PictureCatControllers@delete");
$router->get("/PictureCatM/:id", "App\Controllers\PictureCatControllers@modify");
$router->post("/PictureCatM/:id", "App\Controllers\PictureCatControllers@modify");
$router->get("/PictureCatA/:id", "App\Controllers\PictureCatControllers@add");
$router->post("/PictureCatA/:id", "App\Controllers\PictureCatControllers@add");

$router->get("/Reservation", "App\Controllers\ReservationControllers@showAll");
$router->get("/ReservationD/:id", "App\Controllers\ReservationControllers@delete");
$router->get("/ReservationM/:id", "App\Controllers\ReservationControllers@modify");
$router->post("/ReservationM/:id", "App\Controllers\ReservationControllers@modify");
$router->get("/ReservationA/:id", "App\Controllers\ReservationControllers@add");
$router->post("/ReservationA/:id", "App\Controllers\ReservationControllers@add");

$router->get("/", "App\Controllers\AppControllers@login");
$router->post("/", "App\Controllers\AppControllers@login");
$router->post("/", "App\Controllers\AppControllers@login");
$router->post("/", "App\Controllers\AppControllers@login");