<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/public/index.php">TI3-2025</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">Home</a>
                </li>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=create">Create Point</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=dec">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>