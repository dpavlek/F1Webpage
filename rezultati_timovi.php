<!DOCTYPE html>
<html lang="en">

<?php session_start();?>

  <head>
    <title>F1 Standings - Constructors</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/d3.parcoords.css">
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="js/d3.parcoords.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
 
        path {
          stroke-width: 1.5px;
          stroke: #666;
          fill: #ddd;
        }
        
        #controls {
          position: absolute;
          width: 240px;
          font: 10px sans-serif;
        }
        
        #controls span,
        #controls label {
          position: relative;
          top: -5px;
          padding: 5px;
          display: inline-block;
          width: 20px;
        }
        
        #controls button {
          font: 10px sans-serif;
          padding: 5px;
          width: 70px;
        }

		.teamInfo{
			font: 10pt sans-serif;
		}

        .jumbotron{
            padding-top: 70pt;
        }
    
    </style>
  </head>
  <body>


<div class="container">
  <div class="row">
    <div id="superformula"></div>
    <div id="example" class="parcoords" style="width:1280px;height:500px"></div>
    <div id="footer" class="footer" style="height:50px"></div>
    </div>
  </div>
</div>

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
                        <li class="active"><a href="rezultati_timovi.php">Timovi</a></li>
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

<script src="js/cookie_check.js"></script>

</html>