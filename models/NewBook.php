<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");

class NewBook {
    public int $id_book; 
    public string $title;
    public string $author;
    public int $releaseYear;
    public string $ISBN;
    public string $publisher;
    public string $category;
    public string $lang;
    public ?string $description;
    public ?string $picture;

    
    public static function create(string $title, string $author, int $releaseYear, string $ISBN, string $publisher,  string $category, string $lang, ?string $description, ?string $picture) {

        global $pdo;

        $sql = "INSERT INTO books (title, author, releaseYear, ISBN, publisher, category, lang, description, picture) VALUES (:title, :author, :releaseYear, :ISBN, :publisher, :category, :lang, :description :picture)"; 

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":title", $title, PDO::PARAM_STR);
        $statement->bindParam(":author", $author, PDO::PARAM_STR);
        $statement->bindParam(":releaseYear", $releaseYear, PDO::PARAM_INT);
        $statement->bindParam(":ISBN", $ISBN, PDO::PARAM_STR);
        $statement->bindParam(":publisher", $publisher, PDO::PARAM_STR);
        $statement->bindParam(":category", $category, PDO::PARAM_STR);
        $statement->bindParam(":lang", $lang, PDO::PARAM_STR);
        $statement->bindParam(":description", $description, PDO::PARAM_STR);
        $statement->bindParam(":picture", $picture, PDO::PARAM_STR);
        $statement->execute();
    }
}