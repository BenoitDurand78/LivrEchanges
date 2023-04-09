<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/book.php");
require_once(__DIR__ . "/user.php");

class Comment {
    public int $id_comment; 
    public string $comment;
    public string $date;
    public int $id_userComment;
    public int $id_bookComment;
    public ?User $user;
    public ?Book $book;


    /**
     * displayDate 
     * 
     * changes the format of the date of the donation 
     *
     * @return string
     */
    public function displayDate(): string {
        $date = new DateTime($this->date);
        return $date->format("d/m/Y H:i");
    }



    public static function create(string $comment, int $id_userComment, int $id_bookComment) {
        global $pdo;

        $sql = "INSERT INTO comments (comment, id_userComment, id_bookComment) VALUES (:comment, :id_userComment, :id_bookComment)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":comment", $comment, PDO::PARAM_STR);
        $statement->bindParam(":id_userComment", $id_userComment, PDO::PARAM_INT);
        $statement->bindParam(":id_bookComment", $id_bookComment, PDO::PARAM_INT);
        $statement->execute();
    }


        /**
     * readByBook
     * 
     * returns a list of all the comments for a single book
     *
     * @param  int $id the id of the book
     * @return array|false 
     */
    public static function readByBook(int $id): array|false {
        global $pdo;
        $id_book = $_GET["id"];

        $sql = "SELECT id_comment, comment, date, id_userComment, id_bookComment FROM comments WHERE id_bookComment = :id_book";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Comment");
        $comments = $statement->fetchAll();
        if($comments == [])  {
            return false;
        } else {
            foreach($comments as $comment) {
                $id_user = $comment->id_userComment; 
                $usersSQL = "SELECT id_user, firstname, surname, picture FROM users WHERE id_user = :id_user";
                $statement = $pdo->prepare($usersSQL);
                $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "User");
                $user = $statement->fetch();
                $comment->user = $user; 
            }

            return $comments;
        }
    }

}