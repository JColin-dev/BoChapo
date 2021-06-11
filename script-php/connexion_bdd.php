<?php 

    $connexion = new PDO('mysql:host=localhost:3306;dbname=bochapo', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ?>
