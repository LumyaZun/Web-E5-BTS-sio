<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>connexion proprietaire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyform">
	<div class="containerformconnexion">
		<div class ="formconnexion">
			<form method="post" action="traicoproprio.php">
				<h2>Connectez-vous en tant que proprietaire</h2><br>
				<input class="inputformconn" type="text" name="proprio_login" placeholder="login" required><br>
				<input class="inputformconn" type="password" name="proprio_mdp" placeholder="mot de passe" required><br>
				<input class="inputbuttonconn" type="submit" value="connexion" name="envoi">
			</form>
			<label class="textconn">Si, vous n'avez pas de compte, enregistrez-vous ici :</label><br>
			<button class="inputbuttonconn" onclick="window.location.href = 'inscriproprio.php'" >S'enregistrez</button>
			<br>
			<label class="textconn">Revenir à la page d'accueil :</label>
			<button class="inputbuttonconn" onclick="window.location.href = 'index.php'" >Accueil</button>
		</div>
	</div>
</body>
</html>