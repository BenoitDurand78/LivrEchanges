<h2>Fiche livre</h2>


<div class="bookSection">
    <div class="bookPicture">
        <img src="../assets/img/books/<?= $book->picture ?>" alt="Image d'illustration de <?= $book->title ?>">
    </div>
    <div class="bookInfo">
        <h3><?= $book->title ?></h3>
        <p>Écrit par <?= $book->author ?></p>
        <p>Date de publication originale : <?= $book->releaseYear ?></p>
        <p>Langue de cette version : <?= $book->lang ?></p>
        <p>Catégorie : <?= $book->category ?></p>
        <p>Numéro ISBN : <?= $book->ISBN ?></p>
        <p>Description du livre : <?= $book->description ?></p>
    </div>
</div>