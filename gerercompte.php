<?php
session_start(); // Démarrer la session
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="gerercompte.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerer compte</title>
</head>
<body>
    <h1> gerer votre compte</h1>
    <form action="gerer.php" method="post">
        <label for="nouveau_email">nouveau e-mail :</label>
        <input type="email" id="nouveau_email" name="nouveau_email" required><br>

        <label for="nouveau_mdp">nouvel mot de passe :</label>
        <input type="password" id="nouveau_mdp" name="nouveau_mdp" required><br>

        

        

        <input type="submit" value="Modifier">
    </form>

    <h1> Annuler reservation</h1>
    <form action="annulerreservationuser.php" method="post">
        

        <label for="idvoyage">id voyage :</label>
        <input type="text" id="idvoyage" name="idvoyage" required><br>

        

        

        <input type="submit" value="Annuler">
    </form>


    <h1> afficher vos reservation</h1>
    <form action="affichereservationuser.php" method="post">
        
        

        

        <input type="submit" value="afficher vos reservation">
    </form>
</body>
</html>
</html>