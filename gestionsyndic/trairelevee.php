<?php 

session_start();
include('db_conn.php');
echo $_SESSION['proprietaire_id'];

echo "<br>".$_POST['relevee'];
echo "<br>".$_POST['date'];
echo "<br>".$_POST['valeur'];


$sql="call insertreleve('".$_POST['relevee']."','".$_POST['date']."','".$_POST['valeur']."','".$_SESSION['proprietaire_id']."')";
$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: donneeproprietaire.php');
$conn->close();
?>