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
                <p>Notre agence de voyage, forte d'une expérience de plus de 20 ans, saura vous guider pour créer le
                    séjour de vos rêves. Avec plus de 5000 clients satisfaits à notre actif, nous savons répondre à
                    toutes les demandes et dans des délais restreints.</p>
                <p>Notre service clientèle est aux petits soins à
                    n'importe quelle heure de la journée, et n'importe quel jour de la semaine, pour assurer sérenité et
                    bien-être. L'objectif est simple : <strong>profitez de votre séjour !</strong></p>
                <span></span>
            </section>
            <section >
                <h2>Reserver un voyage</h2>
        <form  method="post" >
          <div >
         <a href="#connecte"> <button  style="
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