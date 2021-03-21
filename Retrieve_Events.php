<?php
$connexion = new PDO('mysql:host=localhost:3307;dbname=planning;charset=utf8', 'root', 'root');

if (! $connexion) {
    echo "Pas de connexion au serveur ";
    exit();
}

echo "Connexion reussie! <br/> ";
session_start();
if (isset($_SESSION["id"])) {
    $resultat = $connexion->query("Select e.titre,e.description,e.Type,e.Date,e.duree,e.lieu,e.moyenDeTransport, e.inviteExternes from evenements e, invitations i  where i.idUtilisateur='{$_SESSION['id']}' AND e.id=i.idEvenement;'") or die(print_r($connexion->errorInfo()));
    if (! $resultat) {
        echo "Requete incorrecte \n ";
    }
    $data = $resultat->fetch(PDO::FETCH_ASSOC);
    $events = $resultat->fetchAll();
    }
else {
    echo "session invalide !!";
}
$connexion= null;
?>