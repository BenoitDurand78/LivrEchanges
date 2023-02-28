<main>
    <section>
        <h2>Créer un compte Livr'Échanges</h2>

        <?php

        if (count($messages) > 0) {
            foreach ($messages as $message) {
                if ($message["success"]) { ?>
                    <p class="alert alert-success"><?= $message["text"] ?></p>
                <?php } else { ?>
                    <p class="alert alert-danger"><?= $message["text"] ?></p>
        <?php }
            }
        }

        ?>

        <form action="#" method="POST" enctype="multipart/form-data" class="container g-5 mx-auto">
            <div class="row g-3 m-3 justify-content-center">
                <div class="col-12 mx-auto text-center">
                    <label for="photo"><i class="bi bi-person-bounding-box" style="font-size: 100px"></i></label><br />
                    <input type="file" id="photo" name="photo">
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-3 mx-auto">
                    <label for="civility">Sélectionnez votre civilité : </label>
                    <select name="civility" id="civility" class="form-control" required>
                        <option value=""></option>
                        <option value="Monsieur">Monsieur</option>
                        <option value="Madame">Madame</option>
                    </select>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="surname" class="form-label">Nom : </label>
                    <input type="text" class="form-control" name="surname" id="surname" aria-describedby="nameHelp" required>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="nameHelp" required>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="birthDate" class="form-label">Date de naissance :</label>
                    <input type="date" class="form-control" name="birthDate" id="birthDate" aria-describedby="emailHelp">
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" minlength="8" id="password" required>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="passwordCheck" class="form-label">Confirmez le mot de passe :</label>
                    <input type="password" class="form-control" name="passwordCheck" minlength="8" id="passwordCheck" required>
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-12 col-lg-8 mx-auto">
                    <label for="streetName" class="form-label">Numéro et nom de rue :</label>
                    <input type="text" class="form-control" id="streetName" name="streetName">
                </div>
            </div>

            <div class="row g-3 m-3 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <label for="postalCode" class="form-label">Code postal :</label>
                    <input type="text" class="form-control" name="postalCode" id="postalCode" required>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <label for="city" class="form-label">Ville :</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                </div>
            </div>

            <div class="col-12 mx-auto text-center">
                <button type="submit" class="btn btn-primary" name="submit">Créer mon compte</button>
            </div>

        </form>

    </section>


</main>