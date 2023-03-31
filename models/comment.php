<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/book.php");
require_once(__DIR__ . "/user.php");

class Comment {
    public int $id_comments; 
    public string $comment;
    public string $date;
    public int $id_userComment;
    public int $id_bookComment;
    public ?User $user;
    public ?Book $book;


    public static function create(string $comment, int $id_userComment, int $id_bookComment) {
        global $pdo;

        $sql = "INSERT INTO comments (comment, id_userComment, id_bookComment) VALUES (:comment, :id_userComment, :id_bookComment)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":comment", $comment, PDO::PARAM_STR);
        $statement->bindParam(":id_userComment", $id_userComment, PDO::PARAM_INT);
        $statement->bindParam(":id_bookComment", $id_bookComment, PDO::PARAM_INT);
        $statement->execute();
    }

}