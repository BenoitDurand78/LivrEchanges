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
    
                $ratingsMessages[] = [
                    "success" => true,
                    "text" => "Votre note a bien été enregistrée. "
                ];
            
                $rating = $_POST["rating"]; 
                $id_bookRating = $_GET["id"];
                $id_userRating = $_SESSION["id_user"]; 

                Rating::create($rating, $id_bookRating, $id_userRating);

            }
            return $ratingsMessages;
        }
    }





}