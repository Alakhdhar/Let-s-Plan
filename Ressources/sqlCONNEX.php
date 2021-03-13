<?php
    $connexion= new PDO('mysql:host=localhost;dbname=planning;charset=utf8', 'root', 'root');
   if (!$connexion) {
        echo "Pas de connexion au serveur " ; exit ;
    }
    echo "Connexion reussie! <br/> " ;

 ?>
