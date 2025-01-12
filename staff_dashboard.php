<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Staff</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Tableau de bord du Staff</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Bienvenue, <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?> !</h2>
        <p>Rang : <?php echo $_SESSION['rang']; ?></p>

        <!-- Section pour l'inscription aux vols -->
        <h3>Inscription aux prochains vols</h3>

        <!-- Ajouter les vols directement dans le tableau de bord -->
        <form action="inscription_vol.php" method="post">
            <label for="vol">Sélectionnez un vol :</label>
            <select name="vol" id="vol" required>
                <option value="Perpignan-Lorient">Perpignan - Lorient</option>
                
                <!-- Ajoute ici d'autres vols disponibles -->
            </select>
            <br><br>
            <input type="submit" value="S'inscrire au vol">
        </form>

        <!-- Message de confirmation -->
        <?php
        if (isset($_SESSION['inscription_message'])) {
            echo "<p>" . $_SESSION['inscription_message'] . "</p>";
            unset($_SESSION['inscription_message']);
        }
        ?>
    </section>

    <footer>
        <p>© 2025 Transavia. Tous droits réservés.</p>
    </footer>
</body>
</html>
