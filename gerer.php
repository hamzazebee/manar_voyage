<?php
session_start(); // Démarrer la session

// Connexion à la base de données (à adapter selon vos paramètres)
$serveur = 'mysql:host=localhost;dbname=manar voyage'; // Assurez-vous que le nom de la base de données est correct
$utilisateur = 'root'; // L'utilisateur par défaut pour localhost
$motDePasse = ''; // Le mot de passe par défaut pour localhost est généralement vide

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $nouvelEmail = $_POST['nouveau_email'];
    $nouveauMdp = $_POST['nouveau_mdp'];

    // Vérifier si le nouvel email existe déjà dans la base de données
    $stmt = $pdo->prepare("SELECT email FROM client WHERE email = ?");
    $stmt->execute([$nouvelEmail]);
    $emailExiste = $stmt->fetch();

    if (!$emailExiste) {
        // Si le nouvel email n'existe pas, mettre à jour les informations du client
        $hashedPassword = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE client SET email = ?, mdp = ? WHERE email = ?");
        $stmt->execute([ $nouvelEmail, $hashedPassword, $_SESSION["UserEmail"]]);

        // Renvoyer un message de succès et rediriger vers index.php
        echo "<script>alert('Les informations du client ont été mises à jour avec succès.'); window.location.href = 'index.php';</script>";
    } else {
        // Si le nouvel email existe déjà, afficher un message d'erreur
        echo "<script>alert('Erreur: Cet email existe déjà.'); window.location.href = window.location.href;</script>";
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>