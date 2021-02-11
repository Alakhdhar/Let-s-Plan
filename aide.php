<?php
session_start() ;
?>
<!DOCTYPE html>
<head>
<title> Page d'aide </title>
<meta charset ="utf-8" />
<link rel="stylesheet" href="home.css"/>
</head>
<body>

<?php include("tete.php"); ?>

<h1 class="koko" align="center"><strong>Contact</strong></h1>

  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <form action="aide.php" method="POST">
  <tr>
  <td colspan="3"><h4>Besoin d'aide ? Contactez-nous !</h4></td>
  </tr>
  <tr>
  <td width="17%"><div align="left">Adresse</div></td>
  <td class="mail" colspan="2"><input class="m"type="text" name="mail" size="33" ></td>
  </tr>
  <tr>
  <td><div align="left">Objet</div></td>
  <td class ="objet" colspan="2"><input type="text" name="objet" size="33" ></td>
  </tr>
  <tr>
  <td><div align="left">Message</div></td>
  <td class="message" colspan="2"><input class="mes" type="text" name="message" cols="50" rows="10"></td>
  </tr>
  <tr>
  <td></td>
  <td width="42%"><center>
    <input class="awed" type="reset" name="Submit" value="Réinitialiser">
    </center></td>
    <td width="41%" ><center>
    <input class="yes" type="submit" name="Submit" value="Envoyer">
    </center></td>
    </tr>
    </form>
    </table>


<?php
include("sqlCONNEX.php");
if (isset($_POST["mail"]) && isset($_POST["message"]) && isset($_POST["objet"])) {
      if (!empty($_POST['mail'])&&!empty($_POST['message'])&&!empty($_POST['objet'])) {
        $a=trim($_POST["mail"]);
        $m=htmlentities($_POST["message"]);
        $o=htmlentities($_POST["objet"]);
        $c=$_SESSION["id"];
        $b=true;
        if (filter_var($a, FILTER_VALIDATE_EMAIL)) {
          $req="INSERT INTO contact (id_utili,Objet,adresse_email,message) VALUES ('$c','$o','$a','$m')";
          $resultat = mysqli_query ($connexion, $req ) ;
          if(!$resultat){
             echo"requête incorrecte \n";
             echo "mysqli_error($connexion)";
             $b=false;
          }
        }
        else {
          echo "<p2>Votre mail n'est pas valide</p2>";$b=false;
        }
      }else {
        echo "<p3>Merci de remplir tout le formulaire!</p3>";$b=false;
      }

   if($b){
    echo "<p5> Merci ! Bientôt , nous allons traiter votre message et vous répondre par mail !</p5>";
   }
}
mysqli_close($connexion);
include("pied.php");
?>

</body>
</html>
