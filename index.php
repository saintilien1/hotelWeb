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
    <style>
         table, th, td { 
             margin-left: 270px;
         } 
      </style>
</head>  
<body> 
<?php 
   include_once("data/Connection.php");
    if(session_status()===PHP_SESSION_NONE) session_start();  
    include_once'page/headerIndex.php';
?>    
    <!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="img/slider-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>We hope you’ll enjoy <br />your stay.</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-nav">
                                <a href="#" class="single-slider-nav"  >
                                    <img src="img/img/img17.jpg"  height="195px" width="170px"  alt="">
                                    <div class="nav-text active">
                                        <p>Reception<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a> 
                                <a href="#" class="single-slider-nav">
                                    <img src="img/img/img2.jpg" height="195px" width="170px" alt="">
                                    <div class="nav-text">
                                        <p>Hotel<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a> 
                                <a href="#" class="single-slider-nav last">
                                    <img src="img/img/img23.jpg" height="195px" width="170px"  alt="Restaurant">
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
    <!-- Room Availability Section Begin -->
    <section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="img/img/footer/img10.jpg"  height="338px" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="img/img/footer/img11.jpg"  height="338px"   alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="img/img/footer/img12.jpg"  height="338px"  alt="">
                                </div>
                            </div>
                            <div class="room-text"><br><br>
                                <div class="room-title">
                                    <h2>Junior Suite</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>25.00 USD</h2>
                                    </div>
                                </div><br>
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
                                        <br> 
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="check-form">
                            <h2>Check Availability</h2>  
                                <?php 
                                 if(isset($_SESSION['msg'])){ 
                                     echo '<div class="text-center bg-success"><b>'.$_SESSION['msg'].'</b></div>';
                                     
                                   }elseif(isset($_SESSION['error'])){
                                    echo '<div class="text-enter bg-danger"><b>'.$_SESSION['error'].'</b></div>'; 
                                    session_destroy();
                                 }else{
                                     session_destroy();
                                 }   
                                ?>
                            <form action="data/Reservation.php" method="POST" >
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>From</p>
                                        <input type="text" name="start" class="datepicker-1" placeholder="dd / mm / yyyy"  >
                                        <img src="img/calendar.png" alt="">
                                    </div>
                                    <div class="date-select to">
                                        <p>To</p>
                                        <input type="text" name="end" class="datepicker-2"  placeholder="dd / mm / yyyy">
                                        <img src="img/calendar.png" alt="">
                                    </div>
                                </div>
                                <div class="room-quantity">
                                    <div class="single-quantity" width=20px>
                                        <p>Adults</p>
                                        <div class="pro-qty">
                                            <input type="text" name="adultN" value="0">
                                        </div>
                                    </div>
                                    <div class="single-quantity" width=20px>
                                        <p>Children</p>
                                        <div class="pro-qty">
                                            <input type="text" name="childrenN" value="0">
                                        </div>
                                    </div>
                                    <div class="single-quantity last">
                                        <p>Rooms</p>
                                        <div class="pro-qty">
                                            <input type="text" name="roomsN" value="0">
                                        </div>
                                    </div> 
                                </div>
                                  <div class="room-selector">
                                    <p>Room</p>
                                    <select name="typeR" class="suit-select">
                                        <option>Eg. Master suite</option>
                                        <option value="Double Room">Double Room</option>
                                        <option value="Single Room">Single Room</option>
                                        <option value="Special Room">Special Room</option>
                                    </select>
                                </div>  
                                <button type="submit">CHECK Availability <i class="lnr lnr-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-room">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2>
                            “Customers may forget what you said  but they will never forget how you made themfeel”.  
                        </h2> 
                    </div>  
                </div> 
                <div class="about-para"> 
                    <div class="row"> 
                    <div class="col-lg-6">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                orci. Suspendisse maximus malesuada</p>
                        </div>
                        <div class="col-lg-6">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at vulputate est.
                                Donec tempor felis at nibh eleifend malesuada. Nullam suscipit lobortis aliquam.
                                Phasellus lobortis ante lorem, vitae scelerisque lacus tempus sed. Phasellus rutrum
                                magna </p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Availability Section End --> 
    <!-- Facilities Section Begin -->
    <div class="facilities-section spad">
        <div class="container">
            <div class="facilities-content">
                <div class="row"><?php                                      
                             try{   
                                    $stmt = $pdo->query("SELECT * FROM blog ORDER BY id DESC LIMIT 1 ");  
                                      while ($row      = $stmt->fetch()) {  
                                  ?>
                                      <div class="col-lg-6 p-0">
                                            <div class="facilities-img set-bg" data-setbg="">
                                                 <img src="img/img/alliance.jpg" height="570px"  />
                                               <!-- <?php echo '<img width="1000px"   src="data:image/jpg;base64,'.base64_encode(stripslashes($row["file"])).'"/>';?>   -->
                                           </div>
                                      </div>
                                      <div class="col-lg-6 p-0 ">
                                            <div class="facilities-text-warp">
                                                     <div class="facilities-text">
                                                        <h4 style="margin-top=400px"><?php  echo $row["title"]  ?></h4> 
                                                        <?php  
                                                        if(strlen($row["body"])>100 ){
                                                            $row["body"]= substr_replace($row["body"], "..."  , 300);
                                                        }else{
                                                            $row["body"]= $row["title"];
                                                        }
                                                                echo $row["body"]; 
                                                        ?>  
                                                            <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                                                    </div>
                                              </div>
                                       </div> 
                                   <?php
                                   }
                                 }catch(PDOException $e){
                                       die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                    }
                                  // Close connection         
                                 ?>  
                                 <?php                        
                                    try{                 
                                       $stmt = $pdo->query("SELECT * FROM blog ORDER BY id DESC LIMIT 1 ");  
                                           while ($row      = $stmt->fetch()) {  
                                     ?>   
                                       <div class="col-lg-6 p-0 order-lg-1 order-2">
                                            <div class="facilities-text-warp">
                                                  <div class="facilities-text">
                                                  <h4><?php  echo $row["title"]   ?></h4>
                                      <?php  
                                           if(strlen($row["body"])>100 ){
                                             $row["body"]= substr_replace($row["body"], "..."  , 250);
                                          }else{
                                               $row["body"]= $row["title"];
                                                }
                                           echo $row["body"]; 
                                      ?>  
                                              <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="col-lg-6 p-0 order-lg-2 order-1">
                                            <div class="facilities-img set-bg" data-setbg="">
                                                <img src="img/img/formationG.jpg" height="570px"  />  
                                                <!-- <?php echo '<img width="1000px"   src="data:image/jpg;base64,'.base64_encode(stripslashes($row["file"])).'"/>';?> -->
                                            </div> 
                                       </div>          
                                        <?php
                                       }
                                       }catch(PDOException $e){
                                           die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                     }
                                                        // Close connection         
                                    ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Section End --> 
    <div class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1>Guestbook</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-item">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="testimonial-1" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2020</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It</h4>
                                    <p>C'est un lieu calme et tranquil, là où n'importe qui peut fréquenter.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial-2" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2012</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It2</h4>
                                    <p>Le leader des hôtels à port de paix.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="testimonial-3" role="tabpanel">
                                <div class="single-testimonial-item">
                                    <span class="test-date">02/02/2012</span>
                                    <div class="test-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4>Loved It3</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris,
                                        bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna
                                        fermentum ornare.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-author-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#testimonial-1" role="tab" class="show active">
                                    <div class="author-pic">
                                        <img src="img/testimonial/author-1.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                        <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#testimonial-2" role="tab">
                                    <div class="author-pic">
                                        <img src="img/testimonial/author-2.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                        <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#testimonial-3" role="tab">
                                    <div class="author-pic">
                                      <img src="img/testimonial/author-3.jpg" alt="">
                                    </div>
                                    <div class="author-text">
                                      <h5>John Doe <span>Berlin</span></h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- Follow Instagram Section Begin -->
    <section class="follow-instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                        Follow us on Instagram @caciquat
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Follow Instagram Section End --> 
    <!-- Footer Room Pic Section Begin -->
    <div class="footer-room-pic">
        <div class="container-fluid">
            <div class="row">
                <img src="img/img/footer/img2.jpg" height="250px" alt="">
                <img src="img/img/footer/img3.jpg" height="250px" alt="">
                <img src="img/img/footer/img13.jpg" height="250px" alt="">
                <img src="img/img/footer/img12.jpg" height="250px" alt="">
            </div>
        </div>
    </div>
    <!-- Footer Room Pic Section End -->
    <?php 
      include'page/footer.php';
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