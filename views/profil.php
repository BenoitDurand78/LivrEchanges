<h2>Bienvenue sur votre profil</h2>

<section>
    <div id="profil">
        <div>
            <img class="profilPicture" src="/../assets/img/users/<?= $user->picture ?>" alt="Photo de profil">
        </div>
        <div class="infoProfile">
            <i class="bi bi-person-fill" style="font-size: 60px;"></i>
            <p><?= $user->surname ?></p>
            <p><?= $user->firstname ?></p>
            <i class="bi bi-envelope-at-fill" style="font-size: 60px;"></i>
            <p><?= $user->email ?></p>
            <i class="bi bi-geo-fill" style="font-size: 60px;"></i>
            <p><?= $user->streetName ?></p>
            <p><?= $user->postalCode ?></p>
            <p><?= $user->city ?></p>
        </div>
    </div>

    <div class="description">
        <i class="bi bi-info-circle-fill" style="font-size: 60px;"></i>
        <p class="descriptionText">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi provident deleniti perspiciatis laboriosam animi. Exercitationem culpa natus incidunt possimus quisquam cumque dicta explicabo deserunt reiciendis. Explicabo amet distinctio ab quod.</p>
    </div>
    
    <div id="buttonsProfile">
        <button class="btn btn-primary">Modifier mes informations personnelles</button>
        <button class="btn btn-primary">Voir mes dons en cours</button>
    </div>

</section>