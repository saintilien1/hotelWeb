<?php
//delete.php
include("../Connection.php");
$id = $_GET['id']; //this needs to be sanitized 

if(!empty($id)){
    $count=$pdo->prepare("DELETE FROM blog WHERE id=:id");
    $count->bindParam(":id",$id,PDO::PARAM_INT);
    $count->execute();
}
header("Location:../operation/admin.php");
?>