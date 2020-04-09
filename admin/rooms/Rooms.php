<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Admin-section</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
 			<link rel="stylesheet" href="../css/admin.css"> 
			<link rel="stylesheet" href="../../css/linearicons.css">
			<link rel="stylesheet" href="../../css/bootstrap.min.css">
			<link rel="stylesheet" href="../../css/magnific-popup.css">
			<link rel="stylesheet" href="../../css/nice-select.css">
			<link rel="stylesheet" href="../../https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="../../css/bootstrap.css">
		</head>
		<body>
			<!-- Start Header Area -->
              <!-- Navigation -->
 <nav class="navbar navbar-expand-xl|lg|md|sm navbar-light text-dark bg-light mx-auto">
	<a class="navbar-brand" href="#"><h6>Caciquat Hotel</h6></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbar1">  
    <ul class="navbar-nav d-flex flex-row-reverse bg-light"> 
         <li>    
             <a href="#post.php">
             <i class="fa fa-user"></i>       
          <?php 
            session_start();
            if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") {
              echo 'Welcome '.$_SESSION['sess_name'].' '.$_SESSION['sess_user_name'];
                $nom   = $_SESSION['sess_name'];
                $id    = $_SESSION['sess_user_id'];
                $prenom= $_SESSION['sess_user_name'];
                ?>    
             <i class="fa fa-chevron-down"></i>
             </a> 
             <ul>       
         <?php
              echo '<li><a href="../../data/logout.php" class="logout">Logout</a></li>';
            } else { 
              header('location:../../data/admin.php');
            }
         ?>
             </ul>
         </li>
    </ul>
  </div>
</nav>
 <!-- End Header Area --> 
<!-- Start donate Area -->
			<section class="donate-area relative section-gap" id="contact"> 
				<div class="overlay overlay-bg"></div>
				<div class="container"> 
					<div class="row d-flex justify-content-center">
						<div class="col-lg-2  contact-left">
							<div class="single-info">
                            <?php 
                               $_SESSION['sess_user_id']   = $id;  
                               $_SESSION['sess_user_name'] = $prenom;
                               $_SESSION['sess_name']      = $nom;
                              echo '<h6> <a href="../post/post.php">Manage posts</a> </h6>';
                            ?>
							</div>
							<div class="single-info">
                            <?php 
                               $_SESSION['sess_user_id']   = $id;  
                               $_SESSION['sess_user_name'] = $prenom;
                               $_SESSION['sess_name']      = $nom;
                              echo '<h6> <a href="../user/user.php">Manage user</a> </h6>';
                            ?>	 
							</div>
                            <div class="single-info"> 
                            <?php 
                               $_SESSION['sess_user_id']   = $id;  
                               $_SESSION['sess_user_name'] = $prenom;
                               $_SESSION['sess_name']      = $nom; 
                              echo '<h6> <a href="../image/image.php">Manage rooms</a> </h6>';
                            ?>  
                            </div>  
						</div>
						<div class="col-lg-10 contact-right"> 
                             <div role="group" class="btn-group"> 
                                 <button class="btn btn-default" type="button"><a href="addRooms.php">Add rooms</a></button>
                             </div> 
                             <div role="group" class="btn-group"> 
                                 <button class="btn btn-default" type="button"><a href="Rooms.php">Manage rooms</a></button>
                            </div> 
                            <div class="row">
                                 <div class="container">
                                       <div class="col-lg-12 col-sm-12 pb-80 header-text">
                                       <h3>Manage Rooms</h3> 
                                      </div> 
                                     <?php
                                     if(isset($_SESSION["msg"])){
                                         echo '<div class="bg-success col-lg-12 col-sm-12 pb-80 header-text">'.$_SESSION["msg"].' </div>';
                                     }
                                     ?>
                                 </div> 
                            </div> 
								 	<div class="row">  
                                        <div class="col-lg-12 d-flex  flex-column"> 
                                             <?php 
                                            include"../../data/Connection.php"; 
                                            $id="";
                                            $description="";
                                            $title="";
                                            try{
                                                 $stmt = $pdo->query("SELECT * FROM rooms"); 
                                                   echo "<table><tr><th>ID</th><th>Name</th><th>Capacity</th><th>type</th><th>Description</th><th colspan=\"3\">Action</th>";
                                                     while ($row     = $stmt->fetch()) { 
                                                        $id          = $row["id"];
                                                        $name        = $row["name"];
                                                        $capacity    = $row["capacity"];
                                                        $status      = $row["status"];
                                                        $type        = $row["type"];
                                                        $file        = $row["file"];
                                                        $description = $row["description"];
                                                            
                                                            if(strlen($description) > 30 ){ 
                                                                $description= substr_replace($row["description"], "...", 10);    
                                                             }  
                                                             echo "<tr><td>".$id."</td>
                                                                 <td>".$name."</td>
                                                                 <td>".$capacity."</td> 
                                                                 <td>".$status."</td> 
                                                                 <td>".$type."</td> 
                                                                 <td>".$description."</td> 
                                                                 <td><a href=\"updateRooms.php?id=".$row['id']."\" class=\"edit\">edit</a></td>
                                                                 <td><a href=\"../delete/deleteRooms.php?id=".$row['id']."\"  class=\"delete\">delete</a></td>
                                                                 <td><a href=\"#\" class=\"publish\">publish</a></td></tr>";
                                                            }
                                                             echo "</table>";
                                                          }catch(PDOException $e){
                                                            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                                                        } 
                                                        unset($pdo);  
                                            ?>
                                                    
									</div>  
                            </div> 
                        </div> 
                    </div>
				</div> 
            </section> 
	        <script src="../../../js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="../../../js/vendor/bootstrap.min.js"></script>
			<script src="../../../js/jquery.ajaxchimp.min.js"></script>
			<script src="../../../js/jquery.nice-select.min.js"></script>
			<script src="../../../js/jquery.sticky.js"></script>
			<script src="../../../js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="../../../js/jquery.magnific-popup.min.js"></script>
			<script src="../../../js/main.js"></script> 
            <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
		</body>
	</html>