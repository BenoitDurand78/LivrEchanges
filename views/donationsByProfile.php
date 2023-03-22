<section>

<h2 id="donationsList">Liste de vos dons </h2>


<?php 

if($donations == [])  {
    return false;
} else { ?>
    <div class="row">
    <?php 

    foreach($donations as $donation) {
    ?>
        <div class="col-sm-6 col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-img">
                        <img class="bookPicture" src="/../assets/img/books/<?= $donation->book->picture ?>" alt="Illustration de <?= $donation->book->picture ?>">
                    </div>
                    <div class="card-info">
                        <h3 class="card-title"><?= $donation->book->title ?></h3>
                        <p class="card-text">Auteur du livre : <?= $donation->book->author ?></p>
                        <p class="card-text">Date de sortie du livre : <?= $donation->book->releaseYear ?></p>
                        <p class="card-text">État du livre : <?= $donation->bookCondition ?></p>
                        <p class="card-text">Offre publiée le <?= $donation->displayDate() ?></p>
                        <p class="card-text">Commentaire additionnel : <?= $donation->donationComment ?></p>
                        <a class="card-text" href="../fiche-livre.php?id=<?= $donation->book->id_book ?>">Fiche du livre</a>
                        <br/>
                        <a class="card-text" href="../modifier-un-don.php?id_donation=<?= $donation->id_donation ?>">Modifier ce don</a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    }
}
?>
    </div>

</section>