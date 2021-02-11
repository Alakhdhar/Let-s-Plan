<?php session_start() ?>
<!DOCTYPE html>
<head>
  <title> YassMira! </title>
  <meta charset ="utf-8" />
    <link rel="stylesheet" href="formulaire.css"/>
  </head>
<body>
  <header>
    <h3> Créer votre compte </h3>
  </header>
   <form action="enregistrement.php" method="POST" >
      <span class="champ">
           <label for="nom">Nom</label>
       <input type="text" name="nom" placeholder="taper votre nom ici " size="23"> </br>
      </span>
       <span class="champ">
           <label for="prénom">Prénom</label>
   	 <input type="text" name="prénom" placeholder="taper votre prenom ici " size="23"> </br>
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
     $connexion=mysqli_connect('localhost','phpmyadmin','alakh99','utilisateurs');

     if (!$connexion) {
        // echo "Pas de connexion au serveur " ;
         exit ;
     }
     echo "connexion réussie! <br/> " ;
     mysqli_set_charset($connexion, "utf8"); //pour que les caractères reçus soient codés en utf-8.
     //requête:
     if(  (isset($_POST["nom"]) && (isset($_POST["prénom"])&&(isset($_POST["identifiant"])&&(isset($_POST["mdp"])))))){
       if(!empty($_POST["nom"])&&!empty($_POST["prénom"])&&!empty($_POST["identifiant"])&&!empty($_POST["mdp"])){
         $lastname =  mysqli_real_escape_string($connexion , $_POST['nom']);
         $firstname =  mysqli_real_escape_string($connexion , $_POST['prénom']);
         $identifiant =  mysqli_real_escape_string($connexion , $_POST['identifiant']);
         $mdp=password_hash($_POST["mdp"],PASSWORD_DEFAULT);
         $req_pseudo="SELECT identifiant  FROM user WHERE identifiant='{$identifiant}'";
         $res_pseudo= mysqli_query($connexion,$req_pseudo);
         if(!$res_pseudo){
            echo" requête incorrecte \n";
            echo mysqli_error($connexion);
         }
         else {
           $count    = mysqli_num_rows($res_pseudo);
           if ($count==0){
           $req= "INSERT INTO user (nom,prenom,identifiant,mdp) VALUES('$lastname','$firstname','$identifiant','$mdp')" ;
           $resultat = mysqli_query ($connexion, $req ) ;
           if(!$resultat){
              echo" requête incorrecte \n";
              echo mysqli_error($connexion);
           }
           header('Location:connexion.php');
         }
         else {
           echo "ce pseudo existe déja";
         }
       }
      }
    else {
      echo "vouus devez remplier tout";
    }
  }
mysqli_close($connexion);
?>
   <footer><h3> Pour vous connectez cliquez  <a href="connexion.php">ici</a></h3></footer>
</body >
</html >
