<?php

session_start();
define("TITLE", "Fiche livre");
define("CSS", "ficheLivre");
define("SCRIPT", "displayForms");

require_once(__DIR__ . "/controllers/bookController.php");
$bookController = new BookController;
$book = $bookController->readOneValidate();

require_once(__DIR__ . "/controllers/ratingController.php");
$ratingController = new RatingController; 
$ratingsMessages = $ratingController->createValidate(); 

require_once(__DIR__ . "/models/rating.php");
$ratingModel = new Rating;
$average = $ratingModel->average($_GET["id"]);

require_once(__DIR__ . "/controllers/donationController.php");
$donationController = new DonationController;
$messages = $donationController->createValidate();
$donations = $donationController->readByBookValidate();

require_once(__DIR__ . "/controllers/commentController.php");
$commentController = new CommentController; 
$comments = $commentController->createValidate(); 
$allComments = $commentController->readByBookValidate();

include(__DIR__ . "/assets/inc/header.php"); 
include(__DIR__ . "/views/singleBook.php");
include(__DIR__ . "/views/donorsList.php");
include(__DIR__ . "/views/comments.php");
include(__DIR__ . "/assets/inc/top.php"); 
include(__DIR__ . "/assets/inc/footer.php");