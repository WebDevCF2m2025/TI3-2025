<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<div class="navbar navbar-expand-lg bg-white border-bottom shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="./">
      My-Map
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    // par défaut, on peut appliquer une valeur à plusieurs variables
    $activeHome = $activeAbout = $activeLogin = $activeAdmin = "";
    if(!isset($_GET['pg'])){
      $activeHome = "active";
    }elseif($_GET['pg']==="admin"){
      $activeAdmin = "active";
    }elseif($_GET['pg']==="addMarker"){
      $activeMarker = "active";
    }

    ?>
    <div class="collapse navbar-collapse" id="mainNavbar">
      <div class="navbar-nav ms-auto">
        <!-- Correction : usage cohérent de ?pg=... -->
        <a class="nav-link <?=$activeHome?>" href="./">Accueil</a>
        <?php
        // si nous sommes connectés
        if(isset($_SESSION['username'])):
          ?>
          <a class="nav-link <?=$activeMarker?>" href="./?pg=addMarker">Marqueurs</a>
          <a class="nav-link <?=$activeAdmin?>" href="./?pg=admin">Administration</a>
          <span class="nav-link small"> | <?=$_SESSION['username']?></span>
          <a class="nav-link" href="./?pg=logout">Déconnexion</a>

        <?php
        // nous ne sommes pas connecté
        else:
          ?>
          <a class="nav-link <?=$activeLogin?>" href="./?pg=login">Connexion</a>
        <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</div>
