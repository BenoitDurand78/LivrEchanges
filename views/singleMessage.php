<h2>Message</h2>

<a class="card-text" href="/../messagerie.php"><button class="btn">Retour à la messagerie</button></a>

<p>A : <?= $singleMessage->destinataire->firstname ?></p>
<p>Message de : <?= $singleMessage->author->firstname ?></p>
<p>Sujet du message : <?= $singleMessage->messageSubject ?></p>
<p>Contenu du message : <?= $singleMessage->message ?></p>



<h3>Répondre</h3>

<?php

if(count($messages) > 0) {
    foreach($messages as $message) {
        if($message["success"]) { ?>
            <p class="alert alert-success"><?= $message["text"] ?></p>
        <?php }
        else { ?>
            <p class="alert alert-danger"><?= $message["text"] ?></p>
        <?php }
    }
}

?>


<form action="#" method="POST" class="g-4 mx-auto">
    <div class="row g-4 m-5 justify-content-center">
        <div>
            <label for="id_destinataire" class="form-label">Destinataire du message :</label>
            <input type="text" class="form-control" id="id_destinataire" value="<?= $singleMessage->author->firstname ?>" name="email" disabled>
        </div>

        <div>
            <label for="messageSubject" class="form-label">Sujet du message :</label>
            <input type="text" class="form-control" id="messageSubject" value="<?= $singleMessage->messageSubject ?>" name="messageSubject" disabled>
        </div>

        <div>
            <label for="message">Votre message :</label>
            <textarea id="message" name="message" rows="7" cols="50" placeholder="Inscrivez votre message ici..."></textarea>
        </div>

        <div class="col-12 mx-auto text-center updateButton">
            <button type="submit" class="btn btn-primary" name="submit">Envoyer le message</button>
        </div>

    </div>

</form>