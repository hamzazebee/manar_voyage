<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté et si l'ID du voyage est passé dans l'URL
if (!isset($_SESSION["UserEmail"]) || !isset($_GET['id'])) {
    echo "Vous devez être connecté et sélectionner un voyage pour réserver.";
    exit;
}

// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage';
$utilisateur = 'root';
$motDePasse = '';

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID du voyage et l'email de l'utilisateur
    $voyageId = $_GET['id'];
    $userEmail = $_SESSION["UserEmail"];

    // Vérifier si l'utilisateur a déjà réservé ce voyage
    $stmt = $pdo->prepare("SELECT * FROM reservation WHERE email = ? AND id = ?");
    $stmt->execute([$userEmail, $voyageId]);
    $reservationExiste = $stmt->fetch();

    if ($reservationExiste) {
        // Si la réservation existe déjà, afficher un message d'erreur et rediriger
        echo "<script>alert('Erreur: Vous avez déjà réservé ce voyage.'); window.location.href = 'reservation.php';</script>";
    } else {
        // Si la réservation n'existe pas, insérer la nouvelle réservation
        $stmt = $pdo->prepare("INSERT INTO reservation (id, destination, email) SELECT id, destination, ? FROM voyage WHERE id = ?");
        $stmt->execute([$userEmail, $voyageId]);

        // Afficher un message de confirmation et rediriger
        echo "<script>alert('Confirmation: Voyage réservé avec succès. Notre agent va vous contacter via email le plus tôt possible.'); window.location.href = 'reservation.php';</script>";
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
