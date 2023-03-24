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

    public function readOneValidate(): Donation {
        if(!isset($_GET["id_donation"])) {
            echo "Veuillez indiquer l'id d'un don existant.";
            die;
        }
        else if(!is_numeric($_GET["id_donation"])) {
            echo "L'id du don à afficher doit être un nombre";
            die;
        } else {

            $id_donation = $_GET["id_donation"];
            
            $donation = Donation::readOne($id_donation); 

            if($donation == false) {
                echo "Aucun don n'a été trouvé avec l'ID" . $id_donation;
                die;
            }

            return $donation;  
        }
    }

    public function updateValidate(): array {
        $bookConditions = array("Neuf", "Très bon état", "État correct", "Mauvais état");
        $messages = [];

        if(!isset($_GET["id_donation"])) {
            echo "Veuillez indiquer un numéro de donation.";
            die;
        } 

        $id_user = Donation::readOne($_GET["id_donation"])->id_user;

        if($id_user != $_SESSION["id_user"]) {
            echo "Le numéro de la donation n'est pas valide.";
            die;
        }

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
                $id_book = Donation::readOne($_GET["id_donation"])->id_book;
                $id_donation = $_GET["id_donation"];

                Donation::update($id_donation, $_POST["bookCondition"], $donationDate, $donationComment, $id_user, $id_book);
            }
        }
        return $messages;
    }


    public function deleteValidate() {

        if(!isset($_GET["id_donation"])) {
            echo "Veuillez indiquer un numéro de donation.";
            die;
        } 

        $id_user = Donation::readOne($_GET["id_donation"])->id_user;

        if($id_user != $_SESSION["id_user"]) {
            echo "Le numéro de la donation n'est pas valide.";
            die;
        }

        $id_donation = $_GET["id_donation"];
        Donation::delete($id_donation);
    }

}