<?php require("script-php/connexion_bdd.php");

$requete = $connexion->prepare("SELECT * FROM client");
$requete->execute(array());
$client=$requete->fetch();

?>

<table class="table">
  <thead>

    <tr>
      <th scope="col">Nom </th>
      <th scope="col">Prénom</th>
      <th scope="col">Mail</th>
      <th scope="col">Adresse</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $client["nom_client"]; ?></td>
      <td><?= $client["prenom_client"]; ?></td>
      <td><?= $client["mail_client"]; ?></td>
      <td><?= $client["adresse_client"]; ?></td>
    </tr>

  </tbody>
</table>

<button type="button" class="btn btn-primary"><a href="index.php?page=update_infos&id=<?= $client["id_client"]; ?>">Modifier les informations</button>
<button type="button" class="btn btn-dark"><a href="index.php?page=update_mdp&id=<?= $client["id_client"]; ?>">Modifier le mot de passe</button>
<button type="button" class="btn btn-primary"><a href="index.php?page=commande&id=<?= $_SESSION["id_client"]; ?>">Consulter mes commandes</button>