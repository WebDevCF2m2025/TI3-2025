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
    <form action="" method="post">
        <input type="text" name="login" placeholder="Votre login" required><br>
        <input type="password" name="userpwd" placeholder="Votre mot de passe" required><br>
        <input type="submit" value="Se connecter">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/js/app.js"></script>
</body>
</html>
