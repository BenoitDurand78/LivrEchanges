<?php

session_start();
define("TITLE", "Fiche livre");
define("CSS", "ficheLivre");

require_once(__DIR__ . "/controllers/bookController.php");
$bookController = new BookController;

$book = $bookController->readOneValidate();

require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$messages = $donationController->createValidate();

$donations = $donationController->readByBookValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/singleBook.php");
include(__DIR__ . "/views/donorsList.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");