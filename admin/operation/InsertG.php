<?php
include"Connection.php";



if(!empty($_POST["description"])|| !empty($_POST["file"])){
    
    $check = getimagesize($_FILES["file"]["tmp_name"]);
     
    if($check !==false){ 
        $imgContent = addslashes(file_get_contents($_FILES['file']['tmp_name']));
         
         // Attempt insert query execution
        try{
            // Create prepared statement
            $sql  = "INSERT INTO gallery(description,file) VALUES (:description,:file)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters to statement
            $stmt->bindParam(':description', $_REQUEST['description']); 
            $stmt->bindParam(':file', $imgContent); 
            // Execute the prepared statement
            $stmt->execute();
 

            echo '<script>alert("Image gallery save.")</script>';
            header("Location:../blog/blog_admin/gallery/gallery.php");
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }   
    }else{
         echo "File is not an image - " . $check["mime"] . ".";
        $uploadOk = 0;
    } 
}else{
    echo "Have some empty field";
}

// Close connection
unset($pdo);
