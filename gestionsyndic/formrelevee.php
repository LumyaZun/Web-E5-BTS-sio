<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body class="bodyform">
	<div class="containerformconnexion">
		<div class ="formconnexion">

        <?php 
        session_start();
        include('db_conn.php');
        ?>
			<form method="post" action="trairelevee.php">
				<h2>Ajoutez un relevé de compteur</h2>
				<input class="radio" id="eau" type="radio" name="relevee" value="Eau" required>
                <label for="eau">Eau</label><br>
				<input class="radio" id="gaz" type="radio" name="relevee" value="Gaz"required>
                <label for="gaz">Gaz</label><br>
				<input class="radio" id="electricite" type="radio" name="relevee" value="Electricité" required>
                <label for="electricite">Electricité</label><br>

                <label>Date relevee : </label><input type="date" name="date" required><br>
                <label>Valeur :</label><input type="text" name="valeur" required><br>
                <input class='inputbuttonconn' type='submit' value='Envoyer'>
			</form>

		</div>
	</div>
</div>
</body>
</html>