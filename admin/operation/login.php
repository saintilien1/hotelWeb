<?php 
session_start();
include("../Connection.php");
?>
<?php
$msg = ""; 
 
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $role     = "admin";
  if($username != "" && $password != "") {
    try {
      $query= "SELECT * FROM user_tb WHERE email=:username AND password=:password AND role=:role";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->bindValue('role', $role, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['id'];
        $_SESSION['sess_user_name'] = $row['prenom'];
        $_SESSION['sess_name']      = $row['nom'];
          
        header('location:admin.php');
       
      } else {
         // $msg = "Invalid username and password!";
          $_SESSION["msg"] = "Invalid username and password!";
           header('location:../index.php');
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
   echo $msg = "Both fields are required!";
    $_SESSION["msg"] = $msg;
   // header('location:../index.php');
      
  }
 
?>