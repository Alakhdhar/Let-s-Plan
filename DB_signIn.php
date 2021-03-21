<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$connexion = new PDO('mysql:host=localhost:3307;dbname=planning;charset=utf8', 'root', 'root');

if (! $connexion) {
    echo "Pas de connexion au serveur ";
    exit();
}

echo "Connexion reussie! <br/> ";
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $resultat = $connexion->query("SELECT * FROM utilisateurs WHERE utilisateurs.email='{$email}'") or die(print_r($connexion->errorInfo()));
    if (! $resultat) {
        echo "Requete incorrecte \n ";
    }
    $data = $resultat->fetch(PDO::FETCH_ASSOC);
    if ($resultat->rowCount() > 0) {
    echo $data["mdp"];
    echo $_POST["password"];
        if (strcmp($_POST["password"],$data["mdp"]) ==0) {
            $co = $data['id'];
            $pr = $data['prenom'];
            $n = $data['nom'];
            $m = $data['mdp'];
            session_start();
            $_SESSION['id'] = $co;
            $_SESSION['prenom'] = $pr;
            $_SESSION['nom'] = $n;
            $_SESSION['mdp'] = $m;
            header('Location:createEvent.html');
        } else {
            echo "Error 1";
        }
    }
}
$connexion = null;
?>