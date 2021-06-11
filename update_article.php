<?php 

require("script-php/connexion_bdd.php");

if(isset($_GET["id"])) {

$requete = $connexion->prepare("SELECT * FROM article WHERE id_article = ?");
$requete->execute(array($_GET["id"]));
$article=$requete->fetch();

?>

<form action="script-php/update.php?id=<?= $_GET["id"]; ?>" method="post" enctype="multipart/form-data">

<label for="ref">Référence article :</label>
<input type="text" name="ref_article" id="" value="<?= $article["ref_article"]; ?>">

<label for="intitule">Intitulé :</label>
<input type="text" name="int_article" id=""value="<?= $article["intitule_article"]; ?>">

<label for="description">Description :</label>
<textarea name="description_article" ><?= $article["description_article"]; ?></textarea>

<label for="file">Image du produit :</label>
<input type="hidden" name="name_file" value="<?= $article["image_produit"]; ?>">
<input type="file" name="file" id="" value="<?= $article["image_produit"]; ?>">

<label for="stock">Stock :</label>
<input type="number" name="stock_article" id="" value="<?= $article["stock_article"]; ?>">

<label for="prix">Prix :</label>
<input type="number" name="prix_article" id="" value="<?= $article["prix_article"]; ?>">

<label for="colori">Choisisez une couleur : </label>

<select name="couleur" id="couleur">
<?php

    $requete = $connexion->prepare("SELECT * FROM modele");
    $requete->execute(array());
    while($modele=$requete->fetch()) {  
        if($modele["id_modele"] == $article["id_modele"]) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        ?>
    <option value="<?= $modele["id_modele"]; ?>"<?= $selected ?>><?= $modele["nom_modele"]; ?></option>
    
    <?php }} ?>
</select>

<input type="submit" value="Envoyer">
</form>