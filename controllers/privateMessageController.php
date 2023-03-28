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


}