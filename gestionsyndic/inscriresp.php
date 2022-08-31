<?php 
	include('connexionbdd.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enregistrez responsable</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body  class="bodyform">
	<div class="containerformconnexion">
		<div class ="forminscri">
			<form method="post" action="trairesp.php">
				<h2>Enregistrez-vous en tant que responsable :</h2><br>
				<input class="inputformconn" type="text" name="resp_nom" placeholder="Nom"  required><br>
				<input class="inputformconn" type="text" name="resp_prenom" placeholder="Prenom"  required><br>
				<input class="inputformconn" type="text" name="resp_login" placeholder="Login"  required><br>
				<input class="inputformconn" type="password" name="resp_mdp" placeholder="Mot de passe"  required><br>
				<input class="inputbuttoninscri"type="submit" value="s'enregistrez">
			</form>
			<button class="inputbuttonconn" onclick="window.location.href = 'index.php'" >Accueil</button>
		</div>
	</div>
</body>
</html>