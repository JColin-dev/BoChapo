<?php include("admin.php"); 
require("script-php/connexion_bdd.php");



?>

<form action="script-php/insert.php" method="post" enctype="multipart/form-data">

<label for="ref">Référence article :</label>
<input type="text" name="ref_article" id="">

<label for="intitule">Intitulé :</label>
<input type="text" name="int_article" id="">

<label for="description">Description :</label>
<textarea name="description_article"></textarea>

<label for="file">Image du produit :</label>
<input type="file" name="file" id="">

<label for="stock">Stock :</label>
<input type="number" name="stock_article" id="">

<label for="prix">Prix :</label>
<input type="number" name="prix_article" id="">

<label for="colori">Choisisez une couleur : </label>


<select name="couleur" id="couleur">
<?php

    $requete = $connexion->prepare("SELECT * FROM modele");
    $requete->execute(array());
    while($modele=$requete->fetch()) { ?>

<option value="<?= $modele["id_modele"]; ?>"><?= $modele["nom_modele"]; ?></option>
    
    <?php } ?>
</select>

<input type="submit" value="Envoyer">
</form>