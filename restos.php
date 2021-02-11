<?php
  session_start() ;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Restos!</title>
         <link rel="stylesheet" href="home.css"/>
    </head>

    <body>
<?php
include("tete.php");
include("sqlCONNEX.php");
?>
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


<h1 class="kiki" >Les derniers post de restaurants </h1>
<img  src="resto.jpeg" ><br>


<aside2>
Vous recherchez un restaurant à Paris ? Pour fêter un anniversaire ou faire une sortie entre amis ou en famille et il vous manque une adresse d'un bon restaurant ?  Jettez un coup d'oeil sur ce que vous propose les autres utilisateurs sur notre site et passez une excellente aprés-midi entre amis ou collègues !
    </aside2>
<?php 
$c="2";
include("integ.php");
?>

  </body>
</html>
