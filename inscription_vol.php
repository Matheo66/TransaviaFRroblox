<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le vol sélectionné
    $vol = $_POST['vol'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";  // Remplace par ton utilisateur
    $password = "";      // Remplace par ton mot de passe
    $dbname = "transavia";  // Remplace par le nom de ta base de données

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si l'utilisateur est déjà inscrit à ce vol
    $nom_utilisateur = $_SESSION['username'];

    $check_sql = "SELECT * FROM reservations WHERE nom_utilisateur = '$nom_utilisateur' AND vol = '$vol'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // L'utilisateur est déjà inscrit à ce vol
        $_SESSION['inscription_message'] = "Vous êtes déjà inscrit à ce vol.";
    } else {
        // L'utilisateur n'est pas inscrit, on peut procéder à l'inscription
        $sql = "INSERT INTO reservations (nom_utilisateur, vol) VALUES ('$nom_utilisateur', '$vol')";

        if ($conn->query($sql) === TRUE) {
            // Inscription réussie
            $_SESSION['inscription_message'] = "Vous êtes inscrit au vol : $vol.";
        } else {
            // Une erreur est survenue
            $_SESSION['inscription_message'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();
}

// Rediriger vers le tableau de bord après avoir traité l'inscription
header("Location: staff_dashboard.php");
exit();
?>
