<?php

session_start();
define("TITLE", "Déconnexion");
define("CSS", "deconnection");

session_unset();
session_destroy();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/displayDeconnection.php");
include(__DIR__ . "/assets/inc/footer.php");