<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Manar voyage</title>
</head>

<body>
    <header>
        <h1>manar voyage</h1>
    </header>

    <div id="centre">
        <aside>
            <nav>
                <h3>Menu</h3>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#reservation">Reserver votre voyage</a></li>
                    <li><a href="#galerie">galerie</a></li>
                    <li><a href="#connecte">s'identifier</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <section id="accueil">
                <img src="logo.jpeg.jpeg" alt="logo Manar voyage">
                <h2>Let's go !</h2>
                <p>Fort de plus de 20 ans d’expérience, notre agence de voyage <strong>Manar Voyage</strong> est votre partenaire idéal pour concevoir des voyages organisés inoubliables. Avec plus de 5000 clients satisfaits, nous avons l’expertise nécessaire pour répondre efficacement à toutes vos envies, même dans les délais les plus courts.

Notre service clientèle, dévoué et attentif, est disponible 24 heures sur 24, 7 jours sur 7, pour garantir votre tranquillité d’esprit et votre bien-être. Notre mission est claire : faire en sorte que vous profitiez pleinement de votre voyage organisé, sans le moindre souci. Découvrez le monde avec nous, où chaque séjour est une aventure mémorable. <strong>profitez de votre séjour !</strong></p>
                <span></span>
            </section>
            <section >
                <h2>Reserver un voyage</h2>
        <form  method="post" >
          <div >
          <a href="#crer">s'identifier <button  style="
    display: block;
    margin: 20px auto;
    padding: 5px 20px;
    font-size: 16px;
    font-family: inherit;
    cursor: pointer;"
      type="submit" id="reservation" >reserver votre place</button></a>
      <p>crer votre compte avant de reserver les vols !*</p>
          </div>
        </form>
        <span></span>
      </section>
      <section id="galerie">
                <h2>Galerie</h2>
                <img src="maldive.jpeg" alt="maldive">
                <img src="malysia.jpeg" alt="malysia">
                <img src="djerba.jpeg" alt="djerba">
                <img src="haweii.jpeg" alt="haweii">
                <img src="sibou.jpeg" alt="Sidi bou">
                <img src="sousse.jpeg" alt="Sousse">
                <span></span>
            </section>

            <section id="connecte">
                <h2>connecter a votre compte</h2>
                

                <form  method="post"  action="verification.php"  >
                    

                    <label for="Email">Votre email :</label>
                    <input type="email" id="Email" name="Email" required>

                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                    <button type="submit">Envoyer !</button>
                    <br>
                    
                </form>

            </section>
            <section id="newaccount">
                <p>* si vous niavez pas encore de compte <br>rejoindez nous Facilement!</p>
                <a href="signup.php"><button id="crer" >Créer un compte</button></a>

            </section>
            
                
        </main>

    </div>

    <footer>
        <p>Projet 2024 - &copy; WEB - Manar voyage</p>
    </footer>
   
    
</body>

</html>