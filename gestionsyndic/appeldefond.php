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
            include('db_conn.php');
            echo "Responsable de copropriete : ". $_SESSION['responsable_login'];

            echo "<br><br>";

            $sql = 'CALL selectappel();';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $appeldefonds = $stmt->fetchAll();
                $stmt->closeCursor();
            }else {
                $appeldefonds = [];
            }

            echo "<table border ='1' class='tableauappel'>
                    <th colspan ='6'>Recap d'appel de fond</th>
                    <tr>
                        <td>Nom d'appel de fond</td>
                        <td>Nature d'appel de fond</td>
                        <td>Date limite</td>
                        <td>Nom de la copropriete</td>
                        <td>Proprietaire</td>
                        <td>Montant</td>
                    </tr>";
                foreach($appeldefonds as $appeldefond)  {

                    echo"<tr>";
                        echo "<td>".$appeldefond['appeldefond_libelle'];
                        echo"</td>";
                        echo "<td>".$appeldefond['appeldefond_nature'];
                        echo"</td>";
                        echo "<td>".$appeldefond['appeldefond_datelimite'];
                        echo"</td>";
                        echo "<td>".$appeldefond['copropriete_nom'];
                        echo"</td>";
                        echo "<td>".$appeldefond['proprietaire_prenom']." ".$appeldefond['proprietaire_nom'];
                        echo"</td>";
                        echo "<td>".$appeldefond['appeldefond_prix'];
                        echo"</td>";
                    
                }
                echo"</tr></table>\n";    
                    
                    echo "<br>";
            ?>
            <button class="inputbuttonconn" onclick="window.location.href = 'formappeldefond.php'" >lancez un nouvel appel de fond</button><br><br>
            <div class="boutonappel">
                <a class="boutondeconnexion" href="deconnexion.php"  action="deconnexion.php" method="post" name="deconnexion" type="submit" onclick="if(!confirm('Voulez-vous vraiment vous déconnecter ?')) return false;" value="Deconnexion">Déconnexion</a>
            </div>
        </div>
    </div>
</body>
</html>