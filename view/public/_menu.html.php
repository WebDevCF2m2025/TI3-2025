<style>
    ul.navbar-nav {
    list-style: none ;
    padding-left: 0 ;
    margin-left: 0 ;
}

    ul.list-unstyled {
        list-style: none ;
        padding-left: 0 ;
        margin-left: 0 ;
    }

    a{
        text-decoration: none;
    
    }

    .connex{
        color: green;
        margin-top: 2rem;
    }
    .decco{
        color: red;
        margin-top: 2rem;
    }
    .acc{
        color: blue;
        margin-top: 2rem;
    }

    .admi{
        color: green;
        margin-top: 2rem;
    }
</style>



<ul class="navbar-nav list-unstyled nav me-auto ps-lg-5 mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link acc scroll-link " aria-current="page" href="./">Accueil</a></li>
      <br>
     
   
    <?php
    // si connecté
    if(isset($_SESSION['username'])):
    ?>
        <li class="nav-item"><a class="nav-link scroll-link admi " href="./?pg=admin">Administration</a></li>
          <br>
        <hr>
     
        <li class="nav-item"><a class="nav-link decco scroll-link" href="./?pg=disconnect">Déconnexion de <?=$_SESSION['username']?></a></li>
    <?php
    // pas connecté
    else:
    ?>
       <br>
        <hr>
    <li class="nav-item"><a class="nav-link text connex scroll-link" href="./?pg=login">Connexion</a></li>
    <?php
    endif;
    ?>
</ul>