<button class="btn btn-primary"><a href="index.php?page=produit">Ajouter un produit</a></button>

<button class="btn btn-primary"><a href="index.php?page=couleur">Ajouter une couleur</a></button>

<?php

require("script-php/connexion_bdd.php");

$requete = $connexion->prepare("SELECT * FROM article");
$requete->execute(array());


?>

<table>
    <thead>
        <tr>
            <th>Articles</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
<tbody>

<?php 
while($article=$requete->fetch()) { ?>

<tr>
    <td><img src="images/<?= $article["image_produit"]; ?>" class="card-img-top" alt="..."></td>
    <td><button class="btn btn-primary"><a href="index.php?page=update&id=<?= $article["id_article"]; ?>">Modifier</a></button></td>
    <td><button class="btn btn-primary"><a href="script-php/delete.php?action=article&id=<?= $article["id_article"] ?>">Supprimer</a></button></td>
</tr>

<?php } ?>
</tbody>