<?php 
session_start();
require("script-php/connexion_bdd.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>BoChapo</title>
</head>
<body>
    <header>
        <h1><a href="index.php">Bochapo</a></h1>
            <nav>
            <?php if(!isset($_SESSION["type_client"])) { ?>
                    <a href="index.php?page=connexion">Connexion</a>
                    <a href="index.php?page=inscription">Inscription</a>
                    
                <?php } else { ?>
                    <a href="index.php?page=infos">Mon Profil</a>
                    <a href="index.php?page=boutique">Boutique</a>
                    <a href="panier.php">Panier</a>
                    <a href="script-php/deconnexion.php">Déconnexion</a>
                    <?php 
                    if($_SESSION["type_client"] == 1) {?>

                    <a href="index.php?page=admin">Admin</a>
                    <a href="index.php?page=gestion">Gestion des commandes</a>
                
                <?php }} ?>
                
            </nav>
    </header>
    


    <?php
        
        if(isset($_GET["page"])) {
        switch($_GET["page"]) {
            case "inscription":
                include("form_inscription.php");
                break;
            case "connexion":
                include("form_connexion.php");
                break;
            case "admin":
                include("admin.php");
                break;
            case "produit":
                include("form_produit.php");
                break;
            case "boutique":
                include("boutique.php");
                break;
            case "product":
                include("product.php");
                break;
            case "infos":
                include("informations.php");
                break;
            case "update_infos":
                include("update_infos.php");
                break;
            case "update_mdp":
                include("update_mdp.php");
                break;
            case "couleur":
                include('form_couleur.php');
                break;
            case "update":
                include("update_article.php");
                break;
            case "panier":
                include("panier.php");
                break;
            case "gestion":
                include("gestion.php");
                break;
            case "commande":
                include("commandes.php");
                break;
            case "modif_commandes":
                include("modif_commandes.php");
                break;
            }
        }
    ?>
</body>
</html>