

<?php

require("script-php/connexion_bdd.php");

$requete = $connexion->prepare("SELECT * FROM article");
$requete->execute(array());


?>


<div class="ensemble">
<?php 
while($article=$requete->fetch()) { ?>



<div class="card" style="width: 18rem;">
            <img src="images/<?= $article["image_produit"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $article["intitule_article"]; ?></h5>
                <button class="btn btn-primary"><a href="index.php?page=update&id=<?= $article["id_article"]; ?>">Modifier</a></button>
                <button class="btn btn-primary"><a href="script-php/delete.php?action=article&id=<?= $article["id_article"] ?>">Supprimer</a></button>
            </div>
    </div>

<?php } ?>
</div>

<button class="btn btn-primary"><a href="index.php?page=produit">Ajouter un produit</a></button>

<button class="btn btn-primary"><a href="index.php?page=couleur">Ajouter une couleur</a></button>
