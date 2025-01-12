<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Récupérer les données du formulaire
$vol = $_POST['vol'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

// Simuler l'envoi d'un email à l'administrateur (remplace avec ton adresse email)
$to = "tonemail@example.com";  // Remplace par ton email
$subject = "Nouvelle inscription au vol";
$message = "Le staff membre $prenom $nom s'est inscrit au vol $vol.";
$headers = "From: noreply@transaviafrroblox.com";

// Envoyer l'email
if (mail($to, $subject, $message, $headers)) {
    $_SESSION['inscription_message'] = "Inscription réussie pour le vol $vol !";
} else {
    $_SESSION['inscription_message'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
}

// Rediriger vers le tableau de bord staff
header("Location: staff_dashboard.php");
exit();
?>
