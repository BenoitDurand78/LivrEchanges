<?php

require_once(__DIR__ . "/../models/contact.php");

class ContactController {

    public function createMessageValidate(): array {
        $messages = [];

        if(isset($_POST["submit"])) {

            if(!isset($_POST["firstname"]) || strlen($_POST["firstname"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre prénom."
                ];
            }
            if(!isset($_POST["surname"]) || strlen($_POST["surname"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre nom."
                ];
            }
            if(!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un email valide."
                ];
            }
            if(!isset($_POST["messageSubject"]) || strlen($_POST["messageSubject"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un sujet pour votre message."
                ];
            }
            if(!isset($_POST["message"]) || strlen($_POST["message"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez écrire un message."
                ];
            }
            if(count($messages) == 0) {
                $messages[] = [
                    "success" => true,
                    "text" => "Votre message a bien été envoyé"
                ];
                Message::create($_POST["firstname"], $_POST["surname"], $_POST["email"], $_POST["messageSubject"], $_POST["message"]);
            }
        }
    return $messages;
    }       
}