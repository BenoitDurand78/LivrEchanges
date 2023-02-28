<?php

require_once(__DIR__ . "/../assets/inc/connectionDB.php");

class NewBook {
    public int $id_book; 
    public string $title;
    public string $author;
    public int $releaseYear;
    public string $isbn;
    public string $publisher;
    public string $category;
    public string $lang;
    

}