<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title> Let's Plan ! </title>
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
            $connexion= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', 'root');

           if (!$connexion) {
               echo "Pas de connexion au serveur " ; exit ;
           }

            echo "connexion réussie! <br/> " ;
            if (isset($_POST["identifiant"]) && isset($_POST["mdp"])) {
              $identifiant=$_POST["identifiant"];
              $resultat= $connexion->query("SELECT * FROM utilisateurs.user WHERE utilisateurs.identifiant='{$identifiant}'") or die(print_r($connexion->errorInfo()));
              if(!$resultat){
                 echo" requête incorrecte \n ";
               }
                $data = PDO::FETCH_ASSOC($resultat);
              if($resultat->rowCount() > 0) {
                  if( password_verify($_POST["mdp"], $data["mdp"]) ) {
                         $id=$data['identifiant'];
                         $pr=$data['prenom'];
                         $n=$data['nom'];
                         $m=$data['mdp'];
                         $co=$data['id'];
                        $_SESSION['identifiant']=$id;
                        $_SESSION['id']=$co ;
                        $_SESSION['mdp']=$m;
                        header('Location:connexion.php');
                  }else {
                    echo "Error 1";
                  }
              }
            }
       $connexion->closeCursor();
            ?>
  </body>
</html>
