<?php 
session_start();
if(isset($_POST['proprio_login']) && isset($_POST['proprio_mdp'])){

   include('db_conn.php');

   $proprio_login = $_POST['proprio_login']; 
   $proprio_mdp = $_POST['proprio_mdp'];

   $sql = 'CALL selectcoproprietaire(?,?)';
   $stmt = $conn->prepare($sql);
   $stmt->execute([$proprio_login, $proprio_mdp]);

   if($stmt->rowCount() == 1){
      $user = $stmt->fetch();
      $stmt->closeCursor();

      if($user['proprietaire_login'] == $proprio_login){

         if($user['proprietaire_mdp'] == $proprio_mdp){
            
            $_SESSION['proprietaire_id'] = $user['proprietaire_id'];
            $_SESSION['proprietaire_login'] = $user['proprietaire_login'];
            $_SESSION['proprietaire_mdp'] = $user['proprietaire_mdp'];

            header('Location: donneeproprietaire.php');
         }else {
            header('Location: coproprio.php?erreur=2'); // utilisateur ou mot de passe incorrect
          }
       } else {
         header('Location: coproprio.php?erreur=$user'); // utilisateur ou mot de passe incorrect
       }
    } else {
      header('Location: coproprio.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
}
else
{
   header('Location: coproprio.php');
}

?>