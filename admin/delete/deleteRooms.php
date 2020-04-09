<?php
//delete.php
include("../Connection.php");
$id = $_GET['id']; //this needs to be sanitized 

if(!empty($id)){
    $count=$pdo->prepare("DELETE FROM rooms WHERE id=:id");
    $count->bindParam(":id",$id,PDO::PARAM_INT);
    $count->execute(); 
    $_SESSION["msg"]="Rooms deleted succesfully.";
    header("Location:../rooms/Rooms.php");
    exit();
}else{
    $_SESSION["error"]="Rooms is not deleted.";
    header("Location:../rooms/Rooms.php");
    exit();
}

?>