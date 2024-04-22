<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Tableau de Bord Admin - Agence de Voyage</title>
<link rel="stylesheet" href="adminstyle.css">
</head>

<body>
<header>
  <h1>Tableau de Bord de l'Administrateur</h1>
</header>
<main>
    <section>
        <h2>ajouter un Utilisateurs</h2>
        <form id="ajoutcompte1" method="post" action="ajoutclient.php">
          <div>
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" required>
          </div>
          <div>
            <label for="Email">Email :</label>
            <input type="email" id="Email" name="Email" required>
          </div>
          <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
          </div>
          <div>
          <button type="submit">Ajouter Compte</button>
      
          </div>
        </form>
      </section>
      <section>
        <h2>Supprimer Utilisateur</h2>
        <form id="supprimerutilisateur" action="deletuser.php"  method="post" >
          <div>
            <label for="Email">Email Utilisateur :</label>
            <input type="email" id="Email" name="Email" required>
          </div>
          <div>
          <button type="submit">supprimer Utilisateu</button>
          </div>
        </form>
      </section>
      <section>
        <h2>ajouter un Voyages</h2>
        <form id="gestionVoyages" method="post" action="traitement.php">
          <div>
            <label for="nombre de jour">Nombre de jour :</label>
            <input type="number" id="nombre_de_jour" name="nombre_de_jour" required>
          </div>
          <div>
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required>
          </div>
          <div>
            <label for="dateVoyage">Date du voyage :</label>
            <input type="date" id="dateVoyage" name="dateVoyage" required>
          </div>
          <div>
            <label for="idVoyage">ID Voyage :</label>
            <input type="text" id="idVoyage" name="idVoyage" required>
          </div>
          <div>
            <label for="tarifVoyage">Tarif :</label>
            <input type="double" id="tarifVoyage" name="tarifVoyage" required>
          </div>
          
          <div>
          <button type="submit">Ajouter Voyage</button>
          </div>
        </form>
      </section>
      <section>
        <h2>Supprimer voyage</h2>
        <form id="supprimerVoyages" action="traitement1.php"  method="post" >
          <div>
            <label for="idVoyage">ID Voyage :</label>
            <input type="text" id="idVoyage" name="idVoyage" required>
          </div>
          <div>
          <button type="submit">supprimer voyage</button>
          </div>
        </form>
      </section>
      <section>
        <h2>Affichage</h2>
        <form id="Afficher les Voyages" action="affichevoyage.php"  method="post" >
          <div>
          <button type="submit">afficher les voyages</button>
          </div>
        </form>
        <form id="Afficher les clients" action="afficheclient.php"  method="post" >
          <div>
          <button type="submit">afficher les clients</button>
          </div>
        </form>
      </section>
      
      
      
      
      
      <footer>
        <p>Projet 2024 - &copy; WEB - Manar voyage</p>
    </footer>
   
</main>
</body>
</html>      
