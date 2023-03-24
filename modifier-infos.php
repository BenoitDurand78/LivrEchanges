<?php

session_start();
define("TITLE", "Modification des informations confidentielles");
define("CSS", "modifInfos");

require_once(__DIR__ . "/controllers/usersController.php");
$usersController = new UsersController;
$usersController->verifyLogin();

$messages = $usersController->secondUpdateValidate();

$user = $usersController->readOneValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/infoModification.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");