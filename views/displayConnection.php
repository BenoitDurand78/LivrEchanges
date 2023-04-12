<main>
    <h2>Connexion à votre compte </h2>

    <form method="post">
            <label for="email"><i class="bi bi-at" style="font-size: 50px;"></i></label>
            <input type="email" name="email" id="email" placeholder="Email de connexion" required>

            <label for="password"><i class="bi bi-lock" style="font-size: 50px;"></i></label>
            <input type="password" id="password" name="password" minlength="8" placeholder="Mot de passe" required>
            <p>Mot de passe oublié? Cliquez <a href="#">ici</a> pour le réinitialiser.</p>

            <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
    </form>
    

    <p>Pas de compte? Créez le vôtre <a href="/inscription.php">ici</a> !</p>
</main>