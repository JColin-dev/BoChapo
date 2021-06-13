<?php 

require("script-php/connexion_bdd.php");

$requete = $connexion->prepare('SELECT statut_commande, date_commande, id_commande FROM commande WHERE id_client=? ');
$requete->execute(array($_SESSION["id_client"]));

?>


<table>
    <thead>
        <tr>
            <th>Mes commandes</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        
    <tbody>

<?php
while($commande=$requete->fetch()) {
    ?>

    <tr class="commande">
        <td><?= $commande["id_commande"]; ?></td>
        <td><?= $commande["statut_commande"]; ?></td>
        <td><?= $commande["date_commande"]; ?></td>
    </tr>

<?php } ?>

    </tbody>

</table>
<?php



