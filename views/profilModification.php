<h2>Modification des informations personnelles</h2>

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

        <form action="#" method="POST" enctype="multipart/form-data" class="container g-5 mx-auto">
            <div class="row g-3 m-3 justify-content-center">
                <div class="col-12 mx-auto text-center">
                    <img src="/assets/img/users/<?=$user->picture ?>" alt="Photo de profil"><br/>
                    <input type="file" id="picture" name="picture">
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="surname" class="form-label">Nom : </label>
                    <input type="text" class="form-control" name="surname" id="surname" value="<?= $user->surname ?>" aria-describedby="nameHelp" required>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $user->firstname ?>" aria-describedby="nameHelp" required>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                <label for="civility">Sélectionnez votre civilité : </label>
                    <select name="civility" id="civility" class="form-control" required>
                        <option value="Monsieur" <?= ($user->civility == "Monsieur" ? "selected" : "") ?>>Monsieur</option>
                        <option value="Madame" <?= ($user->civility == "Madame" ? "selected" : "") ?>>Madame</option>
                    </select>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="birthDate" class="form-label">Date de naissance :</label>
                    <input type="date" class="form-control" name="birthDate" id="birthDate" value="<?= $user->birthDate ?>" aria-describedby="emailHelp" disabled>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-12 col-lg-8 mx-auto">
                    <label for="streetName" class="form-label">Numéro et nom de rue :</label>
                    <input type="text" class="form-control" id="streetName" name="streetName" value="<?= $user->streetName ?>" required>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="postalCode" class="form-label">Code postal :</label>
                    <input type="text" class="form-control" name="postalCode" id="postalCode" value="<?= $user->postalCode ?>" required>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="city" class="form-label">Ville :</label>
                    <input type="text" class="form-control" name="city" id="city" value="<?= $user->city ?>" required>
                </div>
            </div>

            <div class="col-12 mx-auto text-center updateButton">
                <button type="submit" class="btn btn-primary" name="submit">Modifier mes informations personnelles</button>
            </div>

        </form>