<?php 
  session_start();

  $connexion= new PDO('mysql:host=localhost;dbname=planning;charset=utf8', 'root', 'root');

  if (!$connexion) {
      echo "Pas de connexion au serveur." ;
      exit ;
  }
  echo "Connexion reussie! " ;
  
  if(isset($_POST['date']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['place']) && isset($_POST['duration']) && isset($_POST['friends'])){
      if(!empty($_POST['date']) && !empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['place']) && !empty($_POST['duration'])){
          
          $date = $_POST['date'];
          $title = $_POST['title'];
          $type = $_POST['type'];
          $description = $_POST['description'];
          $place = $_POST['place'];
          $duration = $_POST['duration'];
          
          $transportationMean ="";
          if (isset($_POST['onFoot'])){
              $transportationMean+=";à Pied";
          }
          if (isset($_POST['plane'])){
              $transportationMean+=";avion";
          }
          if (isset($_POST['boat'])){
              $transportationMean+=";bateau";
          }
          if (isset($_POST['bus'])){
              $transportationMean+=";bus";
          }
          if (isset($_POST['taxi'])){
              $transportationMean+=";taxi";
          }
          if (isset($_POST['train'])){
              $transportationMean+=";train";
          }
          if (isset($_POST['bike'])){
              $transportationMean+=";velo";
          }
          if (isset($_POST['car'])){
              $transportationMean+=";voiture";
          }
          
          $friends = $_POST['friends'];
      } else {
          echo "Vous devez remplir les champs : date, titre, type, lieu et duree.";
      }
  }
  
  // Insert in evenements :
  $connexion->exec("INSERT INTO evenements (titre, description, Type, Date, duree, lieu, moyenDeTransport, amis) VALUES('$title', '$description', '$type', '$date', '$duration', '$place', ' $transportationMean', '$friends')" ) or die(print_r($connexion->errorInfo()));
  
  // Insert in invitations :
  $result= $connexion->query("SELECT * FROM evenements WHERE evenements.titre='{$title}'") or die(print_r($connexion->errorInfo()));
  if(!$result){
      echo "Requete incorrecte. \n ";
  }
  $data = $result->fetch();
  $eventId = $data['id'];
  $result->closeCursor();
  
  $friendsArray = explode(", ", $friends, 3);
  foreach($friendsArray as $friend){
      $result= $connexion->query("SELECT * FROM utilisateurs WHERE utilisateurs.email='{$friend}") or die(print_r($connexion->errorInfo()));
      if(!$result){
          echo "Requete incorrecte. \n ";
      }
      $data = $result->fetch();
      $friendId = $data['id'];
      $result->closeCursor();
      
      $connexion->exec("INSERT INTO invitations (idEvenement, idUtilisateur) VALUES('$eventId','$friendId')" ) or die(print_r($connexion->errorInfo()));
      
  }
  
  $connexion->closeCursor();
  
  header('Location:eventSubmitted.html');
  
  ?>