<!DOCTYPE html>
<html lang="en">

<?php session_start();?>

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
            <div class="navbar-header" id="navigation-bar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-link" href="#top" id="welcome_message">F1</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a class="page-link" href="index.php">Vozači</a>
                    </li>
                    <li>
                        <a class="page-link" href="povijest.php">Timovi</a>
                    </li>
                    <li>
                        <a class="page-link" href="blog.php" id="blog" disabled=true>Novosti</a>
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

    <section class="bg-primary" id="halloffame">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Najbolji vozači svih vremena</h2>
                    <hr class="light">
                </div>
            </div>
            <div class="row">
                    <h3 class="col-sm-6" style="padding-bottom: 15pt; font-size: 200%">Michael Schumacher</h3>
                </div>
            <div class="row">
                    <p class="col-sm-6">Michael Schumacher je definitivno najpopularniji (bivši) vozač Formule 1. Tu popularnost je stekao od 1991. do 2006. godine kada je osvojio čak 7 prvenstava, što je više od bilo kojeg drugog vozača. Rođen je 1969. godine u Njemačkoj, te se Formulom 1 bavio od 1991. godine, pa sve do 2012. godine kada je otišao u mirovinu. U međuvremenu je imao pauzu od 2006. do 2010. godine. Vozio je za Jordan, Benetton, Ferrari i na kraju Mercedes. U svojoj karijeri bilježi 68 najboljih kvalifikacijskih pozicija, te 91 pobjedu, a zadnja je na VN Kine 2006. godine. Prva dva svjetska prvenstva je osvojio s timom Benetton F1(današnji Renault), a ostalih 5 je osvojio u Ferrariju. Njegov brat Ralf je također bivši vozač F1, te su njih dvojica jedina braća koja su zajedno pobjeđivala u Formuli 1, međutim Ralf nije bio toliko uspješan kao Michael. U prosincu 2013. Michael Schumacher je nažalost stradao na skijanju, te je bio u umjetnoj komi 6 mjeseci, te se i dan danas oporavlja od udarca u glavu. </p>
                    <p class="col-sm-6" style="text-align: center">
                        <a href="https://en.wikipedia.org/wiki/Michael_Schumacher"><img src="images/schumacher.jpg" class="img-rounded" height="400pt"></a>
                    </p>
                </div>

                <div class="row">
                    <h3 class="col-sm-6" style="padding-bottom: 15pt">Juan Manuel Fangio</h3>
                </div>
            <div class="row">
                    <p class="col-sm-6" style="text-align: center">
                        <a href="https://en.wikipedia.org/wiki/Juan_Manuel_Fangio"><img src="images/fangio.png" class="img-rounded" height="400pt" ></a>
                    </p>
                    <p class="col-sm-6">
                        Juan Manuel Fangio je argentinski vozač, te drugi najuspješniji vozač u F1. Osvojio je 5 svjetskih prvenstava u svojoj vozačkoj karijeri od 1950. do 1958. godine. Tijekom svoje karijere imao je 29 najboljih startnih pozicija, te 24 pobjede. Svoje prvo prvenstvo 1951. je osvojio s Alfa Romeom, drugo 1954. s Mercedesom, treće 1955. također s Mercedesom, četvrto 1956. s Ferrarijem i poslijednje 1957. s Maseratijem. Zadnja pobjeda na utrci mu je bila 1957. godine na Velikoj Nagradi Njemačke, a posljednja utrka koju je vozio je bila Velika Nagrada Francuske 1958. godine. Umro je 1995. godine u Buenos Airesu, u 85. godini života. I dan danas drži 5 rekorda u F1: Najveći postotak pobjeda(46%), najveći postotak najboljih startnih pozicija(55.8%), najveći postotak starta iz prvog reda(92.31%), najstarijeg svjetskog prvaka(46 godina), te svjetskog prvaka s najviše timova(4).</p>
                </div>
        </div>
    </section>
</body>

<script src="js/cookie_check.js"></script>

</html>