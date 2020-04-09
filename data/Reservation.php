<!DOCTYPE html>
<html lang="zxx">
<!--
 $date1 = new DateTime($row["End_d"]); 
                             $string = $date1->format(DATE_RFC2822);
-->
<?php
require_once"Connection.php";  
if(session_status()===PHP_SESSION_NONE) session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caciquat Hotel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
 
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/linearicons.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder --> 
<!--
     <div id="preloder">
        <div class="loader"></div>
    </div>  
-->
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="../index.php"><img src="../img/logo.png" alt=""></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <li><a href="../index.php">Home</a></li>
                                    <li><a href="../about-us.php">About</a></li>
                                    <li><a href="../rooms.php">Rooms</a></li>
                                    <li><a href="#">Facilities</a>
                                        <ul class="drop-menu">
                                            <li><a href="#">Junior Suit</a></li>
                                            <li><a href="#">Double Room</a></li>
                                            <li><a href="#">Senior Suit</a></li>
                                            <li><a href="#">Single Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../news.php">News</a></li>
                                    <li><a href="../contact.php">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="top-info">
                                <img src="../img/placeholder.png" alt="">
                                <span>1525 Boring Lane, Los Angeles, CA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->       
    <!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="../img/slider-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>We hope you’ll enjoy <br />your stay.</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-nav">
                                <a href="#" class="single-slider-nav">
                                    <img src="../img/nav-1.jpg" alt="">
                                    <div class="nav-text active">
                                        <p>Pool<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                                <a href="#" class="single-slider-nav">
                                    <img src="../img/nav-2.jpg" alt="">
                                    <div class="nav-text">
                                        <p>Sauna<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                                <a href="#" class="single-slider-nav last">
                                    <img src="../img/nav-3.jpg" alt="">
                                    <div class="nav-text">
                                        <p>Restaurant<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End -->
        <?php
       $start           = $_POST['start'];
       $end             = $_POST['end'];
       $adultN          = $_POST["adultN"];
       $childrenN       = $_POST["childrenN"];
       $roomN           = $_POST["roomsN"];
       $typeR           = $_POST["typeR"];  
       $dateTimeObject1 = new DateTime($start);
       $dateTimeObject2 = new DateTime($end);
       $start = strtotime($start); 
       // Creating new date format from that timestamp 
       $start = date("d-m-Y", $start);  
       $start = DateTime::createFromFormat('d-m-Y', $start)->format('Y-m-d');
       $end   = strtotime($end); 
        // Creating new date format from that timestamp 
       $end   = date("d-m-Y", $end);  
       $end   = DateTime::createFromFormat('d-m-Y', $end)->format('Y-m-d'); 
       //condition de validite des champs
       if(!empty($start)|| !empty($end)|| !empty($name)||!empty($roomN)||!empty($typeR)){ 
         // condition de validation des fields
         if(($adultN+$childrenN) <=0 || $roomN<=0){ 
            $_SESSION["error"]="You suppose to select the number of room, and the number of adult and/or children.";
            header('Location:../index.php');  
            exit(); 
       }elseif(!$typeR =="Double Room" || !$typeR=="Single Room" || !$typeR=="Special Room"){ 
            $_SESSION["error"]="You suppose to select the type of room.";
            header('Location:../index.php');  
            exit();
       }elseif(!($start || $end)){
        $_SESSION["error"]="Please inter a valid date.".$start." and ".$end;
        header('Location:../index.php');  
        exit();
       }else{
         ?> 
        <!-- for the reservation table -->
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
                     $result="SELECT  COUNT(*) AS TOTAL FROM rooms WHERE type='$typeR' AND adultN >=".$adultN."  AND childrenN >=".$childrenN." AND status='true' AND (End_d <='$start')";
                     $stmt = $pdo->query($result); 
                    if($row = $stmt->fetch()){  
                        if($row['TOTAL']==0){
                             $start  = new DateTime($start); 
                             $start  = $start->format(DATE_RFC2822);
                             $end    = new DateTime($end); 
                             $end    = $end->format(DATE_RFC2822);
                             $_SESSION["error"]= "The date you select $start to $end is not availlable, please contact us for more informations.";
                              header("Location: Choose.php");
                             exit();
                        }
                    }
                   //calculate the number of day during the date
                   $diff = abs(strtotime($end) - strtotime($start)); 
                   $years = floor($diff / (365*60*60*24));
                   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                   //end calculate the number of daye in the interval
                   
                   try{
                        $sql ="SELECT * FROM rooms WHERE type='$typeR' AND adultN >=".$adultN."  AND childrenN >=".$childrenN."  AND status='true' AND (End_d <='$start')";
                        $stmt          = $pdo->query($sql); 
                        while ($row    = $stmt->fetch()) {  
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
                                    <td><?php echo $row["price"] ."USD*$days day(s)"?></td>
                                    <td><?php echo $row["description"]?></td> 
                                    <td>
                                    <div role="group" class="btn-group">
                                        <?php
                                        $price = $row["price"]* $days;
                                        $_SESSION["id"]    = $row["id"];
                                        $_SESSION["price"] = $price;
                                        $_SESSION["start"] = $start;
                                        $_SESSION["end"]   = $end;
                                        ?>
                                        <button type="button" class="btn btn-secondary"><a  href="Choose.php">SELECT</a></button> 
                                    </div> 
                                    </td> 
                                </tr> 
                        <?php         
                        }  
                   }catch(PDOException $e){
                       echo "SQLError $e";
                   }
                   ?> 
         <?php 
       }      
       }else{
           $_SESSION["error"]= "You are missing some importants fields, please fill them.";
           header("Location: ../index.php");
           exit();
       } 
      ?> 
    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body> 
</html>