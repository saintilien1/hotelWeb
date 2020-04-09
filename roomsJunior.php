<?php 
include"data/Connection.php"; 
?> 
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
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> 
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/linearicons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="index.php" style="color:#fff;">
                    <h4 style="color:#fff;">CACIQUAT</h4>
                    </a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about-us.php">About</a></li>
                                    <li><a href="rooms.php">Rooms</a></li>
                                    <li><a href="#">Facilities</a>
                                        <ul class="drop-menu">
                                            <li><a href="roomsJunior.php?value=1">Junior Suit</a></li>
                                            <li><a href="roomsJunior.php?value=2">Double Room</a></li>
                                            <li><a href="roomsJunior.php?value=3">Senior Suit</a></li>
                                            <li><a href="roomsJunior.php?value=4">Single Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="news.php">News</a></li>
                                    <li><a href="contact.php">Contact</a></li> 
                                </ul>
                            </nav>
 
                            <div class="top-info">
<!--                                <img src="img/placeholder.png" alt="">-->
                                <span>Aliance informatique de Port-de-Paix</span>
                            </div>
 
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/rooms-bg.jpg">
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
            <?php //  $type = "Junior Suit";  $type = "Double Room";   $type ="Single Room";   $type = "Senior Suit";  
            $type=""; 
              
            switch($_GET["value"]){
                case 1:
                    $type = "Junior Suit";
                break;
                case 2:
                    $type = "Double Room"; 
                break;
                case 3:
                    $type ="Single Room"; 
                break;
                case 4:
                    $type = "Senior Suit"; 
                break;
            } 
                   try{
                        $sql ="SELECT * FROM rooms WHERE type='$type'";
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
                                <?php echo $row["description"]?>
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
     ?>
    <!-- Footer Section End -->

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