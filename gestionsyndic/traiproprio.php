<?php 
include('db_conn.php');
echo "<br>nom : ".$_POST['proprio_nom'];
echo "<br>prenom:".$_POST['proprio_prenom'];
echo "<br>login:".$_POST['proprio_login'];
echo "<br>mdp:".$_POST['proprio_mdp'];
echo "<br>tel:".$_POST['proprio_tel'];
echo "<br>mail".$_POST['proprio_mail'];
echo "<br>copropriete:".$_POST['cop_proprio_nom'];

$cop_proprio_nom = $_POST['cop_proprio_nom'];
$nom_cop = explode("/",$cop_proprio_nom);

echo "<br> Nom coproprietaire : ".$nom_cop[0];
echo "<br> Adresse coproprietaire : ".$nom_cop[1];

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

$sql = "CALL `insertproprio`('".$_POST['proprio_nom']."','".$_POST['proprio_prenom']."','".$_POST['proprio_login']."','".$_POST['proprio_mdp']."','".$_POST['proprio_tel']."','".$_POST['proprio_mail']."','".$coproprietes['copropriete_id']."')";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location: coproprio.php");
$conn->close();

?>