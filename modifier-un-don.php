<?php

session_start();
define("TITLE", "Modification d'un don");
define("CSS", "donationModification");


require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$donation = $donationController->readOneValidate();
$messages = $donationController->updateValidate();


include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/donationUpdate.php");
include(__DIR__ . "/assets/inc/footer.php");