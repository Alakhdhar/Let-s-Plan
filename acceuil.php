<?php
session_start() ;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome!</title>
        <link rel="stylesheet" href="home.css"/>
    
    </head>

    <body background="fond.jpg" >

<?php 
include("tete.php");
  echo"<section>";
  $idp= $_SESSION['identifiant']; 
?>
 
<img style="width: 500px; height:150px;padding-right:235px;" src="plan.png" >
<h1>Salut <?php echo "$idp"; ?> </h1>
<h4>Une nouvel activité ou adresse découverte sur Paris ?! <br> Partage là avec nous !</h4>

<form class="message" action="acceuil.php" method="POST" enctype="multipart/form-data">
    <label for="msg"> Message :</label>
    <textarea name="msg" placeholder="taper votre message" size="300"></textarea>
    <select class="liste" name="choix"size="1">
      <option value="1">Hotel</option>
      <option value="2">Restaurant</option>
      <option value="3">Evénement</option>
    </select><br><br><br>
    <label for="photo">Ajouter une photo:</label>
    <input class="fic" type="file" name="photo" value=""><br>
    <input class="yes" type="submit" name="go" value="envoyer"><br>
</form>

<?php 
include("sqlCONNEX.php");
if (isset($_POST['msg'])&&isset($_POST["choix"])&&isset($_FILES['photo'])&&!empty($_FILES['photo']['name'])) { //pour ajouter un message
  if ($_FILES['photo']['error'] > 0) {
     echo "<h4>Erreur lors du transfert</h4>";
  }else{
     $maxsize=200000;
     $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
     if ($_FILES['photo']['size']<=$maxsize) {
      	$extensionUpload=strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
        if (in_array($extensionUpload,$extensions_valides)) {
      	    $tmp_file = $_FILES['photo']['tmp_name'];
            $date=time();
            $dossier = 'upload/';
            $fichier = basename($_FILES['photo']['name']);
            $c=$_SESSION["id"];
            $msg=$_POST['msg'];
            $choix=$_POST['choix'];
            $photo="$date.$extensionUpload";
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.$photo)){ //correct si la fonction renvoie TRUE
		echo '<h4>Upload effectué avec succès !</h4>';
                $req= "INSERT INTO message (messages,compteur,choix,image) VALUES('$msg','$c','$choix','$photo')" ;
                $resultat = mysqli_query ($connexion, $req ) ;
                if(!$resultat){
                  echo"requête incorrecte \n";
                  echo "mysqli_error($connexion)";
                }
            }else //sinon, cas où la fonction renvoie FALSE
                 {
			echo 'Echec de l\'upload !';
                  }
        }else{
            echo "<h4>extension non valide</h4>";
        }
     }else{
          echo "<h4>taille de la photo trop grande</h4>";
     }
  }
}

?>
<a href="afficher.php" >Voir mes publication</a>
</section>
<?php
include("pied.php");
mysqli_close($connexion);
?>

</body>
</html>
