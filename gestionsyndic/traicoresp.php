<?php 
session_start();
if(isset($_POST['resp_login']) && isset($_POST['resp_mdp'])){
      
   include('db_conn.php');

   $resp_login = $_POST['resp_login'];
   $resp_mdp = $_POST['resp_mdp'];

   $sql = 'CALL selectcoresponsable(?,?)';
   $stmt = $conn->prepare($sql);
   $stmt->execute([$resp_login, $resp_mdp]);

   if($stmt->rowCount() == 1){
      $user = $stmt->fetch(); 
      $stmt->closeCursor();

         if($user['responsable_login'] == $resp_login){

            if($user['responsable_mdp'] == $resp_mdp){

               $_SESSION['responsable_id'] = $user['responsable_id'];
               $_SESSION['responsable_login'] = $user['responsable_login'];
               $_SESSION['responsable_mdp'] = $user['responsable_mdp'];
               
               
               header('Location: appeldefond.php');
            }
            else{
               header('Location: coresp.php?erreur=2');
            }
         }
         else{
            header('Location: coresp.php?erreur=$user');
         }

      }
      else{
         header('Location: coresp.php?erreur=1');
      }
}
else{
  header('Location: coresp.php');
}
?> 