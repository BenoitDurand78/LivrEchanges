<section>

    <h2 id="bookSearch">Rechercher un livre ou un auteur</h2>
    <form action="/recherche.php?page=1" method="GET" class="bookSearchForm">
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
        <div class="card">
            <div class="card-body">
                <div class="card-img">
                    <img src="/../assets/img/books/<?= $book->picture ?>" alt="Illustration de <?= $book->title ?>" class="bookImg">
                </div>
                <div class="card-info">
                    <h3 class="card-title"><?= $book->title ?></h3>
                    <p class="card-text bookInfo">écrit par <?= $book->author?></p>
                    <p class="card-text bookInfo">publié en <?= $book->releaseYear ?></p>
                    <p class="card-text bookInfo"><?= $book->category ?></p>
                    <div class="singleBookBtn">
                        <a class="card-text" href="/../fiche-livre.php?id=<?= $book->id_book ?>"><button class="btn">Consulter la fiche de ce livre</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
?>

</div>

<?php
    if(!isset($_GET["bookSearch"])) { ?>

        <nav class="paginationNav">
            <ul class="pagination">

                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="/recherche.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>

                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="/recherche.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>

                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="/recherche.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
        <?php 
    } ?>

</section>