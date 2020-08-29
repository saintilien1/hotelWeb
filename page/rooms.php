<!DOCTYPE html>
<html lang="zxx"> 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CACIQUAT Convention center</title> 
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
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
    <style>
         table, th, td { 
             margin-left: 270px;
         } 
      </style>
</head>  
<body>
<?php
include'header.php';
include"../data/Connection.php";
?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="../img/rooms-bg.jpg">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Rooms</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="services.php" class="left-nav"><i class="lnr lnr-arrow-left"></i> Services</a>
                    <a href="news.php" class="right-nav">News <i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            <?php
                   try{
                        $sql ="SELECT * FROM rooms WHERE status='true'";
                        $stmt          = $pdo->query($sql); 
                        while ($row    = $stmt->fetch()) {  
            ?>    
            
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
<!--                                <img src="img/img/footer/img10.jpg" alt="">-->
                                <?php  
                                    echo '<img width=945px heigth=720px class="content-image img-thumbnail img-fluid d-block mx-auto" src="data:image/jpeg;base64,'.base64_encode(stripslashes($row["file"])).'"/>';
                                    ?> 
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2><?php echo $row["type"]?></h2>
                                <div class="room-price">
                                    <span>From</span>
                                    <h2>$<?php echo $row["price"]?></h2>
                                    <sub>/night</sub>
                                </div>
                            </div>
                            <div class="room-desc">
                                <?php
                                
                                 $description = $row["description"]; 
                                        if(strlen( $description)>100 ){
                                            $description = substr_replace( $description, "  ...  ", 100);
                                         }else{
                                            $description= $row["description"];
                                         }  
                                       echo $description;
                                
                                ?>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>Smart TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <span>High Wi-fii</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>
                                <div class="room-info last">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <span>Pool</span>
                                </div>
                            </div>
                            <a href="index.php" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div> 
             <?php         
                        }  
                   }catch(PDOException $e){
                       echo "SQLError $e";
                   }
                   ?> 
         <?php 
        
      ?>  
            
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
     <?php
      include'footer.php';
     include_once'scripte.php';
     ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->  
</body>

</html>