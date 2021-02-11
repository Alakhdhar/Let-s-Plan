<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Let's Plan connexion</title>
      <link rel="stylesheet" href="connexion.css"/>
  </head>
  <body>
    <header>
        <h1> Bienvenue sur Let's Plan</h1>
      <h2> connectez-vous</h2>
    </header>
       <form action="connexion.php" method="POST" >
         <span class="champ">
           <label for="identifiant">Identifiant</label>
   	<input type="text" name="identifiant" placeholder="taper votre id ici " size="23"></br>
         </span>
          <span class="champ">
           <label for="mdp">Mot de passe</label>
       <input type="password" name="mdp" placeholder="password" size="23"> </br>
          </span>
           <span class="actions">
   	  <input type="submit" value="Se connecter"  name="go">
   	  </span>
          </form>
       <?php

           $dbhost = 'localhost:3306';
           $dbuser = 'root';
           $dbpass = 'root';
           $connexion = mysqli_connect($dbhost, $dbuser, $dbpass);

           if (!$connexion) {
               echo "Pas de connexion au serveur " ; exit ;
           }

            echo "connexion réussie! <br/> " ;
            mysqli_set_charset($connexion, "utf8");
            if (isset($_POST["identifiant"]) && isset($_POST["mdp"])) {
              $identifiant=$_POST["identifiant"];
              $req= "SELECT * FROM utilisateurs.user WHERE utilisateurs.identifiant='{$identifiant}'";
              $resultat = mysqli_query ($connexion, $req ) ;
              if(!$resultat){
                 echo" requête incorrecte \n ";
                 echo mysqli_error($connexion);
               }

               $count= mysqli_num_rows($resultat);
               $pwd = mysqli_fetch_assoc($resultat);

               if ($count > 0) {
		 if( password_verify($_POST["mdp"], $pwd["mdp"]) ) {
                     $id=$pwd['identifiant'];
                     $pr=$pwd['prenom'];
                     $n=$pwd['nom'];
                     $m=$pwd['mdp'];
		     $co=$pwd['id'];
		     $_SESSION['identifiant']=$id;
		     $_SESSION['id']=$co ;
                     $_SESSION['mdp']=$m;
	             header('Location:acceuil.php');
		  }else {
		      echo "Error 1";
		         
		    }
		  }
		     }

	mysqli_close($connexion);
		    ?>
  </body>
</html>
