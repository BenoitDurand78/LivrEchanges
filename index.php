<?php

define("TITLE", "Accueil");
define("CSS", "index");
define("SCRIPT", "script");






include(__DIR__ . "/assets/inc/header.php"); 

include(__DIR__ . "/views/quotesIndex.php"); 
include(__DIR__ . "/views/carroussel.php");
include(__DIR__ . "/views/indexTexts.php");
include(__DIR__ . "/views/indexBookSearch.php");

include(__DIR__ . "/assets/inc/footer.php");