<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(!isset($_COOKIE['user'])){
    header("location: index.php");
}
$_SESSION['message']='';
include 'ConnToDB.php';   

$sql = "SELECT title, content, user FROM blogposts";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $titles[] = $row["title"];
        $contents[] = $row["content"];
        $users[] = $row["user"];
    }
} 
else {
    echo "0 results";
}
$mysqli->close();
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
                    <li class="active">
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
</body>

<div class="jumbotron jumbotron-fluid">
        <h1 class="display-3">Formula 1</h1>
        <p class="lead">Stranica o povijesti i novostima u svijetu F1.</p>
</div>

<section class="bg-primary" id="halloffame">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Blog</h2>
                    <hr class="light">
                </div>

        <?php
        $_SESSION['message']='';
        include 'ConnToDB.php';
            try {
                $sql = "SELECT id, title, content, user, time FROM blogposts ORDER BY id DESC";
                $result = $mysqli->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo '<div>';
                        echo '<div class="row"><h3 class="col-sm-6" style="padding-bottom: 15pt">'.$row['title'].'</h3></div>';
                        echo '<div class="row"><p class="col-sm-6" style="padding-bottom: 15pt">'.$row['content'].'</p></div>';
                        echo '<div class="row"><p class="col-sm-6" id="author"> Autor: '.$row['user'].' Vrijeme: '.$row['time'].'</p></div>';                
                    echo '</div>';

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>

    </section>

    <a href="addPost.php" style="color:red;"  onclick="window.open('addPost.php', 'newwindow', 'width=600, height=700'); return false;"> Dodajte novi članak!</a>

<script src="js/cookie_check.js"></script>

</html>