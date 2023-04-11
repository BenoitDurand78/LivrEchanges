<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/book.php");
require_once(__DIR__ . "/user.php");

class Rating {
    public int $id_rating; 
    public int $rating;
    public int $id_bookRating;
    public int $id_userRating;
    public ?User $user;
    public ?Book $book;
    public float $average; 
    public int $existingRate;
    public int $nbOfRatings;


    public static function create(int $rating, int $id_bookRating, int $id_userRating) {
        global $pdo;

        $sql = "INSERT INTO ratings (rating, id_bookRating, id_userRating) VALUES (:rating, :id_bookRating, :id_userRating)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":rating", $rating, PDO::PARAM_INT);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->bindParam(":id_userRating", $id_userRating, PDO::PARAM_INT);
        $statement->execute();
    }


    public static function average(int $id_bookRating): float|null {
        global $pdo;

        $sql = "SELECT id_bookRating, AVG(rating) AS average FROM ratings WHERE id_bookRating = :id_bookRating";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $average = $statement->fetch();

        return $average["average"];
    }


    public static function readOne(int $id_bookRating, int $id_userRating): Rating|false {
        global $pdo;

        $sql = "SELECT * FROM ratings WHERE id_bookRating = :id_bookRating AND id_userRating = :id_userRating"; 
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->bindParam(":id_userRating", $id_userRating, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Rating");
        $existingRate = $statement->fetch();

        return $existingRate; 
    }


    public static function update(int $id_rating, int $rating, int $id_bookRating, int $id_userRating) {
        global $pdo;

        $sql = "UPDATE ratings
        SET rating = :rating,
        id_bookRating = :id_bookRating,
        id_userRating = :id_userRating
        WHERE id_rating = :id_rating";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":rating", $rating, PDO::PARAM_INT);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->bindParam(":id_userRating", $id_userRating, PDO::PARAM_INT);
        $statement->bindParam(":id_rating", $id_rating, PDO::PARAM_INT);
        $statement->execute();
    }


    public static function nbOfRatings(int $id_bookRating) {
        global $pdo;

        $sql = "SELECT COUNT(rating) FROM ratings WHERE id_bookRating = :id_bookRating";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_bookRating", $id_bookRating, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $nbOfRatings = $statement->fetch();

        return $nbOfRatings["COUNT(rating)"];
    }

}