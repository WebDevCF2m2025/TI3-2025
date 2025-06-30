<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div>   
<table class="table">
     
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">rue</th>
      <th scope="col">code postal</th>
      <th scope="col">ville</th>
        <th scope="col">latitude</th>
      <th scope="col">longitude</th>
    </tr>
  </thead>

  <?php foreach($localisations as $local) :  
            ?>
  <tbody>
    <tr>
      <th scope="row"><?= $local['id'] ?></th>
      <td><?= $local['rue'] ?></td>
      <td><?= $local['codepostal'] ?></td>
      <td><?= $local['ville'] ?></td>
      <td><?= $local['latitude'] ?></td>
      <td><?= $local['longitude'] ?></td>
    </tr>

  </tbody>
    <?php endforeach;  
            ?>
</table></div>
    </div>
</div>
 




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>