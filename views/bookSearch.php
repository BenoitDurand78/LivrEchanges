<section>

    <h2 id="bookSearch">Rechercher un livre ou un auteur</h2>
    <form action="/recherche.php" method="GET" class="bookSearchForm">
        <input type="search" name="bookSearch" class="search" placeholder="Titre du livre ou nom de l'auteur" size="30px">
        <button type="submit" class="btn btn-primary" name="submit">Rechercher</button>
    </form>

</section>

<section>

<div class="row">

<?php 
    foreach($books as $book) {
    ?>
    <div class="col-sm-6 col-md-4 p-4">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <img src="/../assets/img/books/<?= $book->picture ?>" alt="Illustration de <?= $book->title ?>">
                <h3 class="card-title"><?= $book->title ?></h3>
                <p class="card-text">écrit par <?= $book->author?></p>
                <p class="card-text">publié en <?= $book->releaseYear ?></p>

            </div>
        </div>
    </div>
    <?php 
    }
?>

</div>

</section>