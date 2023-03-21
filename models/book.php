<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");

class Book {
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
    public ?string $id_user;

    
    public static function create(string $title, string $author, int $releaseYear, string $ISBN, string $publisher,  string $category, string $lang, ?string $description, ?string $picture) {

        global $pdo;

        $sql = "INSERT INTO books (title, author, releaseYear, ISBN, publisher, category, lang, description, picture) VALUES (:title, :author, :releaseYear, :ISBN, :publisher, :category, :lang, :description, :picture)"; 

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

    public static function readAll(): array {
        global $pdo;

        $sql = "SELECT * FROM books";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Book");
        $books = $statement->fetchAll();
        return $books;
    }

    public static function readOne(int $id_book) : Book|false {
        global $pdo; 
    
        $sql = "SELECT id_book, title, author, releaseYear, ISBN, publisher, category, lang, description, picture FROM books WHERE id_book = :id_book";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Book");
        $book = $statement->fetch();

        if($book == false)  {
            return false;
        } else {
            return $book;   
        }
    
    }

    public static function bookSearch(): array {
        global $pdo;
        $bookSearch = '%' . $_GET["bookSearch"] . '%';

        $sql = "SELECT * FROM books WHERE title LIKE :bookSearch OR author LIKE :bookSearch";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":bookSearch", $bookSearch, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Book");
        $books = $statement->fetchAll();
        return $books;
    }


}