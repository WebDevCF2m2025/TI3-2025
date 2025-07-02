<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TI3_2025 — Admin Localisations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style.css" />
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4 text-center">🗺️ Gestion des Localisations</h1>

    <!-- Messages -->
    <?php if (isset($merci)): ?>
        <div class="alert alert-success">✅ Opération réussie.</div>
    <?php elseif (isset($probleme)): ?>
        <div class="alert alert-danger">❌ Erreur lors de l'ajout.</div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-warning"><?= $error ?></div>
    <?php endif; ?>

    <!-- Formulaire ajout / modification -->
    <form class="">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/js/app.js"></script>
</body>
</html>
