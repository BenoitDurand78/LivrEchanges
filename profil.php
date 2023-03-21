<?php

session_start();
define("TITLE", "Profil");
define("CSS", "profil");

require_once(__DIR__ . "/controllers/usersController.php");
$usersController = new UsersController;
$usersController->verifyLogin();

$user = $usersController->readOneValidate();

require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$donations = $donationController->readByProfileValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/profil.php");
include(__DIR__ . "/views/donationsByProfile.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");