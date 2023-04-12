<?php

    if ($donations == []) {
        return false;
    } else { ?>

        <h2>Liste des donneurs </h2>
        <div id="donorsList">
            <div id="map"></div>


        <script>
            let x = 46.589;
            let y = 2.000;
            let zoom = 6;

            const map = L.map('map').setView([x, y], zoom);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let url;

            <?php

            foreach ($donations as $donation) {  ?>

                url = 'https://nominatim.openstreetmap.org/search?q=<?= $donation->user->postalCode ?>&format=json';

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

        <aside class="list">

            <?php

            foreach ($donations as $donation) {
            ?>
                <div class="col-12 m-2">
                    <div class="card donationCard">
                        <div class="card-body donationCardBody">
                            <div class="card-head donationCardHead">
                                <img class="donorPicture" src="/../assets/img/users/<?= $donation->user->picture ?>" alt="Illustration de <?= $donation->user->picture ?>">
                                <h3 class="card-title"><?= $donation->user->firstname ?></h3>
                            </div>
                            <div class="card-info">
                                <p class="card-text">État du livre : <?= $donation->bookCondition ?></p>
                                <p class="card-text">Offre publiée le <?= $donation->displayDate() ?></p>
                                <p class="card-text">Ville d'habitation : <?= $donation->user->city ?> (<?= $donation->user->postalCode ?>)</p>
                                <p class="card-text">Commentaire additionnel : <?= $donation->donationComment ?></p>
                                <a class="card-text" href="/../nouveau-message.php?id_donation=<?= $donation->id_donation ?>"><button class="btn">Contacter la personne</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        </aside>

    </div>