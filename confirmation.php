<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation - TransaviaFRroblox</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="reservation-page">
    <header>
        <h1>Confirmation de Réservation</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="vols.html">Prochains Vols</a></li>
                <li><a href="candidature.html">Postuler</a></li>
                <li><a href="staff.html">Accès Staff</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Votre réservation</h2>
        <p>Voici les détails de votre réservation :</p>
        <div id="reservation-details">
            <!-- Détails du vol seront affichés ici -->
        </div>
        
        <h3>Merci de confirmer vos informations :</h3>
        <form action="confirmation.php" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" value="Confirmer la réservation">
        </form>
    </section>

    <footer>
        <p>© 2025 Transavia. Tous droits réservés.</p>
    </footer>

    <script>
        // Récupérer les paramètres de l'URL (vol et heure)
        const urlParams = new URLSearchParams(window.location.search);
        const vol = urlParams.get('vol');
        const heure = urlParams.get('heure');

        // Afficher les détails de la réservation
        document.getElementById('reservation-details').innerHTML = `
            <p>Vol : ${vol}</p>
            <p>Heure de départ : ${heure}</p>
        `;
    </script>
</body>
</html>
