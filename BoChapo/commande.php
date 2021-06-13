<?php 
require("script-php/connexion_bdd.php");
session_start();
$requete=$connexion->prepare("INSERT INTO commande (date_commande, id_client, statut_commande ) VALUES (?,?,?)");
$requete->execute(array(date("Y-m-d"),
                    $_SESSION["id_client"],
                    "en cours"));

                    $id_commande = $connexion->lastInsertId();

foreach($_SESSION['panier'] as $id_article=>$article_acheté) {
$requete=$connexion->prepare("INSERT INTO contient (id_article, id_commande, nb_commande) VALUES (?,?,?)");
$requete->execute(array($id_article,
                        $id_commande,
                        $article_acheté["qte"]));


                        $requete=$connexion->prepare("SELECT stock_article FROM article WHERE id_article=?");
                        $requete->execute(array($id_article));
                        $stock=$requete->fetch();

                        $stock_article =  $stock["stock_article"] - $article_acheté["qte"];

                        $requete=$connexion->prepare("UPDATE article SET stock_article=$stock_article WHERE id_article=?");
                        $requete->execute(array($id_article));

                        unset($_SESSION['panier'] );

                        header("Location: index.php");
}
