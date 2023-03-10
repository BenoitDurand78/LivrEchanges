<?php

session_start();
define("TITLE", "Ajout d'un livre");
define("CSS", "ajoutLivre");

require_once(__DIR__ . "/controllers/bookController.php");

$bookController = new BookController;

$messages = $bookController->createValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/addBook.php");
include(__DIR__ . "/assets/inc/footer.php");