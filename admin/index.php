<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Caciquat Admin-section</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		 
			<!--
			CSS
			============================================= -->
 			 
			<link rel="stylesheet" href="../css/cssFile.css">
			<link rel="stylesheet" href=" ../css/linearicons.css">
			<link rel="stylesheet" href="../css/linearicons.css">
			<link rel="stylesheet" href="../css/font-awesome.min.css">
			<link rel="stylesheet" href="../css/magnific-popup.css">
			<link rel="stylesheet" href="../css/nice-select.css">
			<link rel="stylesheet" href="../https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="../css/bootstrap.min.css"> 
		</head>
		<body>
            <div id="login"> 
                <h3 class="text-center text-white pt-5">Login form</h3>  
                <div class="container">
                    
                        
                    <div id="login-row" class="row justify-content-center align-items-center">
                    
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form"  action="operation/login.php" method="post" >
                                    <h3 class="text-center text-info">Login</h3> 
                                         <?php
                                            $message = $_SESSION["msg"];
                                              if($message){
                                                  echo '<div class="alert alert-danger text-center alert-dismiss">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <strong>'.$message.'</strong>  
                                                       </div>';
                                                   session_cache_expire();
                                              }else{ 
                                                    $_SESSION["msg"]="";  
                                              }
                                            $message =""; 
                                      ?>  
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="email" name="username" autocomplete="off" id="username" value="saintilien49@gmail.com" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" name="password" autocomplete="off" required value="1234567" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                        <?php
                                        session_cache_expire();
                                        
                                        ?>
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                    </div>
                                    <div id="register-link" class="text-right">
                                        <a href="#" class="text-info">Register here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
	       <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
           <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		</body>
	</html>