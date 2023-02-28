<?php

define("TITLE", "Inscription à Livr'Échanges");
define("CSS", "inscription");

require_once(__DIR__ . "/controllers/inscriptionController.php");

$inscriptionController = new inscriptionController;

$messages = $inscriptionController->inscriptionValidate();


include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/displayInscription.php");
include(__DIR__ . "/assets/inc/footer.php");