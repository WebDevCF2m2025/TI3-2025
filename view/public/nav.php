<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul>
        <li><a href="./">Home</a></li>
        <?php if (isset($_SESSION['login'])) { ?>
            <li><a href="./?page=dec">Logout</a></li>
            <li><a href="./?page=admin">Admin</a></li>
            <li><a href="./?page=create">Create Point</a></li>
        <?php } else { ?>
            <li><a href="./?page=login">Login</a></li>
        <?php } ?>




    </ul>
</nav>