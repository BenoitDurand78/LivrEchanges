<?php

require_once(__DIR__ . "/../models/privateMessage.php");
require_once(__DIR__ . "/../models/donation.php");

class PrivateMessageController {

    public function createValidate() {

        $messages = [];

        if(isset($_POST["submit"])) {

            if(!isset($_POST["message"]) || strlen($_POST["message"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez écrire votre message."
                ];
            }

            if(count($messages) == 0) {

                $messages[] = [
                    "success" => true,
                    "text" => "Votre message a bien été envoyé"
                ];


                $messageSubject = Donation::readOne($_GET["id_donation"])->book->title;
                $id_destinataire = Donation::readOne($_GET["id_donation"])->user->id_user;
                $message = htmlspecialchars($_POST["message"]);
                $id_author = $_SESSION["id_user"];

                PrivateMessage::create($messageSubject, $message, $id_destinataire, $id_author);
            }
        }
        return $messages;
    }

    // Voir pour vérifier qu'il y a bien un message, sinon renvoyer un message echo/autre
    public function readAllReceivedValidate(): array|false {
        $messagesReceived = PrivateMessage::readAllReceived();
        return $messagesReceived; 
    }

    // Voir pour vérifier qu'il y a bien un message, sinon renvoyer un message echo/autre
    public function readAllSentValidate(): array|false {
        $messagesSent = PrivateMessage::readAllSent();
        return $messagesSent; 
    }

    public function readOneValidate(): PrivateMessage {
        if(!isset($_GET["id_message"])) {
            echo "Veuillez indiquer l'id d'un message existant.";
            die;
        }
        else if(!is_numeric($_GET["id_message"])) {
            echo "L'id du message à afficher doit être un nombre";
            die;
        } else {

            $id_message = $_GET["id_message"];
            
            $id_destinataire = PrivateMessage::readOne($id_message)->id_destinataire;
            $id_author = PrivateMessage::readOne($id_message)->id_author;

            if(($id_destinataire != $_SESSION["id_user"]) && ($id_author != $_SESSION["id_user"])) {
                echo "Le numéro du message n'est pas valide.";
                die;
            } else {
                $message = PrivateMessage::readOne($id_message); 

                if($message == false) {
                    echo "Aucun message n'a été trouvé avec l'ID" . $id_message;
                    die;
                }
            }
            
            return $message;  
        }
    }

    public function createFromMessageValidate() {

        $messages = [];

        if(isset($_POST["submit"])) {

            if(!isset($_POST["message"]) || strlen($_POST["message"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez écrire votre message."
                ];
            }

            if(count($messages) == 0) {

                $messages[] = [
                    "success" => true,
                    "text" => "Votre message a bien été envoyé"
                ];


                $messageSubject = PrivateMessage::readOne($_GET["id_message"])->messageSubject;
                $id_destinataire = PrivateMessage::readOne($_GET["id_message"])->id_author;
                $message = htmlspecialchars($_POST["message"]);
                $id_author = $_SESSION["id_user"];

                PrivateMessage::create($messageSubject, $message, $id_destinataire, $id_author);
            }
        }
        return $messages;
    }

}