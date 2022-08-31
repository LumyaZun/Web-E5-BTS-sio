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
                error_reporting(E_ALL);
                session_start();
                include('db_conn.php');

                echo "<h2>Informations personnelles </h2>";
                echo "Connecté en tant que ".$_SESSION['proprietaire_login']." ".$_SESSION['proprietaire_id'];

                $sql= "CALL `slctinfoproprio`('".$_SESSION['proprietaire_login']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $infoproprio = $stmt->fetch();
                    $stmt->closeCursor();
                }else {
                    $infoproprio = [];
                }
                echo"<br><br> Nom : " .$infoproprio['proprietaire_nom'];
                echo"<br> Prènom : " .$infoproprio['proprietaire_prenom'];
                echo"<br> Numéro de téléphone : ".$infoproprio['proprietaire_tel'];
                echo"<br> Courriel : ".$infoproprio['proprietaire_mail'];
                echo"<br> Adresse : ".$infoproprio['copropriete_nom']." ".$infoproprio['copropriete_adresse'];

                echo"<br><br>";

                echo "<table class='tableauproprio' border='1'>
                        <th colspan='3'>
                            Tableau de charges de ".$infoproprio['proprietaire_nom']." ".$infoproprio['proprietaire_prenom'];
                        echo "</th>
                        <tr>
                            <th>Type</th>
                            <th>Charges</th>
                            <th>Montant</th>
                        </tr>";

                        $sql ="CALL selectcharges('".$_SESSION['proprietaire_login']."')";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                            $charges = $stmt->fetchAll();
                            $stmt->closeCursor();
                        }else {
                            $charges = [];
                        }
                        foreach($charges as $charge){
                            echo"<tr>";
                                echo"<td>".$charge['type_libelle'];
                                echo"</td>";
                                echo"<td>".$charge['charges_libelle'];
                                echo"</td>";
                                echo"<td>".$charge['charges_montant'];
                                echo"</td>";
                        }
                        echo"</tr></table>\n";
                        echo "<br>";

                        echo "<table class='tableauproprio' border='1'>
                        <th colspan='4'>
                            tableau d'appel de fond de ".$infoproprio['proprietaire_nom']." ".$infoproprio['proprietaire_prenom'];
                        echo "</th>
                        <tr>
                            <th>Nom d'appel de fond</th>
                            <th>Nature d'appel de fond</th>
                            <th>Date limite d'appel de fond</th>
                            <th>Montant</th>
                        </tr>";

                
                        $sql = 'CALL selectappelproprietaire(?);';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$_SESSION['proprietaire_id']]);
                        if($stmt->rowCount() > 0){
                            $appeldefonds = $stmt->fetchAll();
                            $stmt->closeCursor();
                        }else {
                            $appeldefonds = [];
                        }


                        foreach($appeldefonds as $appeldefond){
                            echo"<tr>";
                                echo"<td>".$appeldefond['appeldefond_libelle'];
                                echo"</td>";
                                echo"<td>".$appeldefond['appeldefond_nature'];
                                echo"</td>";
                                echo"<td>".$appeldefond['appeldefond_datelimite'];
                                echo"</td>";
                                echo"<td>".$appeldefond['appeldefond_prix'];
                                echo"</td>";
                        }
                        echo"</tr></table>\n";
                        echo "<br>";


                        echo "<table class='tableauproprio' border='1'>
                        <th colspan='3'>
                            tableau de compteur de ".$infoproprio['proprietaire_nom']." ".$infoproprio['proprietaire_prenom'];
                        echo "</th>
                        <tr>
                            <th>Consommation</th>
                            <th>compteur</th>
                            <th>date</th>
                        </tr>"; 

                        $sql = 'CALL selectreleveproprioid(?);';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$_SESSION['proprietaire_id']]);
                        if($stmt->rowCount() > 0){
                            $releves = $stmt->fetchAll();
                            $stmt->closeCursor();
                        }else {
                            $releves = [];
                        }


                        foreach($releves as $releve){
                            echo"<tr>";
                                echo"<td>".$releve['type_relevee'];
                                echo"</td>";
                                echo"<td>".$releve['valeur_relevee'];
                                echo"</td>";
                                echo"<td>".$releve['date_relevee'];
                                echo"</td>";
                        }
                        
                        
                        echo"</tr></table>\n";
                        echo "<br>";

                ?>

            <div> 
            <button class="inputbuttonappel" onclick="window.location.href = 'formrelevee.php'" >formulaire releve</button>

            </div>

            <div class="boutonappel">    
                <a class="boutondeconnexion" href="deconnexion.php"  action="deconnexion.php" method="post" name="deconnexion" type="submit" onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;" value="Deconnexion">Déconnexion</a></div>
            </div>
        </div>
    </div>
</body>
</html>