<h2>Messages envoyés</h2>

<div class="receivedMessagesBtn">
    <a class="card-text" href="/../messagerie.php"><button class="btn">Boîte de réception</button></a>
</div>

<section class="messages">
    

    <?php

    if(!$messagesSent) {
        ?> <p>Aucun message envoyé.</p> <?php
    } 
    else{
        foreach($messagesSent as $messageSent) { ?>

    <div class="col-10 p-3 message">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">A : <br/><?= $messageSent->destinataire->firstname ?></p>
                    <p class="card-text">Objet : <br/><?= $messageSent->messageSubject ?></p>
                    <p class="card-text">Date et heure d'envoi : <br/><?= $messageSent->displayDate() ?></p>
                    <p class="card-text">Aperçu du message : <br/><?= $messageSent->message ?></p>
                    <a class="card-text" href="/../message.php?id_message=<?= $messageSent->id_message ?>"><button class="btn">Voir le message</button></a>
                </div>
            </div>
        </div>

            <?php 
        }
    }
    ?>

</section>