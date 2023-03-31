<h2>Messages envoyés</h2>

<a class="card-text" href="/../messagerie.php"><button class="btn">Boîte de réception</button></a>

<?php

if(!$messagesSent) {
    ?> <p>Aucun message envoyé.</p> <?php
} 
else{
    foreach($messagesSent as $messageSent) { ?>

<div class="col-12 p-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">A : <?= $messageSent->destinataire->firstname ?></p>
                <p class="card-text">Objet : <?= $messageSent->messageSubject ?></p>
                <p class="card-text">Date et heure d'envoi : <?= $messageSent->date ?></p>
                <p class="card-text"><?= $messageSent->message ?></p>
                <a class="card-text" href="/../message.php?id_message=<?= $messageSent->id_message ?>"><button class="btn">Voir le message</button></a>
            </div>
        </div>
    </div>

        <?php 
    }
}