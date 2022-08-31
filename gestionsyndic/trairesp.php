<?php 
include('db_conn.php');
echo "<br>nom : ".$_POST['resp_nom'];
echo "<br>prenom:".$_POST['resp_prenom'];
echo "<br>login:".$_POST['resp_login'];
echo "<br>mdp:".$_POST['resp_mdp'];


$sql = "CALL `insertresp`('".$_POST['resp_nom']."','".$_POST['resp_prenom']."','".$_POST['resp_login']."','".$_POST['resp_mdp']."')";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location: coresp.php");
$conn->close();

?>