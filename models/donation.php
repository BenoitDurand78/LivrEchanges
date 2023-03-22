<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/book.php");
require_once(__DIR__ . "/user.php");

class Donation {
    public int $id_donation; 
    public string $bookCondition;
    public string $donationDate;
    public string $donationComment;
    public int $id_user;
    public int $id_book; 
    public ?User $user;
    public ?Book $book;

    public function displayDate(): string {
        $donationDate = new DateTime($this->donationDate);
        return $donationDate->format("d/m/Y");
    }


    public static function create(string $bookCondition, string $donationDate, string $donationComment, int $id_user, int $id_book) {
        global $pdo; 

        $sql = "INSERT INTO donations (bookCondition, donationDate, donationComment, id_user, id_book) VALUES (:bookCondition, :donationDate, :donationComment, :id_user, :id_book)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":bookCondition", $bookCondition, PDO::PARAM_STR);
        $statement->bindParam(":donationDate", $donationDate, PDO::PARAM_STR);
        $statement->bindParam(":donationComment", $donationComment, PDO::PARAM_STR);
        $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
        $statement->execute();
    }


    public static function readByBook(int $id): array|false {
        global $pdo;
        $id_book = $_GET["id"];

        $sql = "SELECT id_user, bookCondition, donationDate, donationComment FROM donations WHERE id_book = :id_book";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Donation");
        $donations = $statement->fetchAll();
        if($donations == [])  {
            return false;
        } else {
            foreach($donations as $donation) {
                $id_user = $donation->id_user; 
                $usersSQL = "SELECT id_user, firstname, city, postalCode, picture FROM users WHERE id_user = :id_user";
                $statement = $pdo->prepare($usersSQL);
                $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "User");
                $user = $statement->fetch();
                $donation->user = $user; 
            }

            return $donations;
        }
    }

    public static function readByProfile(): array|false {
        global $pdo;
        $id_user = $_SESSION["id_user"];

        $sql = "SELECT id_donation, id_user, bookCondition, donationDate, donationComment, id_book FROM donations WHERE id_user = :id_user";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Donation");
        $donations = $statement->fetchAll();
        if($donations == [])  {
            return false;
        } else {
            foreach($donations as $donation) {
                $id_book = $donation->id_book; 
                $bookSQL = "SELECT id_book, title, author, releaseYear, picture FROM books WHERE id_book = :id_book";
                $statement = $pdo->prepare($bookSQL);
                $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "Book");
                $book = $statement->fetch();
                $donation->book = $book;
            }

            return $donations;
        }
    }


    public static function readOne(int $id_donation): Donation|false {

        global $pdo;

        $sql = "SELECT * FROM donations WHERE id_donation = :id_donation";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_donation", $id_donation, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Donation");
        $donation = $statement->fetch();

        if($donation == false) {
            return false;
        } else {
            $id_book = $donation->id_book;
            $sql = "SELECT * FROM books WHERE id_book = :id_book";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Book");
            $book = $statement->fetch();
            $donation->book = $book; 

            return $donation;
        }
    }



    public static function update(int $id_donation, string $bookCondition, string $donationDate, string $donationComment, int $id_user, int $id_book): void {
        global $pdo; 

        $id_user = $_SESSION["id_user"];
        $id_donation = $_GET["id_donation"];
        $id_book = Donation::readOne($_GET["id_donation"])->id_book; 
        
        $sql = "UPDATE donations 
        SET bookCondition = :bookCondition,
        donationDate = :donationDate,
        donationComment = :donationComment,
        id_user = :id_user, 
        id_book = :id_book
        WHERE id_donation = :id_donation";
    
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":bookCondition", $bookCondition, PDO::PARAM_STR);
        $statement->bindParam(":donationDate", $donationDate, PDO::PARAM_STR);
        $statement->bindParam(":donationComment", $donationComment, PDO::PARAM_STR);
        $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $statement->bindParam(":id_book", $id_book, PDO::PARAM_INT);
        $statement->bindParam(":id_donation", $id_donation, PDO::PARAM_INT);
        $statement->execute();
    }

}