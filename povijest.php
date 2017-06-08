<!DOCTYPE html>
<html lang="en">

<?php session_start();?>

 <head>
    <title>Formula 1 - Teams</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
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
                    <li class="active">
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

    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-3">Formula 1</h1>
        <p class="lead">Stranica o povijesti i novostima u svijetu F1.</p>
    </div>

    <script>


     function changeTeam(team1){
         switch(team1){
             case 1:
                document.getElementById("naziv_tima").innerHTML = "Ferrari";
                document.getElementById("link_tima").href = "http://formula1.ferrari.com/en/";
                document.getElementById("fotografija_tima").src = "/projekt/images/ferrari.png";
                $( "#opis_tima" ).load( "/Projekt/ferrari.txt" );
                $
                break;
            case 2:
                document.getElementById("naziv_tima").innerHTML = "McLaren";
                document.getElementById("link_tima").href = "http://www.mclaren.com/formula1/";
                document.getElementById("fotografija_tima").src = "/projekt/images/mclaren.png";
                $( "#opis_tima" ).load( "/Projekt/mclaren.txt" );
                break;
            case 3:
                document.getElementById("naziv_tima").innerHTML = "Williams";
                document.getElementById("link_tima").href = "http://www.mclaren.com/formula1/";
                document.getElementById("fotografija_tima").src = "/projekt/images/williams.png";
                $( "#opis_tima" ).load( "/Projekt/williams.txt" );
                break;
            case 4:
                document.getElementById("naziv_tima").innerHTML = "Mercedes";
                document.getElementById("link_tima").href = "https://www.mercedesamgf1.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/mercedes.jpg";
                $( "#opis_tima" ).load( "/Projekt/mercedes.txt" );
                break;
            case 5:
                document.getElementById("naziv_tima").innerHTML = "Red Bull";
                document.getElementById("link_tima").href = "http://www.redbullracing.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/redbull.jpg";
                $( "#opis_tima" ).load( "/Projekt/redbull.txt" );
                break;
            case 6:
                document.getElementById("naziv_tima").innerHTML = "Renault";
                document.getElementById("link_tima").href = "https://www.renaultsport.com/?lang=en";
                document.getElementById("fotografija_tima").src = "/projekt/images/renault.png";
                $( "#opis_tima" ).load( "/Projekt/renault.txt" );
                break;
            case 7:
                document.getElementById("naziv_tima").innerHTML = "Toro Rosso";
                document.getElementById("link_tima").href = "http://www.scuderiatororosso.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/tororosso.png";
                $( "#opis_tima" ).load( "/Projekt/tororosso.txt" );
                break;
            case 8:
                document.getElementById("naziv_tima").innerHTML = "Force India";
                document.getElementById("link_tima").href = "https://www.forceindiaf1.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/forceindia.png";
                $( "#opis_tima" ).load( "/Projekt/forceindia.txt" );
                break;
            case 9:
                document.getElementById("naziv_tima").innerHTML = "Haas F1";
                document.getElementById("link_tima").href = "https://www.haasf1team.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/haas.png";
                $( "#opis_tima" ).load( "/Projekt/haas.txt" );
                break;
            case 10:
                document.getElementById("naziv_tima").innerHTML = "Sauber F1";
                document.getElementById("link_tima").href = "https://www.sauberf1team.com";
                document.getElementById("fotografija_tima").src = "/projekt/images/sauber.png";
                $( "#opis_tima" ).load( "/Projekt/sauber.txt" );
                break;
         }
         $('html, body').animate({
                scrollTop: $("#naziv_tima").offset().top
            }, 2000);
     }   
    </script>

    <section class="no-padding" id="portfolio" style="padding-bottom: 30pt">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                        <img src="images/ferrari.png" class="img-responsive" alt="" onclick="changeTeam(1)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                        <img src="images/mclaren.png" class="img-responsive" alt="" onclick="changeTeam(2)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                        <img src="images/williams.png" class="img-responsive" alt="" onclick="changeTeam(3)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/mercedes.jpg" class="img-responsive" alt="" onclick="changeTeam(4)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/redbull.jpg" class="img-responsive" alt="" onclick="changeTeam(5)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/renault.png" class="img-responsive" alt="" onclick="changeTeam(6)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/tororosso.png" class="img-responsive" alt="" onclick="changeTeam(7)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/forceindia.png" class="img-responsive" alt="" onclick="changeTeam(8)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/haas.png" class="img-responsive" alt="" onclick="changeTeam(9)" style="height: 200pt">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img src="images/sauber.png" class="img-responsive" alt="" onclick="changeTeam(10)" style="height: 200pt">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="halloffame" style="background-color: lightgray; color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading" id="naziv_tima">Timovi u F1</h2>
                    <hr class="light">
                </div>
            </div>
            
            <div class="row">
                    <p class="col-sm-6" id="opis_tima"></p>
                    <p class="col-sm-6" style="text-align: center">
                        <a href="" id="link_tima"><img src="" class="img-responsive" height="400pt" id="fotografija_tima"></a>
                    </p>
                </div>
        </div>
    </section>
</body>

<script src="js/cookie_check.js"></script>

</html>