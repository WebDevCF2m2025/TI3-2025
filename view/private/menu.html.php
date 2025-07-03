<!-- TI3-2025/view/public/homePage.html.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="./?pg=accueil"><?php echo htmlspecialchars($_SESSION['username']); ?></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="./?pg=accueil">Accueil</a></li>
                <?php
                // Si nous sommes connectés
                if (isset($_SESSION['idutilisateurs'])) :
                ?>
                    <li class="nav-item"><a class="nav-link" href="./?pg=admin">Administration</a></li>
                    <li class="nav-item"><a class="nav-link" href="./?pg=logout">Déconnexion</a></li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</nav>