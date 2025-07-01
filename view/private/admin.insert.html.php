
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <nom>MVC-CRUD-Procedural | Connexion</nom>
  <link rel="icon" type="image/x-icon" href="img/logo.png"/>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
          crossorigin=""></script>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <style>
    body {

      font-family: "impact Strive", ui-serif;
      color: white;
    }
  </style>
</head>
<body class="bg-light">
<?php
include "menu.html.php";
?>
<h1 class="mb-4 text-center">MVC-CRUD-Procedural | Administration | Insertion</h1>
<div class="container">
  <div class="bg-white p-4 rounded shadow-sm mb-5">
    <h4 class="mb-3 text-left mb-3"><a href="?pg=admin">Retour à l'administration</a></h4>
    <p>Bienvenue sur votre espace d'administration <?=$_SESSION['username']?></p><hr>
    <h3 class="mb-3 text-left mb-3">Formulaire d'update de l'article</h3>
    <?php
    if(isset($merci)):
      ?>
      <h4 class="alert alert-success">Merci pour votre mise à jour !</h4>
      <script>
        setTimeout(function(){ window.location.href="./?pg=admin"; },3000);
      </script>
    <?php
    endif;
    ?>
    <div class="container">
      <div class="bg-white p-4 rounded shadow-sm mb-5">
        <!-- on affiche l'erreur -->
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?=$error?></div>
          <a href="javascript:history.go(-1);">Revenir sur les informations des marqueurs et les modifier</a>
          <hr>
        <?php endif; ?>
            <h3 class="mb-3 text-center mb-5 bg-secondary p-5">Insérer un marqueur</h3>
        <div class="map-container" style="width: 100%; margin-bottom: 200px" >
          <div id="map"></div>
        </div>
        <form class="<?=$displayForm?>" action="" method="post">
          <input type="hidden" name="id">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" maxlength="160" required
                   placeholder="Nom du marqueur" >
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="165" required
                   placeholder="adresse" >
          </div>
          <div class="mb-3">
            <label for="postal" class="form-label">Code Postal</label>
            <input type="text" class="form-control" id="codepostal" name="codepostal" maxlength="165" required
                   placeholder="code Postal">
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" maxlength="165" required
                   placeholder="ville">
          </div>
          <div class="mb-3">
            <label for="velos" class="form-label">Nombre de vélo</label>
            <input type="text" class="form-control" id="velos" name="nb_velos" maxlength="165" required
                   placeholder="Nombre de vélos" >
          </div>
          <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" maxlength="165" required
                   placeholder="Latitude" >
          </div>
          <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" maxlength="165" required
                   placeholder="longitude" >
          </div>


          <input type="hidden" name="id" value="<?=$_SESSION['idutilisateurs']?>">
          <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
      </div>
    </div>
  </div>
  <script>
    let map = L.map('map').setView([50.8301436, 4.3402184], 13);

    var Thunderforest_SpinalMap = L.tileLayer('https://{s}.tile.thunderforest.com/spinal-map/{z}/{x}/{y}{r}.png?apikey={apikey}', {
      attribution: '&copy; <a href="http://www.thunderforest.com/">Thunderforest</a>, &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      apikey: 'd4bf4b9119c54964bac529246362d8b4',
      maxZoom: 22
    }).addTo(map);

    let marker;

    map.on('click', async function (e) {
      const { lat, lng } = e.latlng;

      // Supprimer l'ancien marqueur
      if (marker) map.removeLayer(marker);

      // Ajouter un nouveau marqueur avec popup
      marker = L.marker([lat, lng]).addTo(map).bindPopup("Coordonnée insérée avec succès").openPopup();

      // Mettre les coordonnées dans les champs du formulaire
      document.querySelector('#latitude').value = lat;
      document.querySelector('#longitude').value = lng;

      // Requête vers l'API Nominatim
      const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`;

      try {
        const response = await fetch(url, {
          headers: {
            'User-Agent': 'TonNomOuProjet - formulaire-geocoding' // requis par Nominatim
          }
        });

        const data = await response.json();
        console.log("Résultat de Nominatim :", data);

        const adresse = (data.address.house_number || '') + ' ' + (data.address.road || '');
        const ville = data.address.city || data.address.town || data.address.village || '';
        const codePostal = data.address.postcode || '';

        document.getElementById('adresse').value = adresse.trim();
        document.getElementById('ville').value = ville;
        document.getElementById('codePostal').value = codePostal;

      } catch (error) {
        console.error('Erreur lors du reverse geocoding :', error);
      }
    });

    // Optionnel : supprimer le marqueur quand le popup se ferme
    map.on('popupclose', function (e) {
      const m = e.popup._source;
      if (m) map.removeLayer(m);
    });
  </script>



  <script src="js/script.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
