<?php

require_once(__DIR__ . "/../models/donation.php");

class DonationController {

    public function createValidate(): array {


        $bookConditions = array("Neuf", "Très bon état", "État correct", "Mauvais état");
        $messages = [];

        if(isset($_POST["submit"])) {


            if(!isset($_POST["bookCondition"]) || !in_array(($_POST["bookCondition"]), $bookConditions)) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer l'état dans lequel est le livre parmi les choix proposés."
                ];
            }


            if(count($messages) == 0) {
                $messages[] = [
                    "success" => true,
                    "text" => "Votre donation est bien enregistrée."
                ];


                $donationComment = htmlspecialchars($_POST["donationComment"]);
                
                date_default_timezone_set('Europe/Paris');
                $donationDate = date('Y-m-d');
                $id_user = $_SESSION["id_user"];
                $id_book = $_GET["id"];

                Donation::create($_POST["bookCondition"], $donationDate, $donationComment, $id_user, $id_book);
            }
        }
        return $messages;
    }

    public function readByBookValidate(): array|false {
        $donations = Donation::readByBook($_GET["id"]);
        return $donations;
    }

    public function readByProfileValidate(): array|false {
        $donations = Donation::readByProfile();
        return $donations;
    }

}