<?php
session_start(); // Démarrer la session

// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage';
$utilisateur = 'root';
$motDePasse = '';

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'email de l'utilisateur est défini dans la session
    if(isset($_SESSION["UserEmail"])) {
        // Récupérer les réservations selon l'email de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM reservation WHERE email = :email");
        $stmt->execute(['email' => $_SESSION["UserEmail"]]);
        $reservations = $stmt->fetchAll();
    } else {
        // Gérer le cas où l'email n'est pas défini
        echo "L'email de l'utilisateur n'est pas défini dans la session.";
        exit;
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des réservations</title>
  <!-- Intégration de Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Liste des réservations</h1>
    <?php if ($reservations): ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Destination</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservations as $reservation): ?>
            <tr>
              <td><?php echo htmlspecialchars($reservation["id"]); ?></td>
              <td><?php echo htmlspecialchars($reservation["destination"]); ?></td>
              <td><?php echo htmlspecialchars($reservation["email"]); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="alert alert-warning">Aucune réservation n'a été trouvée pour cet email.</p>
    <?php endif; ?>
  </div>
  <!-- Intégration de Bootstrap JS et dépendances -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
