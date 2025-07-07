<!-- TI3-2025/view/public/homePage.html.php -->
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="./?pg=accueil"><?php echo ($_SESSION['username']); ?></a> -->
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li><a class="nav-link text-light" href="./?pg=accueil">Accueil</a></li>
                    <?php
                    // Si nous sommes connectés
                    if (isset($_SESSION['idutilisateurs'])) :
                    ?>
                        <li><a class="nav-link text-light" href="./?pg=admin">Administration</a></li>
                        <li><a class="nav-link text-light" href="./?pg=logout">Déconnexion</a></li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <p class="bg-dark pb-3 text-light fst-italic">Bienvenue, vous êtes connecté en tant que : <a class="text-light" href="./?pg=profil"><?php echo ($_SESSION['username']); ?></a></p>
</div>