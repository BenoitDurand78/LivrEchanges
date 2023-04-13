<h2>Messagerie</h2>

<div class="sentMessagesBtn">
    <a class="card-text" href="/../messages-envoyes.php"><button class="btn">Messages envoyés</button></a>
</div>

<section class="messages">
    

    <?php

    if(!$messagesReceived) {
        ?> <p>Aucun message reçu.</p> <?php
    } 
    else{
        foreach($messagesReceived as $messageReceived) { ?>

    <div class="col-10 p-3 message">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">De : <br/><?= $messageReceived->author->firstname ?></p>
                    <p class="card-text">Objet : <br/><?= $messageReceived->messageSubject ?></p>
                    <p class="card-text">Date et heure de réception : <br/><?= $messageReceived->displayDate() ?></p>
                    <p class="card-text">Aperçu du message : <br/><?= $messageReceived->message ?></p>
                    <a class="card-text" href="/../message.php?id_message=<?= $messageReceived->id_message ?>"><button class="btn">Voir le message</button></a>
                </div>
            </div>
        </div>

            <?php 
        }
    }
    ?>
</section>