<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>connexion responsable du syndic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyform">
	<div class="containerformconnexion">
		<div class ="formconnexion">
			<form method="post" action="traicoresp.php" >
				<h2>Connectez-vous en tant que responsable du syndic</h2><br>
				<input class="inputformconn" type="text" name="resp_login" placeholder="login" required><br>
				<input class="inputformconn" type="password" name="resp_mdp" placeholder="mot de passe" required><br>
				<input class="inputbuttonconn" type="submit" value="connexion">
			</form>
			<label class="textconn">Si, vous n'avez pas de compte, enregistrez-vous ici :</label><br>
			<button class="inputbuttonconn" onclick="window.location.href = 'inscriresp.php'" >S'enregistrez</button>
			<br>
			<label class="textconn">Revenir à la page d'accueil :</label>
			<button class="inputbuttonconn" onclick="window.location.href = 'index.php'" >Accueil</button>
		</div>
	</div>
</body>
</html>