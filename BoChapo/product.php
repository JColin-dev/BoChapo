<div class="ensemble">
<?php

$requete=$connexion->prepare("SELECT * FROM article WHERE id_article=?");
            $requete->execute(array($_GET["id"]));
            $article=$requete->fetch();
        ?>
            <div class="card" style="width: 30rem;">
            <img src="images/<?= $article["image_produit"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
        <h5 class="card-title"><?= $article["intitule_article"]; ?></h5>
        <p class="card-text"><?= $article["description_article"]; ?></p>
        <p class="card-text"><?= $article["prix_article"]; ?> euros</p>
        <p class="card-text"><?= $article["stock_article"]; ?> articles en stock</p>
        <a href="" class="btn btn-primary">Ajouter au panier</a>
            </div>
    </div>

</div>        

