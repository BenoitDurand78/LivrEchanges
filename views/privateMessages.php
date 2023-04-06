<h2>Messagerie</h2>

<section class="messages">
    <a class="card-text" href="/../messages-envoyes.php"><button class="btn">Messages envoyés</button></a>

    <?php

    if(!$messagesReceived) {
        ?> <p>Aucun message reçu.</p> <?php
    } 
    else{
        foreach($messagesReceived as $messageReceived) { ?>

    <div class="col-10 p-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">De : <?= $messageReceived->author->firstname ?></p>
                    <p class="card-text">Objet : <?= $messageReceived->messageSubject ?></p>
                    <p class="card-text">Date et heure de réception : <?= $messageReceived->date ?></p>
                    <p class="card-text"><?= $messageReceived->message ?></p>
                    <a class="card-text" href="/../message.php?id_message=<?= $messageReceived->id_message ?>"><button class="btn">Voir le message</button></a>
                </div>
            </div>
        </div>

            <?php 
        }
    }
    ?>
</section>