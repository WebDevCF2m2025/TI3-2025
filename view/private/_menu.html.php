<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./">
            <img src="https://www.cf2m.be/img/logo.png" alt="Logo CF2M" height="40" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= !isset($_GET['pg']) ? 'active' : '' ?>" href="./">Accueil</a>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['pg']) && ($_GET['pg'] === 'admin' || $_GET['pg'] === 'addLoc')) ? 'active' : '' ?>" href="./?pg=admin">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?pg=logout">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link small disabled">| Connecté en tant qu'<?= $_SESSION['username'] ?></span>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['pg']) && $_GET['pg'] === 'login') ? 'active' : '' ?>" href="./?pg=login">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
