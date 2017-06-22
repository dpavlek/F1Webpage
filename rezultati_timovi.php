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
    <link rel="stylesheet" type="text/css" href="css/personalstyle.css">

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
                <a class="navbar-brand page-link" id="reset" onclick="resetGraph()">Reset</a>
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

<script>
 
var types = {
  Ferrari: {2006: 2, 2007: 1, 2008: 1, 2009: 4, 2010: 3, 2011: 3, 2012: 2, 2013:3, 2014:4, 2015:2, 2016:3, Color:"red"},
  McLaren: {2006: 3, 2007: 11, 2008: 2, 2009: 3, 2010: 2, 2011: 2, 2012: 3, 2013:5, 2014:5, 2015:9, 2016:6, Color:"black"},
  RedBull: {2006: 7, 2007: 5, 2008: 7, 2009: 2, 2010: 1, 2011: 1, 2012: 1, 2013:1, 2014:2, 2015:4, 2016:2, Color:"purple"},
  Williams: {2006: 8, 2007: 4, 2008: 8, 2009: 7, 2010: 6, 2011: 9, 2012: 8, 2013:9, 2014:3, 2015:3, 2016:5, Color:"deepskyblue"},
  Mercedes: {2006: 4, 2007: 8, 2008: 9, 2009: 1, 2010: 4, 2011: 4, 2012: 5, 2013:2, 2014:1, 2015:1, 2016:1, Color:"gray"},
  Renault: {2006: 1, 2007: 3, 2008: 4, 2009: 8, 2010: 5, 2011: 5, 2012: 4, 2013:4, 2014:8, 2015:6, 2016:9, Color:"gold"},
  ForceIndia: {2006: 10, 2007:10,2008:10, 2009: 9, 2010: 7, 2011: 6, 2012: 7, 2013:6, 2014:6, 2015:5, 2016:4, Color:"orange"},
  Sauber: {2006: 5, 2007:2,2008:3, 2009: 6, 2010: 8, 2011: 7, 2012: 6, 2013:7, 2014:10, 2015:8, 2016:10, Color:"navy"},
  ToroRosso: {2006: 9, 2007:7,2008:6, 2009: 10, 2010: 9, 2011: 8, 2012: 9, 2013:8, 2014:7, 2015:7, 2016:7, Color:"blue"},
  Toyota: {2006: 6, 2007:6,2008:5, 2009: 5, Color:"red"},
  Haas: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: "NaN",2014: "NaN",2015:"NaN",2016: 8, Color:"crimson"},
  SuperAguri: {2006: 11, 2007: 9, 2008: 11, Color:"red"},
  Manor: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: 12, 2011: 12, 2012: 11, 2013:10, 2014:9, 2015:10, 2016:11, Color:"red"},
  Caterham: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: 10, 2011: 10, 2012: 10, 2013:11, 2014:11, Color:"green"},
  HRT: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: 11, 2011: 11, 2012: 12, Color:"GoldenRod"},
  "": {2006: 13, 2007: 13, 2008: 13, 2009:13, 2010: 13, 2011: 13, 2012: 13, 2013:13, 2014:13, 2015:13, 2016:13, Color:"White"}
};

var teams = [{
	Ferrari: {"team":["Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari"],
  "engine":["Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari"],
		"color":["red","red","red","red","red","red","red","red","red","red","red"]},
  McLaren: {"team":["McLaren","McLaren","McLaren","McLaren","McLaren","McLaren","McLaren","McLaren","McLaren","McLaren","McLaren"],
    "engine":["Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Honda","Honda"],
		"color":["black","black","black","black","black","black","black","black","black","orange","orange"]},
  RedBull: {"team":["RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull"],
    "engine":["Ferrari","Renault","Renault","Renault","Renault","Renault","Renault","Renault","Renault","Renault","TagHeuer"],
		"color":["violet","violet","violet","violet","violet","violet","violet","violet","violet","violet","violet"]},
  Williams: {"team":["Williams","Williams","Williams","Williams","Williams","Williams","Williams","Williams","Williams","Williams","Williams"],
    "engine":["Cosworth","Toyota","Toyota","Toyota","Cosworth","Renault","Renault","Renault","Mercedes","Mercedes","Mercedes"],
		"color":["blue","blue","blue","blue","blue","blue","blue","blue","deepskyblue","deepskyblue","deepskyblue"]},
  Mercedes: {"team":["Honda","Honda","Honda","Brawn GP","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes"],
    "engine":["Honda","Honda","Honda","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes"],
		"color":["silver","silver","silver","greenyellow","gray","gray","gray","gray","gray","gray","gray"]},
  Renault: {"team":["Renault","Renault","Renault","Renault","Renault","Lotus Renault","Lotus F1","Lotus F1","Lotus F1","Lotus F1","Renault"],
    "engine":["Renault","Renault","Renault","Renault","Renault","Renault","Renault","Renault","Renault","Mercedes","Renault"],
		"color":["gold","gold","gold","gold","gold","GoldenRod","GoldenRod","GoldenRod","GoldenRod","GoldenRod","gold"]},
  ForceIndia: {"team":["Midland","Spyker","ForceIndia","ForceIndia","ForceIndia","ForceIndia","ForceIndia","ForceIndia","ForceIndia","ForceIndia","ForceIndia"],
    "engine":["Toyota","Ferrari","Ferrari","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes"],
		"color":["red","gray","orange","orange","orange","orange","orange","orange","orange","orange","orange"]},
  Sauber: {"team":["BMW Sauber","BMW Sauber","BMW Sauber","BMW Sauber","Sauber","Sauber","Sauber","Sauber","Sauber","Sauber","Sauber"],
    "engine":["BMW","BMW","BMW","BMW","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari"],
		"color":["blue","blue","blue","blue","gray","gray","gray","gray","gray","gray","gray"]},
  ToroRosso: {"team":["ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso","ToroRosso"],
    "engine":["Cosworth","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Renault","Renault","Ferrari"],
		"color":["blue","blue","blue","blue","blue","blue","blue","blue","blue","blue","blue"]},
  Haas: {"team":["","","","","","","","","","","Haas"],
    "engine":["","","","","","","","","","","Ferrari"],
		"color":["white","white","white","white","white","white","white","white","white","white","red"]},
  Manor: {"team":["","","","","Virgin","Marussia Virgin","Marussiah","Marussia","Marussia","Manor Marussia","Manor"],
    "engine":["","","","","Cosworth","Cosworth","Cosworth","Cosworth","Ferrari","Ferrari","Mercedes"],
		"color":["white","white","white","white","red","red","red","red","red","red","red"]},
  Toyota: {"team":["Toyota","Toyota","Toyota","Toyota","","","","","","",""],
    "engine":["Toyota","Toyota","Toyota","Toyota","","","","","","",""],
		"color":["red","red","red","red","white","white","white","white","white","white","white"]},
  Caterham: {"team":["","","","","Lotus","Lotus","Caterham","Caterham","Caterham","",""],
  "engine":["","","","","Cosworth","Cosworth","Renault","Renault","Renault","",""],
		"color":["white","white","white","white","green","green","green","green","green","white","white"]},
  HRT: {"team":["","","","","Hispania","Hispania","HRT","","","",""],
    "engine":["","","","","Cosworth","Cosworth","Cosworth","","","",""],
		"color":["white","white","white","white","GoldenRod","GoldenRod","GoldenRod","white","white","white","white"]},
   SuperAguri: {"team":["SuperAguri","SuperAguri","","","","","","","","",""],
   "engine":["Honda","Honda","","","","","","","","",""],
		"color":["red","red","white","white","white","white","white","white","white","white","white"]},
}];

var data = d3.entries(types).map(function(d) {
  var val = d.value;
  val.key = d.key;
  return val;
});
 
var svg = d3.select("#superformula").append("svg")
    .attr("width", 1280)
    .attr("height", 560)
    .append("g")
    .attr("transform", "translate(70,70)");

var parcoords = d3.parcoords()("#example")
  .data(data)
  .hideAxis(["Color"])
  .color(function(d,i){return d['Color'];})
  .dimensions({
    '2006':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    '2007':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    '2008':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    '2009':{
        tickValues: [1,2,3,4,5,6,7,8,9,10]
    },
    '2010':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12]
    },
    '2011':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12]
    },
    '2012':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12]
    },
    '2013':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    '2014':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    '2015':{
        tickValues: [1,2,3,4,5,6,7,8,9,10]
    },
    '2016':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11]
    },
    'key':{
        
    }
  })
  .render()
  .flipAxes(["2006", "2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","key"])
  .brushMode("1D-axes")
  .on("brush", function(items) {
    var selected = items.map(function(d) { return d.key; });
    svg.selectAll("path")
       .style("opacity", 0.2)
       .filter(function(d) { return selected.indexOf(d.key); })
       .style("opacity", 1);
    });

    var clicked = false;

    var highlightedLinks=[];
 
var path = svg
    .selectAll("path")
    .data(d3.entries(types))
    .enter()
    .append("svg:image")
    .attr('x',function(d,i) { return (230*(i%5));})
    .attr('y',function(d,i){return (140*Math.floor(i/5));})
    .attr('height', '200')
    .attr('width', '200')
    .attr("xlink:href", function(d) {
        if(d.key != "")
       return "./logos/" + d.key + ".png"; 
       }) //image source F1Fanatic.co.uk
    .on("click",function(d,i){
      highlightedLinks.push(data[i]);
		  parcoords.highlight(highlightedLinks);
      removeTeams();
		  clicked = true;
	})
    .on("mouseover", function(d,i) {
	if(clicked==false){
      parcoords.highlight([data[i]]);
      for(var i=0; i<11; i++)
  		addTeams(d.key,i);
	}
    })
    .on("mouseout", function(d,i){
      if(clicked==false){
      parcoords.unhighlight([data[i]]);
	    removeTeams();
      }
    });

    function addTeams(name,p){
		var teamBlocks = parcoords.svg.selectAll("rect[id='tooltip']")
			.data(teams)
			.enter()
			.append("rect")
			.attr("class","teamInfo")
			.attr("x", function(d){return 107*p;})
			.attr("y", 0)
			.attr("opacity",0.2)
			.attr("fill",function(d){return d[name].color[p];})
			.attr("width",100)
			.attr("height",470);

		var teamNames = svg.selectAll("text[id='tooltip']")
						.data(teams)
						.enter()
						.append("text")
						.attr("class","teamInfo")
            .attr("id","teamNames")
						.text(function(d){return d[name].team[p];})
						.attr("x", function(d){return -20+107*p;})
						.attr("y", 460)
						.attr("text-anchor", "middle");

    var engineNames = svg.selectAll("text[id='tooltip']")
						.data(teams)
						.enter()
						.append("text")
						.attr("class","teamInfo")
            .attr("id","engineNames")
						.text(function(d){return d[name].engine[p];})
						.attr("x", function(d){return -20+107*p;})
						.attr("y", 480)
						.attr("text-anchor", "middle");
	}


	function removeTeams(){
		parcoords.svg.selectAll(".teamInfo").remove();
    svg.selectAll(".teamInfo").remove();
	}

  function resetGraph(){
      parcoords.unhighlight(highlightedLinks);
      highlightedLinks=[];
      clicked=false;
  }

</script>

<script src="js/cookie_check.js"></script>

</html>