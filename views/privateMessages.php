<h2>Messagerie</h2>

<!-- Mettre boutons pour switcher de boite de réception à messages envoyés -->


<?php

if(!$messagesReceived) {
    ?> <p>Aucun message reçu.</p> <?php
} 
else{
    foreach($messagesReceived as $messagereceived) { ?>

<div class="col-sm-6 col-md-4 p-3">
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <p class="card-text">AUTEUR</p>
                <p class="card-text">SUJET DU MESSAGE</p>
                <p class="card-text">DATE ET HEURE RECEPTION MESSAGE</p>
                <p class="card-text">DEBUT CONTENU MESSAGE</p>
                <a class="card-text" href="/../fiche-livre.php?id=<?= $book->id_book ?>"><button class="btn">Aperçu du message</button></a>
            </div>
        </div>
    </div>

        <?php 
    }
}