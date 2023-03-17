<?php

session_start();
define("TITLE", "Contact");
define("CSS", "contact");

require_once(__DIR__ . "/controllers/contactController.php");

$contactController = new ContactController;

$messages = $contactController->createMessageValidate();


include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/displayContact.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");