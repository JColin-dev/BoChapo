<?php 
require("connexion_bdd.php");

if(isset($_GET["action"])) {
    if($_GET["action"] == "article") {
        $delete =$connexion->prepare("DELETE FROM article WHERE id_article=?");
        $delete->execute(array($_GET["id"]));

        header("Location: ../index.php?page=admin");
        exit;
    }
}