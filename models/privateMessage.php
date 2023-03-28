<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");
require_once(__DIR__ . "/user.php");

class PrivateMessage {
    public int $id_message; 
    public string $messageSubject;
    public string $message;
    public ?string $date;
    public ?User $id_destinataire;
    public ?User $id_author;


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

    public static function readAllReceived(): array {
        global $pdo;
        $id_destinataire = $_SESSION["id_user"];

        $sql = "SELECT * FROM messages WHERE id_destinataire = :id_destinataire";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_destinataire", $id_destinataire, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $messagesReceived = $statement->fetchAll();

        return $messagesReceived;
    }


    public static function readAllSent(): array {
        global $pdo;
        $id_author = $_SESSION["id_user"];

        $sql = "SELECT * FROM messages WHERE id_author = :id_author";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_author", $id_author, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $messagesSent = $statement->fetchAll();

        return $messagesSent;
    }


    // Faire méthode pour lire les messages d'une conversation? 


    public static function readOne(int $id_message) {
        global $pdo;
        $id_message = $_GET["id_message"];

        $sql = "SELECT * FROM messages WHERE id_message = :id_message";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id_message", $id_message, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "PrivateMessage");
        $singleMessage = $statement->fetch();

        return $singleMessage;
    }



}