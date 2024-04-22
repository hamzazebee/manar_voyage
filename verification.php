<?php
session_start();

// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage';
$utilisateur = 'root';
$motDePasse = '';

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $email = $_POST['Email']; // Modifié pour correspondre au nom du champ du formulaire
    $mdp = $_POST['mdp']; // Modifié pour correspondre au nom du champ du formulaire

    // Vérifier si l'email et le mot de passe correspondent à un utilisateur existant
    $stmt = $pdo->prepare("SELECT mdp FROM client WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($mdp, $user['mdp'])) {
        // Redirection vers reservation.php si l'utilisateur est authentifié
        header('Location: reservation.php');
        exit;
    } elseif ($email == 'x@admin.admin' && $mdp == 'admin') {
        // Redirection vers admin.php si les identifiants admin sont utilisés
        header('Location: admin.php');
        exit;
    } else {
        // Message d'erreur si les identifiants sont incorrects
        echo "Identifiants incorrects.";
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
