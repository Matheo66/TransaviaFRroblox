<?php
session_start();  // Démarre la session

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");  // Redirige si non connecté
    exit;
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Utilisez 'root' pour XAMPP
$password = "";      // Mot de passe vide pour XAMPP
$dbname = "transavia";  // Nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flight_id = $_POST['flight_id'];
    $user_id = $_SESSION['user_id'];

    // Enregistre l'inscription dans la base de données
    $stmt = $conn->prepare("INSERT INTO flight_registrations (user_id, flight_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $flight_id);
    $stmt->execute();

    // Envoie un email
    $to = "votre_email@example.com";  // Remplacez par votre adresse email
    $subject = "Nouvelle inscription à un vol";
    $message = "L'utilisateur " . $_SESSION['username'] . " s'est inscrit au vol " . $flight_id;
    $headers = "From: no-reply@transavia.com";

    mail($to, $subject, $message, $headers);

    echo "Inscription réussie !";
}

$conn->close();
?>
