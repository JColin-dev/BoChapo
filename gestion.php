<div class="ensemble">
<?php
$requete = $connexion->prepare("SELECT * FROM commande");
$requete->execute(array());
            while($article=$requete->fetch()) {
                    $date_commande = new dateTime($article["date_commande"]); 

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

<?php }} ?>
</div>

<?php

    $reqs = $connexion->prepare("SELECT date_commande FROM commande");
    $reqs->execute(array());
    $gestion=$reqs->fetch();

?>
<h1>Livraison de la commande : </h1>
<p>Date de la commande : <?= $date_commande->format('d/m/Y') ?></p>

<form action="script-php/insert.php">
    
    <select name="statut" id="">
        <option value=""></option>
    </select>

</form>



