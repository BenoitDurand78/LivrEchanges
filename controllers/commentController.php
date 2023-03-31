<?php

require_once(__DIR__ . "/../models/comment.php");

class PrivateMessageController {


    public function createValidate() {

    $messages = [];

    if(isset($_POST["submit"])) {

        if(!isset($_POST["comment"]) || strlen($_POST["comment"]) < 1) {
            $messages[] = [
                "success" => false,
                "text" => "Veuillez écrire votre commentaire."
            ];
        }

        if(count($messages) == 0) {

            $messages[] = [
                "success" => true,
                "text" => "Votre message a bien été envoyé"
            ];

            $comment = htmlspecialchars($_POST["comment"]);
            $id_userComment = $_SESSION["id_userComment"];

            $id_bookComment = $_GET["id"];

            Comment::create($comment, $id_userComment, $id_bookComment);
        }
    }
    return $messages;
    }



}