<?php

session_start();
define("TITLE", "Modification du profil");
define("CSS", "modifProfil");

require_once(__DIR__ . "/controllers/usersController.php");
$usersController = new UsersController;
$usersController->verifyLogin();


$messages = $usersController->updateValidate();

$user = $usersController->readOneValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/profilModification.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");