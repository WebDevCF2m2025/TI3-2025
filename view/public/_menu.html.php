<style>
    ul.navbar-nav {
    list-style: none ;
    padding-left: 0 ;
    margin-left: 0 ;
    display: flex;
    flex-direction: column;
    justify-content: center;
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
        color: white;
        margin-top: 2rem;
        background-color: green;
        padding: 10px;
        border-radius: 10px;
        opacity: 0.65;
    }
    .decco{
          color: white;
        margin-top: 2rem;
        background-color: red;
        padding: 10px;
        border-radius: 10px;
        opacity: 0.65;
    }
 
    .admi{
          color: white;
        margin-top: 2rem;
        background-color: green;
        padding: 10px;
        border-radius: 10px;
        opacity: 0.65;
      
    }

    ul li a:hover {
    opacity: 1 ;

    }

    ul li.nav-item {
margin: 0 auto;
    }
</style>



<ul class="navbar-nav list-unstyled nav me-auto ps-lg-5 mb-2 mb-lg-0">
       
   
    <?php
    // si connecté
    if(isset($_SESSION['username'])):
    ?>
        <li class="nav-item"><a class="nav-link scroll-link admi " href="./?pg=admin">Administration</a></li>
          
        <br>
        <br>
        
     
        <li class="nav-item"><a class="nav-link decco scroll-link" href="./?pg=disconnect">Déconnexion de <?=$_SESSION['username']?></a></li>
    <?php
    // pas connecté
    else:
    ?>
    
        
    <li class="nav-item"><a class="nav-link text connex scroll-link" href="./?pg=login">Connexion</a></li>
    <?php
    endif;
    ?>
</ul>