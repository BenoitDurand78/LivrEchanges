<?php

session_start();
define("TITLE", "Suppression d'un don");
define("CSS", "donationDeletion");


require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$donation = $donationController->readOneValidate();

$deletion = $donationController->deleteValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/donationDeletion.php");
include(__DIR__ . "/assets/inc/footer.php");