<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul>
        <li><a href="/public/index.php">Home</a></li>
        <?php if (isset($_SESSION['login'])) { ?>
            <li><a href="/controller/logout.php">Logout</a></li>
            <li><a href="/controller/privateController.php">Admin</a></li>
            <li><a href="/view/public/createPoints.php">Create Point</a></li>
        <?php } else { ?>
            <li><a href="/public/index.php?page=login">Login</a></li>
        <?php } ?>


        <!-- 
        <?php if (isset($_SESSION['login'])): ?>



        <?php endif; ?> -->
    </ul>
</nav>