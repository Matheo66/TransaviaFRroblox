
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>




<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du Staff - TransaviaFRroblox</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Tableau de bord - Bienvenue, <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></h1>
    </header>

    <section>
        <h2>Informations personnelles</h2>
        <p><strong>Nom :</strong> <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></p>
        <p><strong>Rang :</strong> <?php echo $_SESSION['rang']; ?></p>

        <h2>Inscription aux prochains vols</h2>
        <p>Vous pouvez vous inscrire pour les prochains vols disponibles ci-dessous.</p>

        <!-- Liste des prochains vols -->
        <div class="vol-container">
            <button class="vol-btn">
                <span class="destination">Perpignan - Lorient</span><br>
                <span class="horaire">Départ : 17:00</span>
            </button>
            <a href="reservation.php?vol=1" class="btn-reserver">Réserver</a>
        </div>

    </section>

    <footer>
        <p>© 2025 Transavia. Tous droits réservés.</p>
    </footer>
</body>
</html>
