<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="style.css"/>
    <title>Document</title>
</head>
<!-- Header section -->
<header>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
  </header>
  
  <!-- Main section -->
  <main>
    
    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>
    <form id="new-member-form"> <!--changement de class à id pour le getElementById de app.js-->
      <label for="name">Nom de l&apos;Argonaute</label>

      <input id="name" name="nom" type="text" placeholder="Votre Nom" />
            
      <button type="submit" onclick="window.location.reload(false)" id="inscription">Envoyer</button>
    </form>
    
    <!-- Member list -->
    <h2>Membres de l'équipage</h2>
    <section class="member-list">

      <!-- Partie selecion des argonautes  -->

      <?php

        /*donnéé pour accéder a la base de donnée*/
        $host = "localhost";
        $port = 3306; //port par defaut
        $dbname = "argonaute";
        $user = "root";
        $pwd = "";

        // Try Catch pour les exceptions et les erreurs
        try{
            $bdd2 = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pwd);
        }catch(PDOException $e){
            die('Erreur :' .$e->getMessage());
        }
        
        $select = $bdd2 -> prepare("SELECT * FROM inscrit");
        $selectIsOk = $select->execute();

        /*on récupère les données*/ 
        $noms = $select->fetchAll(); 
      ?>

      <!-- fin de selection -->


      <div class="member-item">

          <?php foreach($noms as $nom): ?>
            <li>
              <?= $nom["nom"] ?>
            </li>
          <?php endforeach; ?>

      </div>

    </section>

    <script src="app.js"></script>
    
  </main>
  
  <footer>
    <p>Réalisé par Jason et Oussama aussi hein, faut pas abuser Jason. En Anthestérion de l'an 515 avant JC</p>
  </footer>
  </html>
  