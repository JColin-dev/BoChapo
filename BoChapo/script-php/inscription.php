<?php 
session_start();
require("connexion_bdd.php");

    if(isset($_POST["mdp_client"])) {

        $insert = $connexion ->prepare("INSERT INTO client
        (nom_client, prenom_client, mdp_client, mail_client, adresse_client, type_client) VALUES(:nom_client, :prenom_client, :mdp_client, :mail_client, :adresse_client, :type_client)");

        $insert ->execute(array(":nom_client" => strip_tags($_POST["nom_client"]),
                            ":prenom_client" => strip_tags($_POST["prenom_client"]),
                            ":mdp_client" => password_hash(strip_tags($_POST["mdp_client"]),
                                                                                    PASSWORD_BCRYPT),
                            ":mail_client" => strip_tags($_POST["mail_client"]),
                            ":adresse_client" => strip_tags($_POST["adresse_client"]),
                            ":type_client" => 2));

        header("Location:../index.php");
        }


?>