<?php
  //connexion au serveur:
  $connexion= new PDO('mysql:host=localhost;dbname=planning;charset=utf8', 'root', 'root');

  if (!$connexion) {
      echo "Pas de connexion au serveur " ;
      exit ;
  }
  echo "Connexion reussie! " ;
  //requete:
  if(  (isset($_POST["demo-name"]) && (isset($_POST["surname"])&&(isset($_POST["email"])&&(isset($_POST["password"])))))){
      if(!empty($_POST["demo-name"])&&!empty($_POST["surname"])&&!empty($_POST["email"])&&!empty($_POST["password"])){
          
          $lastname =   $_POST['demo-name'];
          $firstname =  $_POST['surname'];
          $email = $_POST['email'];
          $password=$_POST["password"];
          $res_pseudo=$connexion->query("SELECT *  FROM utilisateurs WHERE email='{$email}'");

          if(!$res_pseudo){
              echo "Requete incorrecte \n";
              $res_pseudo->closeCursor();
          } else {
              $res_pseudo->closeCursor();
              $count = mysqli_num_rows($res_pseudo);
              if ($count==0){
                  $resultat= $connexion->exec("INSERT INTO utilisateurs (nom,prenom,email,mdp) VALUES('$lastname','$firstname','$email','$password')" ) or die(print_r($connexion->errorInfo()));
                  if(!$resultat){
                      echo "Requete incorrecte \n";
                      //echo mysqli_error($connexion);
                  }
                  $resultat->closeCursor();
                  header('Location:login.php');
              } else {
                  echo "Cet email est deja utilise";
              }
          }
      } else {
          echo "Vous devez tout remplir";
      }
  }
     $connexion->closeCursor();
  ?>