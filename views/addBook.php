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

<form action="" method="POST" enctype="multipart/form-data">

    <label for="title">Indiquer le titre du livre : </label>
    <input type="text" name="title" id="title">
    <br/>

    <label for="author">Indiquer l'auteur du livre : </label>
    <input type="text" name="author" id="author">
    <br/>

    <label for="releaseYear">Indiquer l'année de sortie du livre : </label>
    <input type="text" name="releaseYear" id="releaseYear">
    <br/>

    <!-- Indiquez ici comment trouver l'ISBN, modal? -->
    <label for="ISBN">Indiquer l'ISBN du livre (sans espaces ni tirets) : </label> 
    <input type="text" name="ISBN" id="ISBN">
    <br/>

    <label for="publisher">Indiquer la maison d'édition du livre : </label> 
    <input type="text" name="publisher" id="publisher">
    <br/>

    <!-- Faire la liste des catégories ici -->
    <label for="category">Indiquer la catégorie du livre :</label>
    <select name="category" id="category">
        <option value="">--Sélectionner une option--</option>
        <option value="choix1">choix1</option>
        <option value="choix2">choix2</option>
        <option value="choix3">choix3</option>
        <option value="choix4">choix4</option>
        <option value="choix5">choix5</option>
        <option value="choix6">choix6</option>
    </select>
    <br/>

    <label for="lang">Indiquer la langue dans laquelle le livre est écrit : </label>
    <input type="text" name="lang" id="lang">
    <br/>

    <label for="picture">Télécharger une image de la couverture du livre : </label>
    <input type="file" id="picture" name="picture" accept=".jpg,.jpeg,.png,.webp">
    <br/>

    <label for="description">Écrire la description du livre (texte en quatrième de couverture) : </label>
    <textarea id="description" name="description" rows="5" cols="33">
    </textarea>
    <br/>

    <input type="submit" value="Créer la fiche livre" class="submit" name="submit">

</form>