<?php
include"../Connection.php";

if(!empty($_POST["title"])|| !empty($_POST["description"])||!empty($_POST["autor"])||!empty($_POST["file"])||!empty($_POST["categorie"])){
    // Attempt insert query execution
     $check = getimagesize($_FILES["file"]["tmp_name"]);
     $sujet=$_POST["title"];
     $autor=$_POST["autor"];
     $categorie=$_POST["categorie"];
     $message=$_POST["description"];
   
   
    if($check !==false){ 
        $imgContent = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        try{
            // Create prepared statement
            $sql  ="INSERT INTO blog(title, body, autor, date ,file, categorie) VALUES (:title, :body,:autor, now() ,:file, :categorie)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters to statement
            $stmt->bindParam(':title', $sujet);
            $stmt->bindParam(':body', $message);
            $stmt->bindParam(':autor', $autor); 
            $stmt->bindParam(':file', $imgContent); 
            $stmt->bindParam(':categorie', $categorie); 
            
            // Execute the prepared statement
            $stmt->execute();
             header('location:admin.php');
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }   

    }else{
        echo "error to uplaod the image, contact your web administrator";
    }
  
}else{
    echo "Have some empty field";
}

// Close connection
unset($pdo);
