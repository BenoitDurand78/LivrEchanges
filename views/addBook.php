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

    <form action="" class="row g-2 m-2" method="POST" enctype="multipart/form-data">

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="title">Titre du livre : </label>
        <input type="text" name="title" id="title">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="author">Auteur du livre : </label>
        <input type="text" name="author" id="author">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="releaseYear">Année de sortie du livre : </label>
        <input type="text" name="releaseYear" id="releaseYear">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <!-- Indiquez ici comment trouver l'ISBN, modal? -->
        <label for="ISBN">ISBN du livre : </label> 
        <input type="text" name="ISBN" id="ISBN">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="publisher">Maison d'édition du livre : </label> 
        <input type="text" name="publisher" id="publisher">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <!-- Faire la liste des catégories ici -->
        <label for="category">Catégorie du livre :</label>
        <select name="category" id="category">
            <option value="">--Sélectionner une option--</option>
            <option value="choix1">choix1</option>
            <option value="choix2">choix2</option>
            <option value="choix3">choix3</option>
            <option value="choix4">choix4</option>
            <option value="choix5">choix5</option>
            <option value="choix6">choix6</option>
        </select>
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="lang">Langue dans laquelle le livre est écrit : </label>
        <input type="text" name="lang" id="lang">
    </div>

    <div class="col-sm-6 g-4 d-flex flex-wrap formEntries">
        <label for="picture">Image de la couverture du livre : </label>
        <input type="file" id="picture" name="picture" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <div class="col-12 g-4">
        <label for="description">Description du livre (texte en quatrième de couverture) : </label>
        <textarea id="description" name="description" rows="5" cols="33">
        </textarea>
    </div>

        <div class="col-6 mx-auto g-5 text-center">
            <input type="submit" value="Créer la fiche livre" class="btn btn-primary form_sub" name="submit">
        </div>

    </form>

</section>