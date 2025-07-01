<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Create Point</title>
</head>

<body>
    <h1>Create point</h1>
    <form class="container mt-5 w-25" method="post" action="">
        <div class="form-group">
            <label for="formGroupExampleInput">Nom</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Point Name">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Adresse</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Point Adresse">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Code Postal</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Point Code Postal">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Ville</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Point City">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Latitude</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Point Latitude">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Longitude</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Point Longitude">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
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