<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier</title>
    <link rel="stylesheet" href="home.css">
  </head>
  <body>

<?php
    include 'tete.php';
?> 
<section>
    <h1 class="titre">Modifiez votre compte</h1>
    <p1>Pour assurer la modification de votre identifiant , veuillez saisir votre mot de passe actuel.</p1>
    
    <form class="modif" action="modifieriden.php" method="post">
         Mot de passe actuel:</br>
	<input class="textnormal" type="password" name="mdp" placeholder="votre password">
	</br>
	Votre identifiant actuel:</br>
	<input class="textnormal" type="text" name="id" placehloder="password"></br>
        Votre nouvel identifiant:</br>
        <input class="textnormal" type="text" name="id2" placehloder="password"></br>
        <input  class="sub" type="submit" value="modifier"  name="go"></br>
    </form>
   <?php
   include("sqlCONNEX.php");
   $m=$_SESSION['mdp'];
   $id=$_SESSION['identifiant'];
      if (isset($_POST['mdp'])&&isset($_POST['id'])&&isset($_POST['id2'])) { // regarde que les variables sont définis
        if (!empty($_POST['mdp']) && !empty($_POST['id'])&&!empty($_POST['id2'])) { // l'utilisateur doit renseigner tout les champs
          if ($m=$_POST['mdp'] && $id=$_POST['id']) {
            $c=$_SESSION['id'];
            $i=$_POST['id2'];
            $req= "UPDATE user SET identifiant='{$i}' WHERE id={$c}" ;
            $resultat = mysqli_query ($connexion, $req ) ;
            if(!$resultat){
               echo" requête incorrecte \n";
               echo mysqli_error($connexion);
            }
          }
          else {
            echo "<h4>Resaisissez votre mot de passe et votre identifiant actuels !</h4>";
          }
        }else {
          echo "<h4>Veuillez remplir tous les champs!</h4>";
        }
      }
mysqli_close($connexion);
echo"</section>";
include("pied.php");
?>

  </body>
</html>
