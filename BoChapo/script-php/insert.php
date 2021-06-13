<?php
require("connexion_bdd.php");

/*if(isset($_GET["page"])) {

    if($_GET["page"] == "produit") {*/
        

        if(isset($_FILES["file"]) && isset($_POST["ref_article"]) && isset($_POST["int_article"]) && isset($_POST["description_article"]) && isset($_POST["stock_article"]) && isset($_POST["prix_article"])) {
        $dossier='../images/';
        $fichier=basename($_FILES['file']['name']);
        $taille_max=2000000;
        $taille=filesize($_FILES['file']['tmp_name']);
        $extensions=array('.png','.jpg','.jpeg','.gif');
        $extension=strtolower(strchr($_FILES['file']['name'],'.'));


            if(!in_array($extension,$extensions)){
                $erreur="Extension non autorisée !";
            }
            if ($taille>$taille_max){
                $erreur="fichier trop gros !";
            }

            if(!isset($erreur)){
                $fichier=preg_replace('/([^.a-z0-9]+)/i','-',$fichier);
                if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$fichier)){

                    $insert=$connexion->prepare("INSERT INTO article
                    (ref_article, intitule_article, description_article, image_produit, stock_article, prix_article, id_modele)
                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $insert->execute(array(
                                    strip_tags($_POST["ref_article"]),
                                    strip_tags($_POST["int_article"]),
                                    strip_tags($_POST["description_article"]),
                                    $fichier,
                                    $_POST["stock_article"],
                                    $_POST["prix_article"],
                                    $_POST["couleur"]
                                ));

                    if($insert) {
                        header("Location: ../index.php?page=admin");
                        exit;
                    } else {
                        header("Location: ../index.php?erreur=insert");
                        exit;
                    }
                }
            }
        }
    //}
//}

if(isset($_POST["couleur"])) {
    $insert=$connexion->prepare("INSERT INTO modele 
                                (nom_modele)
                                VALUES (?)");
    $insert->execute(array(
                    strip_tags($_POST["couleur"]
                    )));

    if($insert) {
        header("Location: ../index.php?page=admin");
        exit;
    } else {
        header("Location: ../index.php?erreur=insert");
    }
}