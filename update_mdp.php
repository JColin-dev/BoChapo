<form action="script-php/update.php?id=<?= $_GET["id"]; ?>" method="post">

<label for="old_mdp">Saisissez votre ancien mot de passe :</label>
<input type="password" name="old_mdp" id="">

<label for="mdp">Saississez votre nouveau mot de passe:</label>
<input type="password" name="new_mdp" id="" >

<label for="mdp">Confirmez votre nouveau mot de passe:</label>
<input type="password" name="mdp_confirm" id="">

<input type="submit" value="Modifier">
</form>