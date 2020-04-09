<?php
include'header.php';
include"data/Connection.php";
?>
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