 <?php
include'header.php';
?>
    
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/contact-bg.jpg">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="./news.php" class="left-nav"><i class="lnr lnr-arrow-left"></i> News</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End --> 
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Contact Information</h2>
                            <ul>
                                <li><img src="img/placeholder-copy.png" alt=""> <span>167, Rue Notre-Dame, Arrondissement<br> de Port-de-Paix</span></li>
                                <li><img src="img/phone-copy.png" alt=""> <span>+1(509)37228101</span></li>
                                <li><img src="img/envelop.png" alt=""> <span>caciquatconventioncenter@yahoo.com</span></li>
                                <li><img src="img/clock-copy.png" alt=""> <span>Everyday: 06:00 -22:00</span></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h2>Follow us on:</h2>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/feed/?trk=onboarding-landing"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.pinterest.com/conventioncentercaciquat/"><i class="fa fa-pinterest"></i></a>
                            <a href="@caciquat"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.youtube.com/channel/UCr87TuxsaunQC3CcnsQsqAA/?guided_help_flow=5"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Write us ...</h5>
                        <form action="sendMail.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="from">From</label>
                                    <div class="input-group">
                                        <input type="text" id="from" name="name" placeholder="Full Name">
                                        <img src="img/edit.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="email" name="email" placeholder="Email">
                                        <img src="img/envelop-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group phone-num">
                                        <input type="text" name="phone" placeholder="Phone">
                                        <img src="img/phone-copy.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="message">
                                        <label for="message">Message</label>
                                        <div class="textarea">
                                            <textarea name="message" id="message" placeholder="Hi ..."></textarea>
                                            <img src="img/speech-copy.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Send <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Begin -->
    <div class="map"> 
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15002.650517000804!2d-72.8289261!3d19.9386168!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ad76627c8aa4ee7!2sCaciquat%20Convention%20Center!5e0!3m2!1sfr!2sht!4v1582112953175!5m2!1sfr!2sht" width="600" style="border:0;" height="560" frameborder="0" style="border:0;" allowfullscreen=""></iframe>  
    </div>
    <!-- Map Section End -->

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