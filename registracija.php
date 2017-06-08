<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$_SESSION['message']='';
include 'ConnToDB.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['password'] == $_POST['password_confirm']){
            if(strlen($_POST['password'])>8){
                $username = $mysqli -> real_escape_string($_POST['username']);
                $email = $mysqli->real_escape_string($_POST['email']);
                $password = md5($_POST['password']);
                $firstname = $mysqli -> real_escape_string($_POST['firstname']);
                $lastname = $mysqli->real_escape_string($_POST['lastname']);
                $birth = $mysqli->real_escape_string($_POST['birth']);
                $sex = $mysqli->real_escape_string($_POST['sex']);

                setcookie("user",$username,time() + 3600);
                setcookie("firstname",$firstname,time() + 3600);
                setcookie("lastname",$lastname,time() + 3600);
                setcookie("user_birth", $birth,time() + 3600);
                setcookie("user_sex", $sex,time() + 3600);

                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;

                $sql = "INSERT INTO users (firstname, lastname, username, password, email, birth, sex) "
                        . "VALUES ('$firstname','$lastname', '$username', '$password', '$email', '$birth', '$sex')";

                if($mysqli -> query($sql) === true){
                    $_SESSION['message'] = 'Registracija uspješna!';
                    header("location: index.php");
                }
                else{
                    $_SESSION['message'] = "Korisnik nije dodan u bazu!";
                }
        }
        else{
            $_SESSION['message'] = "Lozinka je manja od 8 znakova.";
        }
    }
    else{
        $_SESSION['message'] = "Lozinke se ne podudaraju!";
    }
}
?>

 <head>
    <title>Formula 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/personalstyle.css">
    <script>
        $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1917:+nn",
      dateFormat: 'yy-mm-dd'
    });
  } );
    </script>

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
                    <li>
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

    <form class="form-horizontal" action='registracija.php' method="POST">

  <fieldset>
    <div id="legend">
      <legend class="">Registracija</legend>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Korisničko ime</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="obavezno" class="input-xlarge" required="true">
        <p class="help-block">Korisničko ime može sadržavati slova i brojeve, te ne smije imati razmake</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="obavezno" class="input-xlarge" required="true">
        <p class="help-block">Upišite važeću e-mail adresu</p>
      </div>
    </div>

    <div class="control-group">
      <!-- First Name -->
      <label class="control-label"  for="firstname">Ime</label>
      <div class="controls">
        <input type="text" id="firstname" name="firstname" placeholder="obavezno" class="input-xlarge" required="true">
        <p class="help-block">Upišite vaše ime</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Last Name -->
      <label class="control-label"  for="latname">Prezime</label>
      <div class="controls">
        <input type="text" id="lastname" name="lastname" placeholder="obavezno" class="input-xlarge" required="true">
        <p class="help-block">Upišite vaše prezime</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Date Of Birth -->
      <label class="control-label"  for="birth">Datum Rođenja</label>
      <div class="controls">
        <input type="text" id="datepicker" name="birth" placeholder="" class="input-xlarge">
        <p class="help-block">Unesite vaš datum rođenja</p>
      </div>
    </div>

    <div class="control-group">
      <!-- sex -->
      <label class="control-label"  for="sex">Datum Rođenja</label>
      <div class="controls">
        <select name="sex" class="input-xlarge">
            <option value=""></option>
            <option value="m">Muško</option>
            <option value="f">Žensko</option>
            <option value="t">Trans</option>
        </select>
        <p class="help-block">Odaberite vaš spol</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Lozinka</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Lozinka mora biti veća od 8 znakova</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Ponovno lozinka</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Ponovno upišite lozinku</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Registriraj se</button>
      </div>
    </div>
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
  </fieldset>
</form>

</div>
</div>
    

</body>

<script src="js/cookie_check.js"></script>

</html>