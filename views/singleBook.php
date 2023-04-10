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

<?php

if(count($comments) > 0) {
    foreach($comments as $comment) {
        if($comment["success"]) { ?>
            <p class="alert alert-success"><?= $comment["text"] ?></p>
        <?php }
        else { ?>
            <p class="alert alert-danger"><?= $comment["text"] ?></p>
        <?php }
    }
}

?>

<?php

if(count($ratingsMessages) > 0) {
    foreach($ratingsMessages as $ratingsMessage) {
        if($ratingsMessage["success"]) { ?>
            <p class="alert alert-success"><?= $ratingsMessage["text"] ?></p>
        <?php }
        else { ?>
            <p class="alert alert-danger"><?= $ratingsMessage["text"] ?></p>
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

<div class="rating"> 
    <div class="ratingIntro">
        <h3>Note des utilisateurs : </h3>
        <?php
            if($average == false) {
                ?> <p>Aucune note pour ce livre n'a été donnée pour le moment.</p> <?php
            } else {
                ?> <p class="bookRating"><?= $average ?></p> <?php
            } ?>

        <button class="btn btn-primary" id="displayRatingFormBtn">Notez ce livre</button>
    </div>
    <div id="ratingForm" style="display:none; opacity:0; transition: opacity 1s">
    <?php

    if(isset($_SESSION["id_user"])){ ?>
        <form action="#" method="POST" >
        <div class="ratingForm">
            <legend>Votre note :</legend>
                <input type="radio" id="1" name="rating" value="1">
                <label for="1">1/10</label>

                <input type="radio" id="2" name="rating" value="2">
                <label for="2">2/10</label>

                <input type="radio" id="3" name="rating" value="3">
                <label for="3">3/10</label>

                <input type="radio" id="4" name="rating" value="4">
                <label for="4">4/10</label>

                <input type="radio" id="5" name="rating" value="5">
                <label for="5">5/10</label>

                <input type="radio" id="6" name="rating" value="6">
                <label for="6">6/10</label>

                <input type="radio" id="7" name="rating" value="7">
                <label for="7">7/10</label>

                <input type="radio" id="8" name="rating" value="8">
                <label for="8">8/10</label>

                <input type="radio" id="9" name="rating" value="9">
                <label for="9">9/10</label>

                <input type="radio" id="10" name="rating" value="10">
                <label for="10">10/10</label>
        </div>
        <div class="submitRating">
            <button type="submit" class="btn btn-primary" name="submitRating">Enregistrer ma note</button>
        </div>
    </form> <?php
    } else {
        ?> <p class="verifyLogin">Vous devez être connecté pour afficher le formulaire. Rendez-vous à la page de connexion <a href="/connexion.php">ici</a>.</p>
        <?php 
    }
       ?>

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

