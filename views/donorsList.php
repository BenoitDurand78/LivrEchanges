<section id="donorsList">

<h3>Liste des donneurs </h3>


<?php 

if($donations == [])  {
    return false;
} else { ?>
<div>
    <div id="map"></div>
</div>
    <div class="row">


    <script>

        let x = 46.589;
        let y = 2.000;
        let zoom = 6;

        const map = L.map('map').setView([x, y], zoom);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

        let url;

        <?php

        
        foreach($donations as $donation) {  ?>

        url = 'https://nominatim.openstreetmap.org/search?q=<?=$donation->user->postalCode?>&format=json';

        fetch(url)
            .then((response) => response.json())
            .then((json) => {
                console.log(json); 

                let x = json[0].lat;
                let y = json[0].lon;

                var marker = L.marker([x, y]).addTo(map);
                
                marker.bindPopup("<?= $donation->user->firstname . "<br/>" . $donation->user->city . " " . $donation->user->postalCode ?>");

            })


        <?php }


       ?>

    </script>


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
                        <a class="card-text" href="/../message.php?id_donation=<?= $donation->id_donation ?>"><button class="btn">Contacter la personne</button></a>
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