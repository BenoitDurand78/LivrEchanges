<h2>Fiche livre</h2>

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

<div class="bookSection">
    <div class="bookPicture">
        <img src="../assets/img/books/<?= $book->picture ?>" alt="Image d'illustration de <?= $book->title ?>">
    </div>
    <div class="bookInfo">
        <h3><?= $book->title ?></h3>
        <p>Écrit par <?= $book->author ?></p>
        <p>Date de publication originale : <?= $book->releaseYear ?></p>
        <p>Langue de cette version : <?= $book->lang ?></p>
        <p>Catégorie : <?= $book->category ?></p>
        <p>Numéro ISBN : <?= $book->ISBN ?></p>
        <p>Description du livre : <?= $book->description ?></p>
    </div>
</div>

<hr/>

<div class="donation">
    <div class="donationIntro">
        <h3>Vous possédez ce livre et souhaitez le donner?</h3>
        <button class="btn btn-primary" id="displayFormBtn">Cliquez ici pour remplir le formulaire</button>
    </div>

    <div id="donationForm" style="display:none; opacity:0; transition: opacity 1s">
    <?php

    if(isset($_SESSION["id_user"])){ ?>
        <form action="#" method="POST" >
        <div class="donationForm">
            <div class="bookCondition">
                <label for="bookCondition">État du livre :</label>
                    <select name="bookCondition" id="bookCondition">
                        <option value="">--Sélectionner une option--</option>
                        <option value="Neuf">Neuf</option>
                        <option value="Très bon état">Très bon état</option>
                        <option value="État correct">État correct</option>
                        <option value="Mauvais état">Mauvais état</option>
                    </select>
            </div>

            <div class="donationComment">
                <label for="donationComment">Commentaire sur le livre en votre possession (facultatif, 500 caractères maximum) : </label>
                <textarea id="donationComment" name="donationComment" rows="5" cols="40"></textarea>    
            </div>
        </div>
        <div class="donationSubmit">
            <button type="submit" class="btn btn-primary" name="submit">Me mettre sur la liste des donneurs</button>
        </div>
    </form> <?php
    } else {
        ?> <p class="verifyLogin">Vous devez être connecté pour afficher le formulaire. Rendez-vous à la page de connexion <a href="/connexion.php">ici</a>.</p>
        <?php 
    }
       ?>
    </div>
</div>

