<?php
session_start(); // Démarrer la session

// Les informations de connexion pour une base de données locale généralement par défaut
$serveur = 'mysql:host=localhost;dbname=manar voyage';
$utilisateur = 'root';
$motDePasse = '';

try {
    $pdo = new PDO($serveur, $utilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer le nom de l'utilisateur en utilisant l'email comme clé primaire
    
        $stmt = $pdo->prepare("SELECT nom FROM client WHERE email = ?");
        $stmt->execute([ $_SESSION["UserEmail"]]);
        $user = $stmt->fetch();
        $nomUtilisateur = $user ? $user['nom'] : 'Invité';
   

    // Requête SQL pour récupérer les voyages
    $sql = "SELECT id, destination, nombreJour, DateVoyage, Tarif FROM voyage";
    $result = $pdo->query($sql);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réservations de Voyages</title>
  <!-- Lien vers la feuille de style Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Welcome <?php echo htmlspecialchars($nomUtilisateur); ?>!</h1>
    <?php
    // Vérifier si la requête retourne des résultats
    if (isset($result) && $result->rowCount() > 0) {
      // Affichage des données de chaque voyage dans une section différente
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["id"]="SELECT id FROM voyage";
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        
        echo "<h5 class='card-title'>".htmlspecialchars($row["destination"])."</h5>";
        echo "<p class='card-text'>Nombre de jours : ".htmlspecialchars($row["nombreJour"])."</p>";
        echo "<p class='card-text'>Date de voyage : ".htmlspecialchars($row["DateVoyage"])."</p>";
        echo "<p class='card-text'>Tarif : ".htmlspecialchars($row["Tarif"])." DT</p>";
        // Bouton de réservation
        echo "<a href='reserverVoyage.php?id=".$row['id']."' class='btn btn-success'>Réserver</a>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<p class='alert alert-warning'>Aucun voyage trouvé.</p>";
    }
    
    echo "<a href='index.php' class='btn btn-danger' style='position: fixed; bottom: 20px; left: 20px;'>Déconnexion</a>";
   // <!-- Bouton Gérer compte -->
    echo "<a href='gerercompte.php' class='btn btn-primary' style='position: fixed; bottom: 20px; right: 20px;'>Gérer compte</a>";
    // Fermer la connexion";
    $pdo = null;
    
    ?>
  </div>
  <!-- Scripts Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
