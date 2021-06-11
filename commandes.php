<?php 

$requete = $connexion->prepare('SELECT statut_commande, date_commande, numero_commande FROM commande ')