<?php
// Configuration de la connexion à la base de données
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "transavia";     

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par le formulaire
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour vérifier si l'utilisateur existe
    $sql = "SELECT * FROM staff WHERE nom_utilisateur = '$nom_utilisateur'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur existe, récupérer les données
        $row = $result->fetch_assoc();

        // Vérifier le mot de passe crypté
        if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
            // Connexion réussie, enregistrer les informations dans la session
            $_SESSION['user_id'] = $row['id']; 
            $_SESSION['nom_utilisateur'] = $row['nom_utilisateur']; 
            $_SESSION['nom'] = $row['nom']; 
            $_SESSION['prenom'] = $row['prenom']; 
            $_SESSION['rang'] = $row['rang']; 

            // Rediriger vers la page du tableau de bord du staff
            header("Location: staff_dashboard.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        echo "Nom d'utilisateur non trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
