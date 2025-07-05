$(document).ready(function () {
    // Initialisation de la carte
    const map = L.map('carte');

    // Ajout des tuiles OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Tableau pour stocker les marqueurs
    const mesMarqueurs = [];

    // Appel AJAX pour charger les données JSON
    $.getJSON('http://localhost/TI3-2025/public/?json', function (locations) {

        // Gestion du clic sur un lien HTML
        $('.goto-marker').on('click', function (e) {
            e.preventDefault();

            const lat = parseFloat($(this).data('lat'));
            const lng = parseFloat($(this).data('lng'));

            // Centrage sur le marqueur
            map.flyTo([lat, lng], 15, {
                duration: 1.5 
            });


            // Recherche du bon marqueur correspondant aux coordonnées
            const marker = mesMarqueurs.find(m => {
                const pos = m.getLatLng();
                return pos.lat === lat && pos.lng === lng;
            });

            // Affichage du popup
            marker.openPopup();

            // Coté admin : redirection vers la carte apres clique d'une adresse 
            $('html, body').animate({
                scrollTop: $('#carte').offset().top - 150 // Décalage de 20px pour respirer un peu
            }, 100);

        });

        // Création des marqueurs
        locations.forEach(function (loc) {
            const marker = L.marker([loc.latitude, loc.longitude]).addTo(map);

            // Attache un popup au marqueur avec un petit décalage vertical
            marker.bindPopup(`
                <strong>${loc.nom}</strong><br>
                <a href="https://www.google.com/maps?q=${encodeURIComponent(loc.adresse)}" target="_blank">${loc.adresse}</a>&nbsp;
                ${loc.codepostal} ${loc.ville}<br>
                Nombres de vélos : ${loc.nb_velos}
            `, {
                offset: L.point(0, -5) // élève légèrement le popup par rapport au marqueur
            });

            // Ajoute le marqueur dans le tableau global
            mesMarqueurs.push(marker);
        });

        // Une fois tous les marqueurs ajoutés, ajuste la vue automatiquement
        if (mesMarqueurs.length > 0) {
            const group = L.featureGroup(mesMarqueurs);
            map.fitBounds(group.getBounds().pad(0.2)); //  zoom auto avec marge
        }

        // Zoom vers chaque marqueur au click 
        mesMarqueurs.forEach(function (marqueur) {
            marqueur.on('click', function () {
                map.flyTo(marqueur.getLatLng(), 15); // zoom sur le point
                marqueur.openPopup(); // et affiche le popup
            });
        });
    });








    // Gestion du formulaire de connexion
    $('#connectForm').on('submit', function (e) {
        e.preventDefault();

        const login = $('#login').val().trim();
        const password = $('#password').val().trim();

        if (login === "" || password === "") {
            const $err = $('#spanErr');

            // On arrête les animations pour éviter de superposer les effets
            $err.stop();
            $err.css('color', 'red')
                .text("Tous les champs doivent être remplis")
                .fadeIn();

            setTimeout(() => {
                $err.fadeOut(400, function () {
                    $(this).text('');
                });
            }, 2000);

            return;
        }

        setTimeout(() => {
            $(this).off('submit').submit();
        }, 100);
    });




});
