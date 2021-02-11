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
    <p1>Pour assurer la modification de votre mot de passe , veuillez saisir votre mot de passe actuel.</p1>
    <form class="modif" action="modifiermdp.php" method="post">
      
      Mot de passe actuel:</br>
	<input class="textnormal" type="password" name="mdp" placeholder="votre password">
	</br>
	     Votre nouveau mot de passe:</br>
	<input class="textnormal" type="password" name="mdp2" placeholder="votre nouveau password"></br>
      <input  class="sub" type="submit" value="modifier"  name="go"></br>
    </form>
    <?php
   include("sqlCONNEX.php");
      $m=$_SESSION['mdp'];
      $id=$_SESSION['identifiant'];
      if (isset($_POST['mdp'])&&isset($_POST['mdp2'])) { // regarde que les variables sont définis
        if (!empty($_POST['mdp'])&&!empty($_POST['mdp2'])) { // l'utilisateur doit renseigner tout les champs
          if ($m=$_POST['mdp']) { // vérifie si l'ancien mot de passe et le meme qu'il a renseigné
            $mdp=password_hash($_POST['mdp2'],PASSWORD_DEFAULT);
            $c=$_SESSION['id'];
            $req= "UPDATE user SET mdp='{$mdp}' WHERE id={$c}" ;
            $resultat = mysqli_query ($connexion, $req ) ;
            if(!$resultat){
               echo" requête incorrecte \n";
               echo mysqli_error($connexion);
            }
          }
          else {
            echo "<h4>Resaisissez votre mot de passe actuel !</h4>";
          }
        }
        else {
          echo "<h4>Veuillez remplir tous les champs !</h4>";
        }
     }
mysqli_close($connexion);
echo"</section>";
include("pied.php");
?>

  </body>
</html>
