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
    }elseif($_GET['pg']==="about"){
      $activeAbout = "active";
    }elseif($_GET['pg']==="admin"){
      $activeAdmin = "active";
    }
    ?>
    <div class="collapse navbar-collapse" id="mainNavbar">
      <div class="navbar-nav ms-auto">
        <!-- Correction : usage cohérent de ?pg=... -->
        <a class="nav-link <?=$activeHome?>" href="./">Accueil</a>
        <a class="nav-link <?=$activeAbout?>" href="./?pg=about">À propos</a>
        <?php
        // si nous sommes connectés
        if(isset($_SESSION['username'])):
          ?>
          <span class="nav-link small"> | <?=$_SESSION['username']?></span>
          <a class="nav-link <?=$activeAdmin?>" href="./?pg=admin">Administration</a>
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
