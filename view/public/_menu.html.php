<ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link scroll-link " aria-current="page" href="./">Accueil</a></li>
   
    <?php
    // si connecté
    if(isset($_SESSION['username'])):
    ?>
        <li class="nav-item"><a class="nav-link scroll-link  " href="./?pg=admin">Administration</a></li>
        <li class="nav-item"><a class="nav-link scroll-link" href="./?pg=disconnect">Déconnexion de <?=$_SESSION['username']?></a></li>
    <?php
    // pas connecté
    else:
    ?>
    <li class="nav-item"><a class="nav-link scroll-link" href="./?pg=login">Connexion</a></li>
    <?php
    endif;
    ?>
</ul>