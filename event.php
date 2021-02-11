<?php
  session_start() ;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Events!</title>
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


<h1 class="kaka" >Les derniers big events </h1>
<img src="event.png" ><br>

<aside2 >
A la recherche d’idées de sorties en famille, à deux ou en groupe ? Paris et sa région foisonnent de lieux et d’activités de loisirs pour petits et grands. Vous trouverez des offres de loisirs et sorties à Paris pour remplir votre semaine et vos week-ends.
Pendant ou en dehors des vacances scolaires beaucoup d’activités sont proposées à Paris (de la simple sortie familiale aux activités à l’année).

Découvrez Paris !
</aside2>
<?php 
$c="3";
include("integ.php");
?>


 

     
    </body>
</html>
