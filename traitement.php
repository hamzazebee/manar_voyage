<?php
// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage'; // Assurez-vous que le nom de la base de données est correct
$utilisateur = 'root'; // L'utilisateur par défaut pour localhost
$motDePasse = ''; // Le mot de passe par défaut pour localhost est généralement vide

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données locale";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Récupérer les données envoyées par la méthode POST
$nombreDeJour = $_POST['nombre_de_jour']; // Assurez-vous que le nom du champ est correct
$destination = $_POST['destination'];
$dateVoyage = $_POST['dateVoyage'];
$idVoyage = $_POST['idVoyage'];
$tarifVoyage = $_POST['tarifVoyage'];
// Pour l'image, utilisez $_FILES['nom_du_champ_image']['name'] pour obtenir le nom du fichier

// Préparer la requête SQL pour vérifier si l'ID du voyage existe déjà
$stmt = $pdo->prepare("SELECT * FROM voyage WHERE id = ?");
$stmt->execute([$idVoyage]);

// Vérifier si un voyage avec cet ID existe déjà
if ($stmt->rowCount() > 0) {
    // Si un voyage avec cet ID existe déjà, renvoyer un message d'erreur
    echo "Erreur: Un voyage avec cet ID existe déjà.";
} else {
    // Si l'ID n'existe pas, insérer les nouvelles données dans la base de données
    // Assurez-vous que les noms des colonnes correspondent à ceux de votre base de données
    $stmt = $pdo->prepare("INSERT INTO voyage (id,nombreJour,DateVoyage,tarif,destination) VALUES (?, ?, ?, ?, ?)");
    // Ajoutez le nom du fichier image à la liste des paramètres
    $stmt->execute([$idVoyage, $nombreDeJour, $dateVoyage, $tarifVoyage, $destination]);
    
    // Renvoyer un message de succès
    echo "Le voyage a été ajouté avec succès.";
}
?>
