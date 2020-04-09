<?php
  require_once"Connection.php";
  if(session_status()===PHP_SESSION_NONE) session_start(); 
?>
<!DOCTYPE html>
<html lang="zxx">
<!--
 $date1 = new DateTime($row["End_d"]); 
                             $string = $date1->format(DATE_RFC2822);
-->
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
 
 
 
     <div id="preloder">
        <div class="loader"></div>
    </div>   
 
 
 
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="../index.php"> <img src="../img/logo.png" alt=""></a>
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
     
    
    <!-- Room Availability Section Begin -->
    <section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-item"> 
                                  <?php
                                    $id =$_SESSION["id"]; 
                                    $name="Image name";
                                    $type="";
                                    $price=$_SESSION["price"];
                                     try{
                                         $sql ="SELECT * FROM rooms WHERE id='$id'";
                                         $stmt          = $pdo->query($sql); 
                                         while($row = $stmt->fetch()){
                                             $name  = $row["name"];
                                             $type  = $row["type"]
                                            ?>
                                      <div class="room-pic-slider room-pic-item owl-carousel"> 
                                            <div class="room-pic">
                                             <?php  
                                              echo '<img class="content-image img-thumbnail img-fluid d-block mx-auto" alt="$name" src="data:image/jpeg;base64,'.base64_encode(stripslashes($row["file"])).'"/>';
                                              ?> 
                                           </div> 
                                      </div>
                                        <?php
                                         }
                                     }catch(PDOException $e){
                                         
                                     }
                                    ?> 
                              <br>
                            <div class="room-text">
                                <div class="room-title">
                                    <h2><?php echo $type ?></h2>
                                    <div class="room-price">
                                        <span>Price</span>
                                        <h4><b><?php echo $price ?> USD</b></h4>
                                    </div>
                                </div>
                                <br>
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
                                 <p>  .</p>
                            </div>
                             <p class="text-center"><span>You can pay by monCash, Please contact us.</span></p><br>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="check-form">  
                            <h4>Secure Checkout</h4> 
                            <form   class="booking-form" action="https://www.paypal.com/cgi-bin/webscr"  method="post">
								 	<div class="row">  
                                        <div class="col-lg-12 d-flex flex-column">
											  <!-- Identify your business so that you can collect the payments. -->
                                              <input type="hidden" name="business" value="Kervinsbeaujole@gmail.com">
										</div>   
							 			<div class="col-lg-6 d-flex flex-column">
											 <!-- Specify a Donate button. -->
                                               <input type="hidden" name="cmd" value="_donations">
										</div>
										<div class="col-lg-6 d-flex flex-column">
											  <!-- Specify details about the contribution -->
                                                  <input type="hidden" name="item_name" value="donate for the children">
                                                  <input type="hidden" name="currency_code" value="USD">
										</div> 	  
									   </div>
                                     <!-- Display the payment button. -->
                                          <input type="image" name="submit"  src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg"
                                         alt="Pay with paypall" value="Pay with paypall">
                                         <img alt="" width="1" height="1"
                                          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
					  		</form>  
                            <!-- form for the stripe integration payment-->
                       <?php require_once "../stripe/index2.php";?>   
                        <p class="payment-method"> 
 					     <img src="../img/payment.png" alt="">            
				       </p>
 
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </section>
    <!-- Room Availability Section End -->
      <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-logo">
                        <a href="#">
<!--                            <img src="img/logo.png" alt="">-->
                            <h4 style="color:#fff;">CACIQUAT</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row pb-50">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Location</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-map-marker"></i>
                            <p>167 Rue Notre Dame, Arrondissement<br> de Port-de-Paix</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Reception</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p>+1(509)37 22 8101</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Shuttle Service</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p>+1(509)37228101</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Restaurant</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p>+1(509)38503030</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made by <a href="https://colorlib.com" target="_blank">JimboSoft</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                 <div class="privacy-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Photo Requests</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End --> 
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
 