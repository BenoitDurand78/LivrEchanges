<?php

require_once(__DIR__ . "/../models/book.php");

class BookController {

    public function createValidate(): array {


        $categories = array("Art", "Bandes dessinées", "Biographies, autobiographies", "Contes", "Cuisine", "Enfants", "Epopées", "Fictions", "Horreur", "Mangas", "Musique", "Philosophie", "Poésie", "Religion", "Romans fantastiques", "Romans historiques", "Romans policiers, thrillers", "Romans de science-fiction", "Romans sentimentaux", "Sciences", "Scolaire", "Sport", "Théâtre", "Voyages");
        $messages = [];

        if(isset($_POST["submit"])) {
            if(!isset($_POST["title"]) || strlen($_POST["title"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer le titre du livre."
                ];
            }
            if(!isset($_POST["author"]) || strlen($_POST["author"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer l'auteur du livre."
                ];
            }
            if(!isset($_POST["releaseYear"]) || ($_POST["releaseYear"]) < 1500 || ($_POST["releaseYear"]) > date("Y")) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer une année de sortie du livre valide."
                ];
            }
            $validISBN = preg_match('@(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)@', $_POST["ISBN"]);
            if(!isset($_POST["ISBN"]) || !$validISBN) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un ISBN valide."
                ];
            }
            if(!isset($_POST["publisher"]) || strlen($_POST["publisher"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer la maison d'édition du livre."
                ];
            }
            if(!isset($_POST["category"]) || !in_array(($_POST["category"]), $categories)) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer la catégorie du livre parmi les choix disponibles."
                ];
            }
            if(!isset($_POST["lang"]) || strlen($_POST["lang"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer la langue dans laquelle le livre est écrit."
                ];
            }

            if(isset($_FILES["picture"])) {

                if($_FILES["picture"]["error"] != 0) {
                    $messages[] = [
                        "success" => false,
                        "text" => "Une erreur a été rencontrée lors de l'envoi du fichier."
                    ];
                }
                $filetype = $_FILES["picture"]["type"];
                $extensions = ["image/png", "image/jpeg", "image/webp"];
                if(!in_array($filetype, $extensions)) {
                    $messages[] = [
                        "success" => false,
                        "text" => "Le format de l'image est incorrect, celui-ci peut être de type jpg, png ou webp."
                    ];
                } 
                $filesize = $_FILES["picture"]["size"]; 
                $maxsize = 1048576;
                if($filesize > $maxsize) {
                    $messages[] = [
                        "success" => false,
                        "text" => "La taille du fichier est supérieure au poids maximal autorisé (1 Mo)."
                    ];
                } 
                if(count($messages) == 0) {
                    $picture = time() . $_FILES["picture"]["name"]; 
                    move_uploaded_file($_FILES["picture"]["tmp_name"], __DIR__ . "/../assets/img/books/" . $picture);
                }
            } 
            else {
                $picture = null; 
            }

            if(count($messages) == 0) {
                $messages[] = [
                    "success" => true,
                    "text" => "Le fiche du livre a bien été créée."
                ];

                $title = htmlspecialchars($_POST["title"]);
                $author = htmlspecialchars($_POST["author"]);
                $publisher = htmlspecialchars($_POST["publisher"]);
                $lang = htmlspecialchars($_POST["lang"]);
                $description = htmlspecialchars($_POST["description"]);
                

                Book::create($title, $author, $_POST["releaseYear"], $_POST["ISBN"], $publisher, $_POST["category"], $lang, $description, $picture);
            }
        }
        return $messages;
    }


    public function readAllValidate(): array {
        if(isset($_GET["bookSearch"])) {
            $books = Book::bookSearch(); 
        } else {
            $books = Book::readAll();
        }
        return $books;
    }








}