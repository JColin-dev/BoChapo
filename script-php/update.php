<?php

require("connexion_bdd.php");

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["adresse"])) {
    if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["adresse"])) {
        $update = $connexion->prepare("UPDATE client
                                        SET nom_client=?,
                                        prenom_client=?,
                                        mail_client=?,
                                        adresse_client=? 
                                        WHERE id_client=?");
        $update->execute(array(strip_tags($_POST["nom"]),
                                strip_tags($_POST["prenom"]),
                                strip_tags($_POST["email"]),
                                strip_tags($_POST["adresse"]),
                                $_GET["id"]));
        if($update) {
            header("Location:../index.php?page=infos");
            exit;
        }
    }
}

$requete=$connexion->prepare("SELECT * FROM client WHERE id_client=?");
            $requete->execute(array($_GET["id"]));
            $client=$requete->fetch();

if(isset($_POST["old_mdp"]) && isset($_POST["new_mdp"]) && isset($_POST["mdp_confirm"])) {
    if(!empty($_POST["old_mdp"]) && !empty($_POST["new_mdp"]) && !empty($_POST["mdp_confirm"])) {
        if(password_verify($_POST["old_mdp"],$client["mdp_client"])) {
            if($_POST["new_mdp"] == $_POST["mdp_confirm"]) {

                $update = $connexion->prepare("UPDATE client
                                        SET mdp_client=? 
                                        WHERE id_client=?");
                $update->execute(array(password_hash(strip_tags($_POST["new_mdp"]),
                PASSWORD_BCRYPT),
                $_GET["id"]));
        
                if($update) {
            header("Location:../index.php?page=infos");
            exit;
                }
            }
        }
    }
}



if(isset($_POST["ref_article"]) && isset($_POST["int_article"]) && isset($_POST["description_article"]) && isset($_POST["stock_article"]) && isset($_POST["prix_article"]) && isset($_POST["couleur"])) {

    if(!empty($_POST["ref_article"]) && !empty($_POST["int_article"]) && !empty($_POST["description_article"]) && !empty($_POST["stock_article"]) && !empty($_POST["prix_article"]) && !empty($_POST["couleur"])) {

        if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) {
            $file = $_FILES["file"]["name"];
            $dossier='../img/';

            $fichier=basename($_FILES['file']['name']);
            $taille_max=2000000;
            $taille=filesize($_FILES['file']['tmp_name']);
            $extensions=array('.png','.jpg','.jpeg','.gif');
            $extension=strchr(strtolower($_FILES['file']['name'],'.'));


if(in_array($extension,$extensions)){

    if ($taille<$taille_max){

        
    $fichier=preg_replace('/([^.a-z0-9]+)/i','-',$fichier);
    move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$fichier);
    }
}
        
        } else {
            $file = $_POST["name_file"];
                }
            
            $update = $connexion->prepare("UPDATE article SET
            ref_article = ?, intitule_article = ?, description_article = ?, image_produit = ?, stock_article = ?, prix_article = ?, id_modele = ? WHERE id_article = ?");

            $update->execute(array(strip_tags($_POST["ref_article"]),
            strip_tags($_POST["int_article"]),
            strip_tags($_POST["description_article"]),
            $file,
            $_POST["stock_article"],
            $_POST["prix_article"],
            $_POST["couleur"],
            $_GET["id"]
        ));
        if($update) {
            header("Location:../index.php?page=admin");
            exit;
            } else {
                echo "pas de modifs";
            }
        }
    }
