<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");


class Message {
    public int $id_message; 
    public string $firstname;
    public string $surname;
    public string $email;
    public string $messageSubject;
    public string $message;
    public int $id_user;

    public static function create(string $firstname, string $surname, string $email, string $messageSubject, string $message) {
        global $pdo; 

        $sql = "INSERT INTO contacts (firstname, surname, email, messageSubject, message) VALUES (:firstname, :surname, :email, :messageSubject, :message)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $statement->bindParam(":surname", $surname, PDO::PARAM_STR);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":messageSubject", $messageSubject, PDO::PARAM_STR);
        $statement->bindParam(":message", $message, PDO::PARAM_STR);
        $statement->execute();
    }
}