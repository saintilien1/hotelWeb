<?php
include"../Connection.php";
session_start();


if(!empty($_POST["description"])|| !empty($_POST["name"])|| !empty($_POST["typeR"])|| !empty($_POST["capacity"])|| !empty($_POST["file"])){
    $description     = $_POST["description"]; 
    $name            = $_POST["name"];
    $type            = $_POST["typeR"];
    $capacity        = $_POST["capacity"]; 
    $status          = "false";
    
    $check = getimagesize($_FILES["file"]["tmp_name"]);
     
    if($check !==false){ 
        $imgContent = addslashes(file_get_contents($_FILES['file']['tmp_name']));
         
         // Attempt insert query execution
        try{
             
            // Create prepared statement
            $sql  = "INSERT INTO rooms(name, capacity, status, type, description, file) VALUES (:name, :capacity, :status, :type, :description, :file)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters to statement
            $stmt->bindParam(':name', $name); 
            $stmt->bindParam(':capacity', $capacity); 
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':type', $type); 
            $stmt->bindParam(':description', $description); 
            $stmt->bindParam(':file',  $imgContent);  
            // Execute the prepared statement
            $stmt->execute(); 
            $_SESSION["msg"]= "New room added";
            header('location:../rooms/Rooms.php');
            exit();
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }   
    }else{
         echo "File is not an image - " . $check["mime"] . ".";
        $uploadOk = 0;
    }
   
    
}else{
    $_SESSION["msg"]= "Please fill all the fields.";
    header('location:../rooms/AddRooms.php');
    exit();
}

// Close connection
unset($pdo);
