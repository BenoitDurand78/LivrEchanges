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









}