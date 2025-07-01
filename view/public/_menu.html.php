




<nav class="d-flex w-100">
    <ul class="navbar-nav d-flex flex-row me-auto w-auto">
        <li class="nav-item">
            <a class="nav-link scroll-link" aria-current="page" href="./"><strong>Accueil</strong></a>
        </li>
    </ul>
    <ul class="navbar-nav d-flex flex-row ms-auto w-auto">
        <?php if(isset($_SESSION['username'])): ?>
            <li class="nav-item">
                <a class="nav-link scroll-link" href="./?pg=admin"><strong>Administration</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link scroll-link" href="./?pg=disconnect"><strong>Déconnexion</strong></a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link scroll-link" href="./?pg=login"><strong>Connexion</strong></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>