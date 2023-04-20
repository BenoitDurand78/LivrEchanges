<?php

session_start();
define("TITLE", "Mentions légales");
define("CSS", "mentionsLegales");

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/mentionsLegales.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");