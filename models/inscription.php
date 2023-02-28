<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");

class User {
    public int $id_user; 
    public string $civility;
    public string $surname;
    public string $firstname;
    public string $email;
    public string $password; 
    public string $birthDate;
    public string $city;
    public string $postalCode;
    public string $streetName;

 

 

    public static function create(string $civility, string $surname, string $firstname, string $email, string $password, string $birthDate, string $city, string $postalCode, string $streetName) {
        
        global $pdo;

        $sql = "INSERT INTO users (civility, surname, firstname, email, password, birthDate, city, postalCode, streetName) VALUES (:civility, :surname, :firstname, :email, :password, :birthDate, :city, :postalCode, :streetName)";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":civility", $civility, PDO::PARAM_STR);
        $statement->bindParam(":surname", $surname, PDO::PARAM_STR);
        $statement->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->bindParam(":birthDate", $birthDate, PDO::PARAM_STR);
        $statement->bindParam(":city", $city, PDO::PARAM_STR);
        $statement->bindParam(":postalCode", $postalCode, PDO::PARAM_STR);
        $statement->bindParam(":streetName", $streetName, PDO::PARAM_STR);
        $statement->execute();
    }

}