<?php
// Paramètres de connexion
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "portfolio";

// Établir la connexion
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
} else {
    echo "Connexion réussie à la base de données.<br>";
}

// Requête pour récupérer les données de la table "creations"
$sql = "SELECT * FROM creations WHERE ID = 1";
$resultat = mysqli_query($connexion, $sql);

// Vérifier si la requête a réussi
$realisations = [];
if ($resultat) {
    // Récupération des résultats
    while ($row = mysqli_fetch_assoc($resultat)) {
        $realisations[] = $row;
    }
} else {
    echo "Erreur de requête : " . mysqli_error($connexion) . "<br>";
}

// Fermer la connexion
mysqli_close($connexion);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réalisations</title>
</head>
<body>
    <div class="container">
        <?php if (!empty($realisations)): ?>
            <?php foreach ($realisations as $realisation): ?>
                <div class="creation">
                    <h1><?php echo ($realisation['titre']); ?></h1>
                    <img src="<?php echo ($realisation['photo1']); ?>">
                    <p><?php echo ($realisation['texte']); ?></p>
                    
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune création trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>