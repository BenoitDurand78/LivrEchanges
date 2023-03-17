<section>

    <h2 id="bookSearch">Rechercher un livre ou un auteur</h2>
    <form action="/recherche.php" method="GET" class="bookSearchForm">
        <input type="search" name="bookSearch" class="search" placeholder="Titre du livre ou nom de l'auteur" size="30px">
        <button type="submit" class="btn btn-primary" name="submit" id="btn-search">Rechercher</button>
    </form>

</section>

<section>

<div class="row">

<?php 
    foreach($books as $book) {
    ?>
    <div class="col-sm-6 col-md-4 p-3">
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <div class="card-img">
                    <img src="/../assets/img/books/<?= $book->picture ?>" alt="Illustration de <?= $book->title ?>">
                </div>
                <div class="card-info">
                    <h3 class="card-title"><?= $book->title ?></h3>
                    <p class="card-text">écrit par <?= $book->author?></p>
                    <p class="card-text">publié en <?= $book->releaseYear ?></p>
                    <p class="card-text"><?= $book->category ?></p>
                    <a class="card-text" href="/../fiche-livre.php?id=<?= $book->id_book ?>"><button class="btn">Consulter la fiche de ce livre</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
?>

</div>

</section>