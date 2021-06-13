<div class="ensemble">
<?php 
            $requete=$connexion->prepare("SELECT * FROM article");
            $requete->execute(array());
            while($article=$requete->fetch()) {
        ?>

    <div class="card" style="width: 18rem;">
            <a href="./index.php?page=product&id=<?= $article["id_article"]; ?>"><img src="images/<?= $article["image_produit"]; ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= $article["intitule_article"]; ?></h5>
                <p class="card-text"><?= $article["prix_article"]; ?> euros</p>
                <a href="panier.php?id_article=<?= $article["id_article"] ?>&nom_article=<?= $article["intitule_article"] ?>&prix_article=<?= $article["prix_article"] ?>&ajouter" class="btn btn-primary">Ajouter au panier</a>
            </div>
    </div>


<?php } ?>
</div>