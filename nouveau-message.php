<?php

session_start();
define("TITLE", "Envoyer un message");
define("CSS", "message");

require_once(__DIR__ . "/controllers/usersController.php");
$usersController = new UsersController;
$usersController->verifyLogin();

require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$donation = $donationController->readOneValidate();

require_once(__DIR__ . "/controllers/privateMessageController.php");
$privateMessageController = new PrivateMessageController;

$messages = $privateMessageController->createValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/newMessage.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");