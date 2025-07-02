<!-- TI3-2025/view/public/homePage.html.php -->
<div class="navbar navbar-expand-lg bg-white border-bottom shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./">
            <img src="./img/logo.png" alt="Logo" height="40" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        // Par défaut, on peut appliquer une valeur à plusieurs variables
        $activeHome = $activeAbout = $activeLogin = $activeAdmin = "";
        if (!isset($_GET['pg'])) {
            $activeHome = "active";
        } elseif ($_GET['pg'] === "admin") {
            $activeAdmin = "active";
        } elseif ($_GET['pg'] === "login") {
            $activeLogin = "active";
        }
        ?>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="navbar-nav ms-auto">
                    <a class="nav-link <?php echo $activeLogin; ?>" href="./?pg=login">Connexion</a>
            </div>
        </div>
    </div>
</div>
