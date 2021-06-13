<?php 

session_start();
require("connexion_bdd.php");

$requete = $connexion->prepare("SELECT * FROM client
                        WHERE mail_client = ?");
$requete->execute(array($_POST["mail_client"]));
$client=$requete->fetch();

if($client) {
    if(password_verify($_POST["mdp_client"],$client["mdp_client"])) {
            $_SESSION["type_client"] = $client["type_client"];
            $_SESSION["id_client"] = $client["id_client"];
        header("Location:../index.php");
        exit;
    } else {
        header("Location:../index.php?page=connexion&erreur=pw");
        exit;
    }
} else {
    header("Location:../index.php?page=connexion&erreur=login");
    exit;
}

?>
