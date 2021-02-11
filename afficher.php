<?php
session_start() ;
include 'tete.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Publications</title>
    <link rel="stylesheet" href="home.css"/>
  </head>
  <body>

<?php
$c=$_SESSION["identifiant"]; ?>
<h1 class="koko" >Salut <?php echo"$c"; ?> </h1>
<aside1>
 <div id="option">
   <h1>Bulle d'options </h1>
	  <ul>
	   <li><a href="aide.php">Aide!</a></li>
	   <li><a href="demande.php">Modifier mon compte!</a></li>
	   <li><a href="deconnexion.php">Deconnexion</a></li>
	 </ul>
 </div>
</aside1>

<?php 
include("sqlCONNEX.php");
if (isset($_SESSION["identifiant"])) {
    $c=$_SESSION["id"];
    $req="SELECT messages,image FROM message WHERE compteur=$c ORDER BY id_message DESC";
    $resultat = mysqli_query ($connexion, $req ) ;
    if(!$resultat){
       echo" requête incorrecte \n";
       echo mysqli_error($connexion);
     }else{
       $pwd = mysqli_fetch_assoc($resultat);
       echo'<div class="pub1" ><table border="1" style="width: 740px;height:350px;" ;  solid >';
       while($pwd) {
              $h=$pwd["messages"];
              $p=$pwd["image"];
              echo"<tr><td>";
              echo '<h3>'.$h.'</h3>';
              echo '<hr><img src="./upload/'.$p.'" style="width:600px; height:500px;background-color:white;border-radius:10px;">';
              echo "</tr></td> <br>";
 	      $pwd= mysqli_fetch_assoc($resultat);
       }
       echo("</div>");
     }
}
mysqli_close($connexion);
?>
  </body>
</html>
