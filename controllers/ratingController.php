<?php

require_once(__DIR__ . "/../models/rating.php");

class RatingController {

    public function createValidate() {

        $ratingsMessages = [];

        if(isset($_POST["submitRating"])) {

            if(!isset($_POST["rating"]) || ($_POST["rating"]) < 1 || ($_POST["rating"]) > 10) {
                $ratingsMessages[] = [
                    "success" => false,
                    "text" => "La note indiquée n'est pas valide."
                ];
            }
    
            if(count($ratingsMessages) == 0) {

                if(RatingController::readOneValidate()) {
                    $ratingsMessages[] = [
                        "success" => true,
                        "text" => "Votre note a bien été mise à jour. "
                    ];
                    RatingController::updateValidate();
                } else {
                    $ratingsMessages[] = [
                        "success" => true,
                        "text" => "Votre note a bien été enregistrée. "
                    ];
                
                    $rating = $_POST["rating"]; 
                    $id_bookRating = $_GET["id"];
                    $id_userRating = $_SESSION["id_user"]; 
    
                    Rating::create($rating, $id_bookRating, $id_userRating);
                }
    
            }
            
        }
        return $ratingsMessages;
    }

    public function averageValidate() {
        $id_bookRating = $_GET["id"];

        $average = Rating::average($id_bookRating);
        return $average;
    }

    public function readOneValidate() {
        $id_bookRating = $_GET["id"];
        $id_userRating = $_SESSION["id_user"];

        $existingRate = Rating::readOne($id_bookRating, $id_userRating);
        return $existingRate;
    }


    public function updateValidate() {

        $id_bookRating = $_GET["id"];
        $id_userRating = $_SESSION["id_user"];
        $id_rating = Rating::readOne($id_bookRating, $id_userRating)->id_rating;
        $rating = $_POST["rating"]; 

        $ratingUpdated = Rating::update($id_rating, $rating, $id_bookRating, $id_userRating);
        return $ratingUpdated;        

    }

    public function nbOfRatingsValidate() {
        $id_bookRating = $_GET["id"];

        $nbOfRatings = Rating::nbOfRatings($id_bookRating);
        return $nbOfRatings;
    }

}