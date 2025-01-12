<?php
// Connexion à la base de données
$servername = "localhost";  // ou autre si tu utilises un autre serveur
$username = "root";         // ton nom d'utilisateur MySQL
$password = "";             // ton mot de passe MySQL (vide par défaut sous XAMPP)
$dbname = "transavia";      // Nom de ta base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier si les champs du formulaire existent et que la méthode est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Récupérer les données du formulaire
    $nom_utilisateur = $_POST['username'];
    $mot_de_passe = md5($_POST['password']);  // Hachage du mot de passe avec MD5

    // Vérifier si les identifiants existent dans la base de données
    $sql = "SELECT * FROM staff WHERE nom_utilisateur = '$nom_utilisateur' AND mot_de_passe = '$mot_de_passe'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Connexion réussie, récupérer les infos de l'utilisateur
        $row = $result->fetch_assoc();
        
        // Démarrer la session et stocker les informations
        session_start();
        $_SESSION['username'] = $nom_utilisateur;
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['rang'] = $row['rang'];

        // Rediriger vers le tableau de bord staff
        header("Location: staff_dashboard.php");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
} else {
    echo "Veuillez remplir les champs de connexion.";
}

$conn->close();
?>
