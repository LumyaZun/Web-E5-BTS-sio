<?php 
session_start();
include('db_conn.php');

echo "Copropriete : ".$_POST['cop_proprio_nom'];
echo "<br> Proprietaire : ".$_POST['proprio_nom'];
echo "<br> Libelle charges : ".$_POST['appelfondcharges_libelle'];
echo "<br> Nature charges : ".$_POST['appelfondcharges_nature'];
echo "<br> Montant charges : ".$_POST['appelfondcharges_montant'];
echo "<br> Date charges : ".$_POST['appelfondcharges_date'];

$copropriete = $_POST['cop_proprio_nom'];
$nom_cop = explode("/",$copropriete);

echo "<br> Nom coproprietaire : ".$nom_cop[0];
echo "<br> Adresse coproprietaire : ".$nom_cop[1];

$proprietaire = $_POST['proprio_nom'];
$nom_proprio = explode(" ",$proprietaire);

echo "<br> Nom proprietaire : ".$nom_proprio[0];
echo "<br> Prenom proprietaire : ".$nom_proprio[1];

    $sql = 'CALL selectidcopropriete (?)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom_cop[0]]);
    if($stmt->rowCount() > 0){
        $coproprietes = $stmt->fetch();
        $stmt->closeCursor();
    }else {
        $coproprietes = [];
    }

    echo "<br> Id de copropriete : ".$coproprietes['copropriete_id'];


    $sql = 'CALL selectidproprietaire (?)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom_proprio[0]]);
    if($stmt->rowCount() > 0){
        $proprietaires = $stmt->fetch();
        $stmt->closeCursor();
    }else {
        $proprietaires = [];
    }

    echo "<br> Id de proprietaire : ".$proprietaires['proprietaire_id'];

    
    $sql = 'CALL selectidresponsable ("'.$_SESSION['responsable_login'].'")';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $responsableid = $stmt->fetch();
        $stmt->closeCursor();
    }else {
        $responsableid = [];
    }

    echo "<br> Id du responsable : ".$responsableid['responsable_id'];

    $sql = "CALL insertappeldefond('".$_POST['appelfondcharges_libelle']."','".$_POST['appelfondcharges_montant']."','".$_POST['appelfondcharges_nature']."','".$_POST['appelfondcharges_date']."','".$coproprietes['copropriete_id']."','".$responsableid['responsable_id']."','".$proprietaires['proprietaire_id']."')";   
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header('Location: appeldefond.php'); 
    $conn->close();

?>