<?php
// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage'; // Assurez-vous que le nom de la base de données est correct
$utilisateur = 'root'; // L'utilisateur par défaut pour localhost
$motDePasse = ''; // Le mot de passe par défaut pour localhost est généralement vide

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $mdp = $_POST['mdp'];

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT * FROM client WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        // Si un client avec cet email existe déjà, renvoyer un message d'erreur
        echo "Erreur: Un client avec cet email existe déjà.";
    } else {
        // Si l'email n'existe pas, hacher le mot de passe et insérer les nouvelles données dans la base de données
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO client (nom, email, mdp) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $hashedPassword]);
        
        // Redirection vers reservation.php après la création du compte
        header('Location: reservation.php');
        exit;
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>


