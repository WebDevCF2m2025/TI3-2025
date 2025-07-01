<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../view/public/nav.php";
    ?>
    <h1>Admin</h1>
</body>

</html>
<?php



echo '<div class="bg-light py-4 mt-auto">
   <h3> débogage</h3>';
echo '<h4>session_id() ou SID</h4>';
var_dump(session_id());
echo '<h4>$_GET</h4>';
var_dump($_GET);
echo '<h4>$_SESSION</h4>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);
echo '</div></div>';
?>