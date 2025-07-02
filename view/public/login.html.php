<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Connexion</h3>
                                </div>
                                <div class="card-body">
                                    <form cl method="post">
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="name"
                                                type="text"
                                                name="login"
                                                placeholder="Votre Login"
                                                required />
                                            <label for="name">Votre Login</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="email"
                                                type="password"
                                                name="userpwd"
                                                placeholder="Votre mot de passe"
                                                required />
                                            <label for="email">Votre mot de passe</label>
                                        </div>
<div class=" d-flex justify-content-center"><button type="submit" class="btn text-center btn-primary">Connexion</button></div>
                                        
                                        <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <a class="btn btn-primary" href="index.html">Login</a>
                                            </div> -->
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    
                                    <div class="mt-3 <?=$displaySucces?>  alert alert-success" id="successMessage">Merci de vous être connecté !</div>
                                            <div class="mt-3 <?=$displayError?> alert alert-danger" id="errorMessage">Login et/ou mot de passe incorrecte !</div>
                                </div>
                                <?php
                                    // si c'est un succès, on crée la rediraction en js
                                    if(isset($jsRedirect)) echo $jsRedirect;
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                 <div class="container-fluid px-4">
                        <div class="d-flex align-items-center text-center justify-content-between small">
                            <div class="text-center">Copyright &copy; CF2M | TI3-2025 </div>
                            
                        </div>
                    </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>