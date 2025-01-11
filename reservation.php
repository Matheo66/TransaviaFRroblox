<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Si l'utilisateur n'est pas connecté, redirige vers la page de login
    header("Location: login.php");
    exit();
}

// Si le formulaire a été soumis, affiche le message de confirmation
if (isset($_POST['confirm'])) {
    $message = "Merci, votre réservation a bien été confirmée !";
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Réservation - TransaviaFRroblox</h1>
    <nav>
        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="vols.html">Prochains Vols</a></li>
            <li><a href="candidature.html">Postuler</a></li>
            <li><a href="staff.html">Accès Staff</a></li>
        </ul>
    </nav>
</header>

<!-- Affichage du message de confirmation -->
<?php if ($message) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<!-- Formulaire de réservation -->
<form method="POST">
    <h2>Confirmez votre réservation</h2>
    <p>Destinations: Paris - New York</p>
    <p>Heure de départ: 15:00</p>
    <input type="submit" name="confirm" value="Confirmer la réservation">
</form>

</body>
</html>
