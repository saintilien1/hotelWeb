 <?php
include'header.php';
require_once'admin/Connection.php';
?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/services-bg.jpg">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News</h1>
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

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-2 order-lg-1">
                    <div class="side-bar">
                        <div class="categories-item"> 
                            <h4>Categories</h4>
                            <div class="categories-list">
                                <ul>
                                    
                                     <?php 
                                        
                                         //recherche dans la base de donnee pour controller le nombre de titre d'activite qui en sont 
                                              try{    
                                                  
                                                  $stmt = $pdo->query("SELECT categorie, COUNT(*)  FROM blog GROUP BY categorie ");  
                                                  while ($row      = $stmt->fetch()) { 
                                                  $accomodation       = $row["categorie"]; 
                                                  $count              = $row["COUNT(*)"];

                                                ?>
                              
                                    <li><?php  echo $accomodation  ?> <span><?php echo $count  ?></span></li> 
                                    <?php
                                }
                                    }catch(PDOException $e){
                                       die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                        }
                                       // Close connection
                                                
                                  ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Posts</h4>
                            
                            
                            <?php     
                                              try{    
                                                  
                                                  $stmt = $pdo->query("SELECT * FROM blog ORDER BY id DESC LIMIT  1"); 
                                                  while ($row      = $stmt->fetch()) { 
                                                     $title        = $row["title"]; 
                                                     $date         = $row["date"];
                                                     $file         = $row["file"];
                                                     $id           = $row["id"];
                                                ?>
                            <div class="single-recent-post">
                                <div class="recent-pic">                                                 
                            <?php
                                echo '<img  src="data:image/jpg;base64,'.base64_encode(stripslashes($file)).'"/>';
                            ?>     
                                </div>
                                <div class="recent-text">
                                    <h5><?php  
                                        if(strlen($title)>100 ){
                                           $title = substr_replace($row["title"], "  ...  <a class=\"text-uppercase\" href=\"newsReader.php?id=$id\"> read more </a>", 100);
                                        }else{
                                           $title= $row["title"];
                                        }
                                        echo $title; 
                                        ?> </h5>
                                    <div class="recent-time">
                                        <i class="fa fa-clock-o"></i>
                                        <span><?php echo $date ?></span>
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
                              
                            
                            <div class="single-recent-post">
                               
                            <?php     
                                              try{    
                                                  
                                                  $stmt = $pdo->query("SELECT * FROM blog ORDER BY id DESC LIMIT  1,2"); 
                                                  while ($row      = $stmt->fetch()) { 
                                                     $title        = $row["title"]; 
                                                     $date         = $row["date"];
                                                     $file         = $row["file"];
                                                     $id           = $row["id"];
                                                ?>  
                               
                                
                                <div class="recent-pic">
                                    <?php
                                echo '<img width="170px" src="data:image/jpg;base64,'.base64_encode(stripslashes($file)).'"/>';
                            ?>  
                                </div>
                                <div class="recent-text">
                                    <h5><?php  
                                        if(strlen($title)>100 ){
                                           $title = substr_replace($title, "  ...  <a class=\"text-uppercase\" href=\"newsReader.php?id=$id\"> read more </a>", 100);
                                        }else{
                                           $title= $row["title"];
                                        }
                                        echo $title; 
                                        ?></h5> 
                                    
                                    <div class="recent-time">
                                        <i class="fa fa-clock-o"></i>
                                        <span><?php echo $date ?></span>
                                    </div>
                                </div>
                            </div> 
                          <?php
                            }
                               }catch(PDOException $e){
                                   die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                    }
                                              
                            ?>  
                            
                            
                            
                        <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                                <a href="#">hotel</a>
                                <a href="#">theme</a>
                                <a href="#">wordpress</a>
                                <a href="#">booking</a>
                                <a href="#">booking</a>
                                <a href="#">accommodation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    <div class="blog-post">
<!--                     retrieve the the blog information for the big windows   -->
                        
                         <?php     
                                              try{    
                                                  
                                                  $stmt = $pdo->query("SELECT * FROM blog ORDER BY id DESC LIMIT  3,5"); 
                                                  while ($row      = $stmt->fetch()) { 
                                                     $title        = $row["title"]; 
                                                     $date         = $row["date"];
                                                     $file         = $row["file"];
                                                     $id           = $row["id"];
                                                     $autor        = $row["autor"];
                                                     $categorie    = $row["categorie"];
                                                     $body         = $row["body"];
                                                ?>  
                               
                        
                        
                        
                        <div class="single-blog-post">
                            <div class="blog-pic">
                                 <?php
                                echo '<img   src="data:image/jpg;base64,'.base64_encode(stripslashes($file)).'"/>';
                            ?>  
                            </div>
                            <div class="blog-text">
                                <h4><?php  
                                        echo $title; 
                                        ?></h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                        <i class="lnr lnr-user"></i>
                                        <span><?php echo $autor  ?></span>
                                    </div>
                                    <div class="blog-info">
                                        <img src="img/clock.png" alt="">
                                        <span><?php echo $date  ?></span>
                                    </div>
                                    <div class="blog-info">
                                        <img src="img/speech.png" alt="">
                                        <span>4 Comments</span>
                                    </div>
                                    <div class="blog-info">
                                        <i class="fa fa-folder-o"></i>
                                        <span><?php echo $categorie  ?></span>
                                    </div>
                                </div>
                                <p><?php 
                                    
                                    if(strlen($body)>200 ){
                                           $body = substr_replace($body, "  ... <a href=\"newsReader.php?id=$id\">Continue Reading <i class=\"lnr lnr-arrow-right\"></i></a>  ", 200);
                                        }else{
                                           $body= $row["body"];
                                        }
                                        echo $body;
                                    
                                    ?></p>
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        
                        <?php
                            }
                               }catch(PDOException $e){
                                   die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                    }
                                              
                            ?> 
                        
                        <div class="blog-pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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