<?php session_start() ?>
<!DOCTYPE html>
<head>
  <title> Let's Plan ! </title>
  <meta charset ="utf-8" />
    <link rel="stylesheet" href="formulaire.css"/>
  </head>
<body>
  <header>
      <h1>Bienvenue sur Let's Plan</h1>
    <h3> Créer votre compte </h3>
  </header>
   <form action="enregistrement.php" method="POST" >
      <span class="champ">
           <label for="nom">Nom</label>
       <input type="text" name="nom" placeholder="taper votre nom ici " size="23"> </br>
      </span>
       <span class="champ">
           <label for="prénom">Prénom</label>
   	 <input type="text" name="prénom" placeholder="taper votre prénom ici " size="23"> </br>
       </span>
        <span class="champ">
           <label for="identifiant">Identifiant</label>
   	<input type="text" name="identifiant" placeholder="taper votre id ici " size="23"></br>
        </span>
         <span class="champ">
           <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" placeholder="password" size="23"> </br>
   	</span>
    <span class="actions">
      <input type="submit" value="Envoyer" name="go">
      </span>
    </form>
  <?php
  //connexion au serveur:
  $connexion= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', 'root');
  if (!$connexion) {
      echo "Pas de connexion au serveur " ;
      exit ;
  }
  //echo "connexion réussie! " ;
  //requête:
  if(  (isset($_POST["nom"]) && (isset($_POST["prénom"])&&(isset($_POST["identifiant"])&&(isset($_POST["mdp"])))))){
      if(!empty($_POST["nom"])&&!empty($_POST["prénom"])&&!empty($_POST["identifiant"])&&!empty($_POST["mdp"])){
          $lastname =   $_POST['nom'];

          $firstname =  $_POST['prénom'];
          $identifiant = $_POST['identifiant'];
          $mdp=$_POST["mdp"];
          $res_pseudo=$connexion->query("SELECT identifiant  FROM user WHERE identifiant='{$identifiant}'");

          if(!$res_pseudo){
              echo" requête incorrecte \n";
              $res_pseudo->closeCursor();
          } else {
              $res_pseudo->closeCursor();
              $count = mysqli_num_rows($res_pseudo);
              if ($count==0){
                  $resultat= $connexion->exec("INSERT INTO user (nom,prenom,identifiant,mdp) VALUES('$lastname','$firstname','$identifiant','$mdp')" ) or die(print_r($connexion->errorInfo()));
                  if(!$resultat){
                      echo" requête incorrecte \n";
                      //echo mysqli_error($connexion);
                  }
                  $resultat->closeCursor();
                  header('Location:connexion.php');
              } else {
                  echo "Ce pseudo existe déja";
              }
          }
      } else {
          echo "Vous devez tout remplir";
      }
  }
     $connexion->closeCursor();
  ?>

   <footer><h3> Pour vous connectez cliquez sur <a href="connexion.php">ici</a></h3></footer>
</body >
</html >
