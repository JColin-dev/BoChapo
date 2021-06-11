<?php 
require("script-php/connexion_bdd.php");

if(isset($_GET["id"])) {

$requete = $connexion->prepare("SELECT * FROM client");
$requete->execute(array());
$client=$requete->fetch();

?>


<form action="script-php/update.php?id=<?= $_GET["id"]; ?>" method="post">

<label for="nom">Nom :</label>
<input type="text" name="nom" id="" value="<?= $client["nom_client"]; ?>">

<label for="prenom">Prenom :</label>
<input type="text" name="prenom" id="" value="<?= $client["prenom_client"] ?>">

<label for="email">Email :</label>
<input type="email" name="email" id="" value="<?= $client["mail_client"] ?>">

<label for="adresse">Adresse :</label>
<input type="text" name="adresse" id="" value="<?= $client["adresse_client"] ?>">

<input type="submit" value="Modifier">
</form>

<?php } ?>