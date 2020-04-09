<?php
include'../Connection.php';
    session_start();
    $id      =  $_SESSION['id'];
     

if(!empty($_POST["sujet"])|| !empty($_POST["description"])||!empty($_POST["autor"])||!empty($_POST["categorie"])||!empty($_POST["file"])){
   
    $check = getimagesize($_FILES["file"]["tmp_name"]);
     $sujet=$_POST["title"];
     $autor=$_POST["autor"];
     $categorie=$_POST["categorie"];
     $message=$_POST["description"]; 
             if($check !==false){ 
                $imgContent = addslashes(file_get_contents($_FILES['file']['tmp_name'])); 
        try{
            // Create prepared statement
            $sql  = "UPDATE blog SET title='$sujet', body='$message', autor='$autor', date= now(), file='$imgContent', categorie='$categorie'  WHERE id='$id'";
            $stmt = $pdo->prepare($sql); 
            // Execute the prepared statement
            $stmt->execute();
            echo $stmt->rowCount() ." records UPDATED successfully";  
             header('location:../operation/admin.php');
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }   

        }else{
            echo "Select an image";
        }
 }else{
    echo "Have some empty field";
}
    
 
// Close connection
unset($pdo); 	 
?>