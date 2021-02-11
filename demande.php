<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier mon compte</title>
    <link rel="stylesheet" href="home.css">
  </head>
  <body background="fond1.JPG" >
    <?php
    include 'tete.php';
    ?>
    <h1 class="koko">Modifiez votre compte</h1>
    <br>
    <div class="diviseur"></div>
    <div class="hi" >
     <a href="modifiermdp.php" >Modifier mon mot de passe</a>
    </div>
    <div class="ho"><a href="modifieriden.php">Modifier mon identifiant </a>
    </div>
    <div class="diviseur"></div>
<?php
include("pied.php");
?>
  </body>
</html>
