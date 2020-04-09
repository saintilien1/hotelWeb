<!DOCTYPE html>
<html lang="zxx">
<?php 
require_once"data/Connection.php";  
require_once"header.php";
?>

<body>
   
<?php
      $start           = $_POST['start'];
      $end             = $_POST['end'];
      $adultN          = $_POST["adultN"];
      $childrenN       = $_POST["childrenN"];
      $roomN           = $_POST["roomsN"];
      $typeR           = $_POST["typeR"]; 
      $start = new DateTime($start);
      $end = new DateTime($end);
      $start = strtotime($start); 
         // Creating new date format from that timestamp 
       $start = date("d-m-Y", $start);  
       $start = DateTime::createFromFormat('d-m-Y', $start)->format('Y-m-d');
       $end = strtotime($end); 
          // Creating new date format from that timestamp 
       $end = date("d-m-Y", $end);  
       $end = DateTime::createFromFormat('d-m-Y', $end)->format('Y-m-d');
   if(!empty($start)|| !empty($end)||!empty($name)||!empty($room)){ 
       if(($adultN+$childrenN) <=0 || $roomN<=0){ 
            $_SESSION["error"]="You suppose to select the number of room, and the number of adult and/or children.";
            header('Location:../index.php');  
            exit(); 
       }elseif(!$typeR =="Double Room" || !$typeR=="Single Room" || !$typeR=="Special Room"){ 
            $_SESSION["error"]="You suppose to select the type of room.  ";
            header('Location:../index.php');  
            exit();
       }elseif(!($start && $end)){ 
            $_SESSION["error"]="Please insert a valid date, one of them is not valid ".$end." , ".$start;
            header('Location:../index.php');  
            exit(); 
           
       }else{
            ?>
     

<div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">Name Rooms</th>
		      <th scope="col">Image</th>
		      <th scope="col">Capacity</th>
		      <th scope="col">Type</th>
                <th scope="col">Price</th>
		      <th scope="col">Description</th> 
                <th scope="col">Choose</th>
		    </tr>
		  </thead> 
		  <tbody>
            <?php
            $count  ="";
            try{
               $sql = "SELECT * FROM rooms WHERE  adultN >=".$adultN."  AND childrenN >=".$childrenN." AND  status ='true' ";
               $stmt = $pdo->query($sql); 
               if($stmt->fetchColumn() > 0){
                   echo "<br><br><br><br><br><br><br><br><br><br><br>Have one<br>";
               }else{
                 $_SESSION["error"]="I'm sorry your date is not availlable, please select an another or contact us";
                 header("Location: index.php");
                 exit();
               }


                while($row      = $stmt->fetch()) {  
                  $start1  = new DateTime($row["end"]);
                  if($start1<=$start){
                    echo "<br><br><br><br><br><br><br><br><br><br><br>Have one<br>";
                  }
                   ?>       
            
		    <tr>
             
		      <th scope="row"><?php echo $row["name"]?></th>
		      <td class="w-25">
                <?php  
                 echo '<img width=945px heigth=720px class="content-image img-thumbnail img-fluid d-block mx-auto" src="data:image/jpeg;base64,'.base64_encode(stripslashes($row["file"])).'"/>';
                   ?>
			     
		      </td>  
		      <td><?php echo $row["capacity"]?></td>
                <td><?php echo $row["type"]?></td>
                <td><?php echo $row["price"] ."USD"?></td>
                <td><?php echo $row["description"]?></td> 
                <td>
                <div role="group" class="btn-group"> 
                    <button class="btn btn-success"  type="button"><a href="choose.php">Choose</a></button>
                </div>
                
                </td> 
		    </tr>
              <?php
                } 
            }catch(PDOException $e){ 
               
            }
            ?> 
		  </tbody>
           


		</table>   
    </div>
  </div>
</div>

<?php

             
         }
         
                    
     }
        
     unset($pdo);   
   ?> 
   <?php 
      include'footer.php';
     ?>
    <!-- /Footer Room pic End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
