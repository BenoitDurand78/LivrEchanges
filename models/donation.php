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

        
    /**
     * displayDate 
     * 
     * changes the format of the date of the donation 
     *
     * @return string
     */
    public function displayDate(): string {
        $donationDate = new DateTime($this->donationDate);
        return $donationDate->format("d/m/Y");
    }

    
    /**
     * create
     * 
     * creates a donation after submitting the form on the singleBook page
     *
     * @param  string $bookCondition the condition of the book, between four possible choices
     * @param  string $donationDate the date of the donation, automatically set after submitting the donation form
     * @param  string $donationComment the additional message the donation added by the user 
     * @param  int $id_user the id of the user who makes the donation
     * @param  int $id_book the id of the book donated
     * @return void
     */
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

    
    /**
     * readByBook
     * 
     * returns a list of all the donations for a single book
     *
     * @param  int $id the id of the book
     * @return array|false 
     */
    public static function readByBook(int $id): array|false {
        global $pdo;
        $id_book = $_GET["id"];

        $sql = "SELECT id_donation, id_user, bookCondition, donationDate, donationComment FROM donations WHERE id_book = :id_book";
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
                $usersSQL = "SELECT id_user, firstname, surname, city, postalCode, picture FROM users WHERE id_user = :id_user";
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

        
    /**
     * readByProfile
     * 
     * Reads and display every donation by profile, gets info about the books donated
     *
     * @return array|false
     */
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

    
    /**
     * readOne
     * 
     * Reads and display one donation, gets info about the book donated and the user donating 
     *
     * @param  int $id_donation the id of the donation
     * @return Donation|false
     */
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

            $id_user = $donation->id_user;
            $userSQL = "SELECT * from users WHERE id_user = :id_user";
            $statement = $pdo->prepare($userSQL);
            $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "User");
            $user = $statement->fetch();
            $donation->user = $user; 

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

    public static function delete(int $id_donation): void {

        global $pdo; 
    
        $sql = "DELETE FROM donations
        WHERE id_donation = :id_donation";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_donation", $id_donation, PDO::PARAM_INT);
        $statement->execute();
    }

}