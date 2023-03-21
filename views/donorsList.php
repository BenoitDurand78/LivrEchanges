<section>

<h2>Liste des donneurs </h2>


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
                        <img class="donorPicture" src="/../assets/img/users/<?= $donation->user->picture ?>" alt="Illustration de <?= $donation->user->picture ?>">
                    </div>
                    <div class="card-info">
                        <h3 class="card-title"><?= $donation->user->firstname ?></h3>
                        <p class="card-text">État du livre : <?= $donation->bookCondition ?></p>
                        <p class="card-text">Offre publiée le <?= $donation->displayDate() ?></p>
                        <p class="card-text">Ville d'habitation : <?= $donation->user->city ?> (<?= $donation->user->postalCode ?>)</p>
                        <p class="card-text">Commentaire additionnel : <?= $donation->donationComment ?></p>
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