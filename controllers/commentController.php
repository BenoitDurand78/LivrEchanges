<?php

require_once(__DIR__ . "/../models/comment.php");

class CommentController {


    public function createValidate() {

    $comments = [];

    if(isset($_POST["submitComment"])) {

        if(!isset($_POST["comment"]) || strlen($_POST["comment"]) < 1) {
            $comments[] = [
                "success" => false,
                "text" => "Veuillez écrire votre commentaire."
            ];
        }

        if(count($comments) == 0) {

            $comments[] = [
                "success" => true,
                "text" => "Votre message a bien été envoyé."
            ];

            $comment = htmlspecialchars($_POST["comment"]);
            $id_userComment = $_SESSION["id_user"];

            $id_bookComment = $_GET["id"];

            Comment::create($comment, $id_userComment, $id_bookComment);
        }
    }
    return $comments;
    }


    public function readByBookValidate(): array|false {
        $comments = Comment::readByBook($_GET["id"]);
        return $comments;
    }

}