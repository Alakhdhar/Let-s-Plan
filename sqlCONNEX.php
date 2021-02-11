<?php
 $connexion=mysqli_connect('localhost','root','root','utilisateurs');
   if (!$connexion) {
        echo "Pas de connexion au serveur " ; exit ;
    }
    echo "connexion réussie! <br/> " ;


    mysqli_set_charset($connexion, "utf-8");
 ?>
