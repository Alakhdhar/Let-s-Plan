<?php
  session_start() ;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Hotels!</title>
     <link rel="stylesheet" href="home.css"/>
    </head>

    <body>
<?php

 include("tete.php");
include("sqlCONNEX.php");
?>
<h1 class="kaka">Les derniers post d'hotels </h1>
<img src="hotel.png" >
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

<aside2 class="top">
Vous comptez séjourner à Paris , vous cherchez un hôtel pour passer des vacances en famille ou vous cherchez un hotel à Paris pour organiser vos événements d’entreprise : congrès, conférence, séminaire, formation, etc. ?  Rassurez-vous ,vous êtes sur le bon site ! Ici sont postez des photos d'hôtels ainsi que des avis partagés par d'autres utilisateurs ,qui peuvent vous plaire!
</section2>

<?php 
$c="1";
include("integ.php");
?>

  </body>
</html>
