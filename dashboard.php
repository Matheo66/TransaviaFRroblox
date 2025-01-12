<?php
session_start();  // Démarre la session

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");  // Redirige si non connecté
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="candidatures.html">Candidatures</a>
            <a href="vols.html">Vols</a>
        </nav>
    </header>

    <div class="dashboard-container">
        <h2>Bienvenue, <?php echo $_SESSION['name']; ?> (<?php echo $_SESSION['rank']; ?>)</h2>
        <p>Nom d'utilisateur : <?php echo $_SESSION['username']; ?></p>
        <p>Prénom : <?php echo $_SESSION['name']; ?></p>
        <p>Rang : <?php echo $_SESSION['rank']; ?></p>

        <h3>Inscrivez-vous pour les prochains vols :</h3>
        <form action="register_flight.php" method="POST">
            <select name="flight_id">
                <option value="1">Vol Paris - New York</option>
                <option value="2">Vol Paris - Tokyo</option>
                <option value="3">Vol Paris - Dubai</option>
            </select>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
