 <?php
include'header.php';
require_once'admin/Connection.php';
  
                       $id          = $_GET["id"];
                       $body        = "";
                       $title       = "";
                       $file        = "";
                       $date        = ""; 
                       $autor       = "";
                       $categorie   = "";
                      try{
                        $stmt = $pdo->query("SELECT * FROM blog WHERE id=".$id);  
                        while ($row        = $stmt->fetch()) { 
                             $title        = $row["title"]; 
                             $body         = $row["body"];  
                             $file         = $row["file"];
                             $date         = $row["date"]; 
                             $autor        = $row["autor"];
                            $categorie     = $row["categorie"];
                        } 
?>
 
<?php
                        
                      }catch(PDOException $e){
                        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                    }
                  // Close connection
                    unset($pdo); 
                  ?>

    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg"  height="500px" data-setbg="<?php echo 'data:image/jpeg;base64,'.base64_encode(stripslashes($file)).''  ?>" >
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News</h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="post-heading"> 
                    <h4 class="text-light"><?php echo $title ?></h4>
                    <h2 class="subheading text-light"> </h2>
                    <span class="meta">Posted by
                      <a href="#"><?php echo $autor ?></a>
                      on <?php echo $date ?></span>
                  </div>
        </div>
                <div class="page-nav">
                    <a href="./rooms.php" class="left-nav"><i class="lnr lnr-arrow-left"></i> Rooms</a>
                    <a href="./contact.php" class="right-nav">Contact <i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
 
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php
            echo $body;
                
           ?>

          <p>Placeholder text by
            <a href="http://spaceipsum.com/">Caciquat Hotel</a>. Photographs by
            <a href="https://www.flickr.com/photos/nasacommons/">Caciquat Hotel</a>.</p>
        </div>
      </div>
    </div>
  </article> 
   
                            
                            
                       
                       

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