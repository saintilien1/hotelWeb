<?php
//delete.php
include("../Connection.php");
$id = $_GET['id']; //this needs to be sanitized  
if(!empty($id)){
    $count=$pdo->prepare("DELETE FROM gallery WHERE id=:id");
    $count->bindParam(":id",$id,PDO::PARAM_INT);
    $count->execute();
}
header("Location:../../blog/blog_admin/gallery/gallery.php");
?>