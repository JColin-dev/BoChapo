<div class="ensemble">
<?php
$requete = $connexion->prepare("SELECT * FROM commande");
$requete->execute(array());
            while($article=$requete->fetch()) {
                    $date_commande = new dateTime($article["date_commande"]); ?>
<div>

<?php
$req = $connexion->prepare("SELECT id_commande, intitule_article, description_article, image_produit, prix_article FROM contient, article WHERE id_commande=? AND contient.id_article = article.id_article");
$req->execute(array($article["id_commande"]));
            while($commande=$req->fetch()) {
        ?>

    <div class="card" style="width: 18rem;">
            <a><img src="images/<?= $commande["image_produit"]; ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= $commande["intitule_article"]; ?></h5>
                <p class="card-text"><?= $commande["prix_article"]; ?> euros</p>
                
                <p class="card-text">La date de la commande est le  : <?= $date_commande->format('d/m/Y'); ?></p>
            </div>
    </div>

<?php } ?>

<h1>Livraison de la commande : </h1>



<form action="script-php/update.php">
    
    <input type="submit" value="Modifier">

</form>
</div>

<?php } ?>
</div>

<?php

    

?>




