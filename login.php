<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
$_SESSION['message'] = '';
$cookie_name = "user";
if(isset($_COOKIE[$cookie_name])) {
    setcookie("user","",time()-3600);
    setcookie("firstname","",time()-3600);
    setcookie("lastname","",time()-3600);
    setcookie("user_birth","",time()-3600);
    setcookie("user_sex","",time()-3600);
    session_unset();
    session_destroy();
    header("location: index.php");
} 
?>

 <head>
    <title>Formula 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/personalstyle.css">
</head>

<body>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-link" href="#top" id="welcome_message">F1</a>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-link" href="index.php">Vozači</a>
                    </li>
                    <li>
                        <a class="page-link" href="povijest.php">Timovi</a>
                    </li>
                    <li>
                        <a class="page-link" href="blog.php" id="blog">Novosti</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rezultati
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="rezultati_vozaci.php">Vozači</a></li>
                        <li><a href="rezultati_timovi.php">Timovi</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a class="page-link" href="./login.php" id="login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class = "container">
	<div class="wrapper">
		<form action="login_process.php" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Dobrodošli! Molimo logirajte se!</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="Username" placeholder="Korisničko ime" required="true" autofocus="" />
			  <input type="password" class="form-control" name="password" id="password" placeholder="Lozinka" required="true"/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
            
              <br>
              <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
              <div>Nemate korisnički račun?</div><a href="registracija.php">Registrirajte se!</a>	
		</form>			
	</div>
</div>

</body>

<script src="js/cookie_check.js"></script>

</html>