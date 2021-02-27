<?php
    $connexion= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', 'root');
   if (!$connexion) {
        echo "Pas de connexion au serveur " ; exit ;
    }
    echo "connexion réussie! <br/> " ;

 ?>
