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

<form action="#" method="POST" class="g-4 mx-auto">
    <div class="row g-4 m-5 justify-content-center">
        <div>
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" value="<?= $user->email ?>" aria-describedby="emailHelp" name="email">
        </div>

        <div>
            <label for="oldPassword" class="form-label">Ancien mot de passe :</label>
            <input type="password" class="form-control" id="oldPassword" aria-describedby="emailHelp" name="oldPassword">
        </div>

        <div>
            <label for="newPassword" class="form-label">Nouveau mot de passe :</label>
            <input type="password" class="form-control" id="newPassword" aria-describedby="emailHelp" name="newPassword">
        </div>

        <div>
            <label for="passwordCheck" class="form-label">Confirmation du nouveau mot de passe :</label>
            <input type="password" class="form-control" id="passwordCheck" aria-describedby="emailHelp" name="passwordCheck">
        </div>

        <div class="col-12 mx-auto text-center updateButton">
            <button type="submit" class="btn btn-primary" name="submit">Modifier mes informations</button>
        </div>

    </div>

</form>