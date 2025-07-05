<div class="navbar navbar-expand-lg bg-white border-bottom shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="./">
            MISI
        </a>

        <?php
        if(isset($_SESSION['idutilisateurs'])):
        ?>    
            <div class="position-absolute start-50 translate-middle-x">
                <span class="nav-brand  text-success fw-bold"> * Bonjour <?=$_SESSION['username']?> *</span>
            </div>    


            <?php
        endif;
        ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
// par défaut, on peut appliquer une valeur à plusieurs variables
$activeHome = $activeAbout = $activeLogin = $activeAdmin = "";
        if(!isset($_GET['pg'])){
            $activeHome = "active text-primary";
        }elseif($_GET['pg']==="adminR"){
            $activeAdmin = "active text-primary";
        }elseif($_GET['pg']==="login"){
            $activeLogin = "active text-primary";
        }
        ?>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="navbar-nav ms-auto">
                <!-- Correction : usage cohérent de ?pg=... -->
                <a class="nav-link <?=$activeHome?>" href="./">Accueil</a>

                <?php
                // si nous sommes connectés
                if(isset($_SESSION['idutilisateurs'])):
                ?>
                    
                    <a class="nav-link  <?=$activeAdmin?>" href="./?pg=adminR">Administration</a>
                    <a class="nav-link" href="./?pg=logout">Déconnexion</a>

                <?php else:
                // nous ne sommes pas connecté 
                ?>
                <a class="nav-link <?=$activeLogin?>" href="./?pg=login">Connexion</a>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>