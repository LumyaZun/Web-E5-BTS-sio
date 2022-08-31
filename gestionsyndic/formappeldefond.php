<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Appel de fond</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css">    
</head>
<body class="bodyappel">
    <div class="containerappel">
        <div class ="formconnexion">
            <?php 
            session_start();
            echo "<h2>Appel de fond</h2>";
            include('db_conn.php');
            echo "<br>".$_SESSION['resp_login'];
            echo "<form method='post' action='traiappeldefond.php'> ";

                    $sql = 'CALL `selectlistederoulantform`()';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        $coproprietes = $stmt->fetchAll();
                        $stmt->closeCursor();
                    }else {
                        $coproprietes = [];
                    }
                    echo"<br> Copropriete : <select class='selectappeldefond' id='cop_proprio_nom' name='cop_proprio_nom'> 
                    <option></option>";
                    foreach ($coproprietes as $copropriete){
                        echo "<option>".$copropriete['copropriete_nom']."/".$copropriete['copropriete_adresse']."</option>";
                    }
                    echo'</select>'; 

                    $sql = 'CALL selectproprio();';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        $coproprietaires = $stmt->fetchAll();
                        $stmt->closeCursor();
                    }else {
                        $coproprietaires = [];
                    }
                    echo"<br> Proprietaire : <select class='selectappeldefond' id='proprio_nom' name='proprio_nom'> 
                    <option></option>";
                    foreach ($coproprietaires as $coproprietaire){
                        echo "<option>".$coproprietaire['proprietaire_nom']." ".$coproprietaire['proprietaire_prenom']."</option>";
                    }
                    echo'</select>'; 

                    echo "<h3>Details charges</h3>";

                    echo "<input class='inputformappel' type='text' name='appelfondcharges_libelle' placeholder='Libelle charges' required>";
                    echo " <input class='inputformappel' type='text' name='appelfondcharges_nature' placeholder='Nature charges' required>";
                    echo " <input class='inputformappel' type='text' name='appelfondcharges_montant' placeholder='Montant' required>";
                    echo " <input class='inputformappel' type='date' name='appelfondcharges_date' required>";
                    echo "<br><br> <input class='inputbuttonconn' type='submit' value='Envoyer'>";
                echo "</form>";
            ?>
            <div class="boutonappel">
                <button class="inputbuttonappel" onclick="window.location.href = 'appeldefond.php'" >Revenir à la page d'appel de fond</button>
                <a class="boutondeconnexion" href="deconnexion.php"  action="deconnexion.php" method="post" name="deconnexion" type="submit" onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;" value="Deconnexion">Déconnexion</a>
            </div>
        </div>
    </div>
</body>
</html>