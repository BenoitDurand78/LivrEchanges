<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/assets/logoFav.ico" />
  <?php 
  if(defined("SCRIPT")) { ?>
    <script defer src="/assets/js/<?= SCRIPT ?>.js"></script>
  <?php }
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/assets/css/<?= CSS ?>.css" type="text/css" />
  <title><?= TITLE ?></title>
</head>

<header>


<?php

if(isset($_SESSION["firstname"])) { ?>
  <p id="welcome"> Bienvenue <?= $_SESSION["firstname"] ?> ! <a href="/deconnexion.php">Déconnexion</a></p> <?php
}

?>

  <img src="../assets/logo4_1.png" alt="logo Livr'Échanges" id="logo">

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/recherche.php">Recherche de livre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ajouter-un-livre.php">Ajout de livre</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Espace personnel
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="connection.php">Connexion</a></li>
                <li><a class="dropdown-item" href="/profil.php">Mon profil</a></li>
                <li><a class="dropdown-item" href="#">Mes dons en cours</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Messagerie</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <hr/>

</header>