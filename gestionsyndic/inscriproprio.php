<?php 
include('db_conn.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enregistrez vous en tant que proprio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyform">
	<div class="containerformconnexion">
		<div class ="forminscri">
			<form method="post" action="traiproprio.php">
				<h2>Enregistrez-vous en donnant toutes les informations:</h2><br>
				<input class="inputformconn" type="text" name="proprio_nom" placeholder="Nom"  required><br>
				<input class="inputformconn" type="text" name="proprio_prenom" placeholder="Prenom"  required><br>
				<input class="inputformconn" type="text" name="proprio_login" placeholder="Login"  required><br>
				<input class="inputformconn" type="password" name="proprio_mdp" placeholder="Mot de passe"  required><br>
				<input class="inputformconn" type="text" name="proprio_tel" placeholder="numéro de téléphone"  required><br>
				<input class="inputformconn" type="email" name="proprio_mail" placeholder="Email" required><br>
				
				<label>De quel propriété faite vous parti ? :
					<?php 
					
					$sql = 'CALL `selectcopropriete`()';
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					if($stmt->rowCount() > 0){
						$coproprietes = $stmt->fetchAll();
						$stmt->closeCursor();
					}else {
						$coproprietes = [];
					}

					echo"<select class='inputformconn' id='cop_proprio_nom' name='cop_proprio_nom'> 
					<option></option>";
					foreach($coproprietes as $copropriete)
					{
						echo"<option>".$copropriete['copropriete_nom']."/".$copropriete['copropriete_adresse'];
						echo"</option>";
					}
					echo'</select>'; 
					?>
				</label><br>
				<input class="inputbuttoninscri" type="submit" value="s'enregistrez">
			</form>
			<button class="inputbuttonconn" onclick="window.location.href = 'index.php'" >Accueil</button>
		</div>
	</div>
</body>
</html>