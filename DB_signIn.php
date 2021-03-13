<?php
$connexion = new PDO('mysql:host=localhost;dbname=planning;charset=utf8', 'root', 'root');

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
    $data = PDO::FETCH_ASSOC($resultat);
    if ($resultat->rowCount() > 0) {
        if (password_verify($_POST["password"], $data["mdp"])) {
            $co = $data['id'];
            $pr = $data['prenom'];
            $n = $data['nom'];
            $m = $data['mdp'];
            $_SESSION['id'] = $co;
            $_SESSION['prenom'] = $pr;
            $_SESSION['nom'] = $n;
            $_SESSION['mdp'] = $m;
            header('Location:events.html');
        } else {
            echo "Error 1";
        }
    }
}
$connexion->closeCursor();
?>