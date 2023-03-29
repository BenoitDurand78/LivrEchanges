<?php

session_start();
define("TITLE", "Connexion à votre compte");
define("CSS", "connection");

require_once(__DIR__ . "/controllers/usersController.php");

$existingUser = new UsersController;
$messages = $existingUser->signIn();


include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/displayConnection.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");