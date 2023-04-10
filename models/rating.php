<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/book.php");
require_once(__DIR__ . "/user.php");

class Rating {
    public int $id_rating; 
    public string $rating;
    public int $id_bookRating;
    public int $id_userRating;
    public ?User $user;
    public ?Book $book;
    public float $average; 


    public static function create(int $rating, int $id_bookRating, int $id_userRating) {
        global $pdo;

        $sql = "INSERT INTO ratings (rating, id_bookRating, id_userRating) VALUES (:rating, :id_bookRating, :id_userRating)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":rating", $rating, PDO::PARAM_INT);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->bindParam(":id_userRating", $id_userRating, PDO::PARAM_INT);
        $statement->execute();
    }


    public static function average(int $id_bookRating): float|false {
        global $pdo;
        $id_bookRating = $_GET["id"];

        $sql = "SELECT id_bookRating, AVG(rating) FROM ratings WHERE id_bookRating = :id_bookRating";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Rating");
        $average = $statement->fetch();

        return $average;
    }






}