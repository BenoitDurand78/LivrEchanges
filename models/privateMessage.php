<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/user.php");

class PrivateMessage {
    public int $id_message; 
    public string $messageSubject;
    public string $message;
    public string $date;
    public int $id_destinataire;
    public int $id_author;
    public User $destinataire;
    public User $author;



    public static function create(string $messageSubject, string $message, int $id_destinataire, int $id_author) {
        global $pdo;

        $sql = "INSERT INTO messages (messageSubject, message, id_destinataire, id_author) VALUES (:messageSubject, :message, :id_destinataire, :id_author)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":messageSubject", $messageSubject, PDO::PARAM_STR);
        $statement->bindParam(":message", $message, PDO::PARAM_STR);
        $statement->bindParam(":id_destinataire", $id_destinataire, PDO::PARAM_INT);
        $statement->bindParam(":id_author", $id_author, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function readAllReceived(): array|false {
        global $pdo;

        $id_destinataire = $_SESSION["id_user"];

        $sql = "SELECT * FROM messages WHERE id_destinataire = :id_destinataire ORDER BY date";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_destinataire", $id_destinataire, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $messagesReceived = $statement->fetchAll();
        
        if($messagesReceived == false) {
            return false;
        } else {
            foreach($messagesReceived as $messageReceived) {
                $id_author = $messageReceived->id_author;
                $userSQL = "SELECT * from users WHERE id_user = :id_author";
                $statement = $pdo->prepare($userSQL);
                $statement->bindParam(":id_author", $id_author, PDO::PARAM_INT);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "User");
                $author = $statement->fetch();
                $messageReceived->author = $author;
            }

        return $messagesReceived;
        }
    }

    public static function readAllSent(): array|false {
        global $pdo;
        $id_author = $_SESSION["id_user"];

        $sql = "SELECT * FROM messages WHERE id_author = :id_author ORDER BY date";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_author", $id_author, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $messagesSent = $statement->fetchAll();

        if($messagesSent == false) {
            return false;
        } else {
            foreach($messagesSent as $messageSent) {
                $id_destinataire = $messageSent->id_destinataire;
                $userSQL = "SELECT * from users WHERE id_user = :id_destinataire";
                $statement = $pdo->prepare($userSQL);
                $statement->bindParam(":id_destinataire", $id_destinataire, PDO::PARAM_INT);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "User");
                $destinataire = $statement->fetch();
                $messageSent->destinataire = $destinataire;
            }
        }

        return $messagesSent;
    }

    // Faire méthode pour lire les messages d'une conversation? 

    public static function readOne(int $id_message): PrivateMessage|false {
        global $pdo;
        $id_message = $_GET["id_message"];

        $sql = "SELECT id_message, messageSubject, message, date, id_destinataire, id_author FROM messages 
        WHERE id_message = :id_message";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_message", $id_message, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $singleMessage = $statement->fetch();

        if($singleMessage == false) {
            return false;
        } else {
            $id_destinataire = $singleMessage->id_destinataire;
            $destinataireSQL = "SELECT * from users WHERE id_user = :id_destinataire";
            $statement = $pdo->prepare($destinataireSQL);
            $statement->bindParam(":id_destinataire", $id_destinataire, PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "User");
            $destinataire = $statement->fetch();
            $singleMessage->destinataire = $destinataire;

            $id_author = $singleMessage->id_author;
            $authorSQL = "SELECT * from users WHERE id_user = :id_author";
            $statement = $pdo->prepare($authorSQL);
            $statement->bindParam(":id_author", $id_author, PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "User");
            $author = $statement->fetch();
            $singleMessage->author = $author;

            return $singleMessage;
        }

    }
}