<?php require("script-php/connexion_bdd.php");

 $requete = $connexion->prepare("SELECT * FROM commande WHERE id_commande = ?");
    $requete->execute(array($_GET["id"]));
    $commande=$requete->fetch();

?>



<form action="script-php/update.php?id=<?= $_GET["id"]; ?>" method="post">

<label for="date">Sélectionnez la date de livraison :</label>
<input type="date" name="date_livraison" id=""><br/>

<label for="date">Sélectionnez le statut de la commande:</label>
<select name="statut_commande" id="">
    <option value="<?php echo $commande["id_commande"] ?>"><?php echo $commande["statut_commande"] ?></option>
    <option value="Expédiée">Expédiée</option>
    <option value="En cours">En cours</option>
</select>

<input type="submit" value="Valider">

</form>