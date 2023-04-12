<h2>Création d'une nouvelle fiche livre</h2>

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

<section class="addBook">

<?php

if(isset($_SESSION["id_user"])){ ?>

    <form action="" class="row g-2 m-2" method="POST" enctype="multipart/form-data">

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="title">Titre du livre : </label>
        <input type="text" name="title" id="title" value="<?= (isset($_POST["title"]) ? ($_POST["title"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="author">Auteur du livre : </label>
        <input type="text" name="author" id="author" value="<?= (isset($_POST["author"]) ? ($_POST["author"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="releaseYear">Année de sortie du livre : </label>
        <input type="text" name="releaseYear" id="releaseYear" value="<?= (isset($_POST["releaseYear"]) ? ($_POST["releaseYear"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <!-- Indiquez ici comment trouver l'ISBN, modal? -->
        <label for="ISBN">ISBN du livre : </label> 
        <input type="text" name="ISBN" id="ISBN" value="<?= (isset($_POST["ISBN"]) ? ($_POST["ISBN"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="publisher">Maison d'édition du livre : </label> 
        <input type="text" name="publisher" id="publisher" value="<?= (isset($_POST["publisher"]) ? ($_POST["publisher"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="category">Catégorie du livre :</label>
        <select name="category" id="category">
            <option value="">--Sélectionner une option--</option>
            <option value="Art" <?= (isset($_POST["category"]) == "Art" ? "selected" : "") ?>>Art</option>
            <option value="Bandes dessinées" <?= (isset($_POST["category"]) == "Bandes dessinées" ? "selected" : "") ?>>Bandes dessinées</option>
            <option value="Biographies, autobiographies" <?= (isset($_POST["category"]) == "Biographies, autobiographies" ? "selected" : "") ?>>Biographies / Autobiographies</option>
            <option value="Contes" <?= (isset($_POST["category"]) == "Contes" ? "selected" : "") ?>>Contes</option>
            <option value="Cuisine" <?= (isset($_POST["category"]) == "Cuisine" ? "selected" : "") ?>>Cuisine</option>
            <option value="Enfants" <?= (isset($_POST["category"]) == "Enfants" ? "selected" : "") ?>>Enfants</option>
            <option value="Epopées" <?= (isset($_POST["category"]) == "Epopées" ? "selected" : "") ?>>Epopées</option>
            <option value="Fictions" <?= (isset($_POST["category"]) == "Fictions" ? "selected" : "") ?>>Fictions</option>
            <option value="Horreur" <?= (isset($_POST["category"]) == "Horreur" ? "selected" : "") ?>>Horreur</option>
            <option value="Mangas" <?= (isset($_POST["category"]) == "Mangas" ? "selected" : "") ?>>Mangas</option>
            <option value="Musique" <?= (isset($_POST["category"]) == "Musique" ? "selected" : "") ?>>Musique</option>
            <option value="Philosophie" <?= (isset($_POST["category"]) == "Philosophie" ? "selected" : "") ?>>Philosophie</option>
            <option value="Poésie" <?= (isset($_POST["category"]) == "Poésie" ? "selected" : "") ?>>Poésie</option>
            <option value="Religion" <?= (isset($_POST["category"]) == "Religion" ? "selected" : "") ?>>Religion</option>
            <option value="Romans fantastiques" <?= (isset($_POST["category"]) == "Romans fantastiques" ? "selected" : "") ?>>Romans fantastiques</option>
            <option value="Romans historiques" <?= (isset($_POST["category"]) == "Romans historiques" ? "selected" : "") ?>>Romans historiques</option>
            <option value="Romans policiers, thrillers" <?= (isset($_POST["category"]) == "Romans policiers, thrillers" ? "selected" : "") ?>>Romans policiers, thrillers</option>
            <option value="Romans de science-fiction" <?= (isset($_POST["category"]) == "Romans de science-fiction" ? "selected" : "") ?>>Romans de science-fiction</option>
            <option value="Romans sentimentaux" <?= (isset($_POST["category"]) == "Romans sentimentaux" ? "selected" : "") ?>>Romans sentimentaux</option>
            <option value="Sciences" <?= (isset($_POST["category"]) == "Sciences" ? "selected" : "") ?>>Sciences</option>
            <option value="Scolaire" <?= (isset($_POST["category"]) == "Scolaire" ? "selected" : "") ?>>Scolaire</option>
            <option value="Sport" <?= (isset($_POST["category"]) == "Sport" ? "selected" : "") ?>>Sport</option>
            <option value="Théâtre" <?= (isset($_POST["category"]) == "Théâtre" ? "selected" : "") ?>>Théâtre</option>
            <option value="Voyages" <?= (isset($_POST["category"]) == "Voyages" ? "selected" : "") ?>>Voyages</option>
        </select>
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="lang">Langue dans laquelle le livre est écrit : </label>
        <input type="text" name="lang" id="lang" value="<?= (isset($_POST["lang"]) ? ($_POST["lang"]) : "") ?>">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="picture">Image de la couverture du livre : </label>
        <input type="file" id="picture" name="picture" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <div class="col-12 g-4">
        <label for="description">Description du livre (texte en quatrième de couverture) : </label>
        <textarea id="description" name="description" rows="5" cols="33"><?= (isset($_POST["description"]) ? ($_POST["description"]) : "") ?></textarea>
    </div>

        <div class="col-12 mx-auto g-5 text-center submitNewBook">
            <input type="submit" value="Créer la fiche livre" class="btn btn-primary form_sub" name="submit">
        </div>

    </form>

    <?php
    } else {
        ?> <p class="loginVerify">Vous devez être connecté pour créer une fiche livre. Rendez-vous à la page de connexion <a href="/connexion.php">ici</a>.</p>
        <?php 
    }
       ?>

</section>