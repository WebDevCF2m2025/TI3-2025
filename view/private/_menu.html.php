<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./">
            <img src="https://www.cf2m.be/img/logo.png" alt="Logo CF2M" height="40" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="navbar-nav ms-auto">
                <!-- Correction : usage cohérent de ?pg=... -->
                <li class="nav-item"> <a class="nav-link" href="./">Accueil</a></li>
                <?php
                // si nous sommes connectés
                if(isset($_SESSION['username'])):
                    ?>
                    <li class="nav-item"> <a class="nav-link <?= (isset($_GET['pg']) && $_GET['pg'] === 'admin' || $_GET['pg'] === 'addLoc') ? 'active' : '' ?>" href="./?pg=admin">Administration</a></li>
                    <li class="nav-item"> <a class="nav-link" href="./?pg=logout">Déconnexion</a></li>
                    <a href="#" class="nav-link small"> | Connecté en tant qu'<?=$_SESSION['username']?></a>

                <?php
                // nous ne sommes pas connecté
                else:
                    ?>
                    <a class="nav-link <?= (isset($_GET['pg']) && $_GET['pg'] === 'login') ? 'active' : '' ?>">Connexion</a>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</nav>
