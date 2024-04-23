<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Clients</title>
  <!-- Lien vers la feuille de style Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Liste des Clients</h2>
    <?php
    // Connexion à la base de données locale
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "manar voyage";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
      die("Échec de la connexion: " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les clients
    $sql = "SELECT nom, email, mdp FROM client";
    $result = $conn->query($sql);

    // Vérifier si la requête retourne des résultats
    if ($result->num_rows > 0) {
      // Utilisation de classes Bootstrap pour le tableau
      echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Nom</th><th>Email</th><th>Mot de passe</th></tr></thead><tbody>";
      
      // Affichage des données de chaque ligne
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["nom"]."</td><td>".$row["email"]."</td><td>".$row["mdp"]."</td></tr>";
      }
      
      // Fin du tbody et du tableau
      echo "</tbody></table>";
    } else {
      echo "<p class='alert alert-warning'>0 résultats</p>";
    }

    // Fermer la connexion
    $conn->close();
    ?>
  </div>
  <!-- Scripts Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
