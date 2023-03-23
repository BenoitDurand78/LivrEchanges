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
    public string $picture;
    public ?string $id_roles;


    public static function create(string $civility, string $surname, string $firstname, string $email, string $password, string $birthDate, string $city, string $postalCode, string $streetName, string $picture) {
        
        global $pdo;

        $sql = "INSERT INTO users (civility, surname, firstname, email, password, birthDate, city, postalCode, streetName, picture) VALUES (:civility, :surname, :firstname, :email, :password, :birthDate, :city, :postalCode, :streetName, :picture)";

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
        $statement->bindParam(":picture", $picture, PDO::PARAM_STR);
        $statement->execute();
    }

    public static function readOneUser(string $email): User|false {
        global $pdo;

        $sql = "SELECT * from users WHERE email = :email";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $user = $statement->fetch();

        return $user; 
    }

    public static function update(int $id_user, string $civility, string $surname, string $firstname, string $email, string $password, string $birthDate, string $city, string $postalCode, string $streetName, string $picture) {

        global $pdo; 

        $sql = "UPDATE users 
        SET civility = :civility, 
        surname = :surname,
        firstname = :firstname,
        email = :email,
        password = :password,
        birthDate = :birthDate,
        city = :city,
        postalCode = :postalCode,
        streetName = :streetName,
        picture = :picture
        WHERE id_user = :id_user";

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
        $statement->bindParam(":picture", $picture, PDO::PARAM_STR);
        $statement->bindParam(":id_user", $id_user, PDO::PARAM_INT);
        $statement->execute();
    }


}