<?php
// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage'; // Assurez-vous que le nom de la base de données est correct
$utilisateur = 'root'; // L'utilisateur par défaut pour localhost
$motDePasse = ''; // Le mot de passe par défaut pour localhost est généralement vide


try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID du voyage à supprimer
    $Email = $_POST['Email']; 

    // Préparer la requête SQL pour supprimer le voyage
    $stmt = $pdo->prepare("DELETE FROM client WHERE email = ?");
    $stmt->execute([$Email]);

    // Vérifier si la suppression a été effectuée
    if ($stmt->rowCount() > 0) {
        echo "Le client a été supprimé avec succès.";
    } else {
        echo "Aucun client trouvé avec cet email.";
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>