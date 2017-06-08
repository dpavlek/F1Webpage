<!DOCTYPE html>
<html lang="en">

<?php session_start();?>

  <head>
    <title>F1 Standings</title>
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
                        <li  class="active"><a href="rezultati_vozaci.php">Vozači</a></li>
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

<script>
 
var drivers = {
  ROS: {2006: 17, 2007:9, 2008: 13, 2009: 7, 2010: 7, 2011: 7, 2012: 9, 2013:6, 2014:2, 2015:2, 2016:1, Color:"gray",First:"Nico",Last:"Rosberg"},
  HAM: {2006: "NaN", 2007:2, 2008: 1, 2009: 5, 2010: 4, 2011: 5, 2012: 4, 2013:4, 2014:1, 2015:1, 2016:2,Color:"gray",First:"Lewis",Last:"Hamilton"},
  RIC: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: 27, 2012: 18, 2013: 14, 2014:3, 2015:8, 2016:3,Color:"purple",First:"Daniel",Last:"Ricciardo"},
  VET: {2006: "NaN",2007:14, 2008: 8, 2009: 2, 2010:1, 2011: 1, 2012:1, 2013:1, 2014:5, 2015:3, 2016:4,Color:"red",First:"Sebastian",Last:"Vettel"},
  VER: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: "NaN",2014: "NaN",2015:12, 2016:5,Color:"purple",First:"Max",Last:"Verstappen"},
  RAI: {2006: 5, 2007:1, 2008: 3, 2009: 6,2010:30,2011:30, 2012: 3, 2013:5, 2014:12, 2015:4, 2016:6,Color:"red",First:"Kimi",Last:"Raikkonen"},
  PER: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: 16, 2012: 10, 2013: 11, 2014:10, 2015:9, 2016:7,Color:"orange",First:"Sergio",Last:"Perez"},
  BOT: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: 17, 2014: 4, 2015:5, 2016:8,Color:"DeepSkyBlue",First:"Valteri",Last:"Bottas"},
  HUL: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: 14, 2012:11, 2013:10, 2014:9, 2015:10, 2016:9,Color:"orange",First:"Nico",Last:"Hulkenberg"},
	ALO: {2006: 1, 2007:3, 2008: 5, 2009: 9, 2010: 2, 2011: 4, 2012: 2, 2013:2, 2014:6, 2015:17, 2016:10,Color:"black",First:"Fernando",Last:"Alonso"},
  MAS: {2006: 3, 2007:4, 2008: 2, 2009: 11, 2010: 6, 2011: 6, 2012: 7, 2013:8, 2014:7, 2015:6, 2016:11,Color:"DeepSkyBlue",First:"Felipe",Last:"Massa"},
  SAI: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: "NaN",2014: "NaN",2015: 15, 2016:12,Color:"blue",First:"Carlos",Last:"Sainz"},
  GRO: {2006: "NaN",2007: "NaN",2008: "NaN",2009: 23,2010: 30,2011: 30, 2012:8, 2013:7, 2014:14, 2015:11, 2016:13,Color:"gray",First:"Romain",Last:"Grosjean"},
  KVY: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: "NaN",2014: 15, 2015:7, 2016:14,Color:"blue",First:"Daniil",Last:"Kvyat"},
  BUT: {2006: 6, 2007:15, 2008: 18, 2009: 1, 2010: 5, 2011: 2, 2012: 5, 2013:9, 2014:8, 2015:16, 2016:15,Color:"black",First:"Jenson",Last:"Button"},
  MAG: {2006: "NaN",2007: "NaN",2008: "NaN",2009: "NaN",2010: "NaN",2011: "NaN",2012: "NaN",2013: "NaN",2014: 19, 2015:22, 2016:16,Color:"gray",First:"Kevin",Last:"Magnussen"},
	MSC: {2006: 2,2007:30, 2008:30,2009:30, 2010: 9, 2011: 8, 2012: 13,2013:30,2014:30, 2015:30, 2016:30,Color:"red",First:"Michael",Last:"Schumacher"},
  WEB: {2006: 14, 2007:12, 2008: 11, 2009: 4, 2010: 3, 2011: 3, 2012: 6, 2013:3,2014:30,2015:30,2016:30,Color:"blue",First:"Mark",Last:"Webber"},
  BAR: {2006: 7, 2007:20, 2008: 14, 2009: 3, 2010: 10, 2011: 17,2012:30,Color:"red",First:"Rubens",Last:"Barrichello"},
	FIS: {2006: 4, 2007:8, 2008: 19, 2009: 15,Color:"green",First:"Giancarlo",Last:"Fisichella"},
	HEI: {2006: 9, 2007:5, 2008: 6, 2009: 13, 2010: 18, 2011: 11,Color:"black",First:"Nick",Last:"Heidfeld"},
	PDR: {2006: 11, 2010: 17, 2011: 20, 2012: 25,Color:"red",First:"Pedro",Last:"De La Rosa"},
	TRU: {2006: 12, 2007:13, 2008: 9, 2009: 8, 2010: 21, 2011: 21,Color:"green",First:"Jarno",Last:"Trulli"},
	KUB: {2006: 16, 2007:6, 2008: 4, 2009: 14, 2010: 8,Color:"GoldenRod",First:"Robert",Last:"Kubica"},
  "": {2006: 30, Color:"White"}
};

var teams = [{
	ROS: {"team":["Williams","Williams","Williams","Williams","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes","Mercedes"],
		"color":["DeepSkyBlue","DeepSkyBlue","DeepSkyBlue","DeepSkyBlue","gray","gray","gray","gray","gray","gray","gray"]},
		
	HAM: {"team":["","Mclaren","Mclaren","Mclaren","Mclaren","Mclaren","Mclaren","Mercedes","Mercedes","Mercedes","Mercedes"],
		"color":["white","black","black","black","black","black","black","gray","gray","gray","gray"]},
		
	RIC: {"team":["","","","","","ToroRosso","ToroRosso","ToroRosso","RedBull","RedBull","RedBull"],
			"color":["white","white","white","white","white","blue","blue","blue","purple","purple","purple"]},
		
	VET: {"team":["","ToroRosso","ToroRosso","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","Ferrari","Ferrari"],
			"color":["white","blue","blue","purple","purple","purple","purple","purple","purple","red","red"]},
		
	VER: {"team":["","","","","","","","","","ToroRosso","RedBull"],
			"color":["white","white","white","white","white","white","white","white","white","blue","purple"]},
		
	RAI: {"team":["Mclaren","Ferrari","Ferrari","Ferrari","","","Lotus","Lotus","Ferrari","Ferrari","Ferrari"],
			"color":["black","red","red","red","white","white","gold","gold","red","red","red"]},
		
	PER: {"team":["","","","","","Sauber","Sauber","McLaren","ForceIndia","ForceIndia","ForceIndia"],
			"color":["white","white","white","white","white","navy","navy","black","orange","orange","orange"]},
		
	BOT: {"team":["","","","","","","Williams","Williams","Williams","Williams"],
			"color":["white","white","white","white","white","white","white","DeepSkyBlue","DeepSkyBlue","DeepSkyBlue","DeepSkyBlue"]},
		
	HUL: {"team":["","","","","Williams","ForceIndia","ForceIndia","Sauber","ForceIndia","ForceIndia","ForceIndia"],
			"color":["white","white","white","white","DeepSkyBlue","orange","orange","navy","orange","orange","orange"]},
		
	"ALO": {"team":["Renault","Mclaren","Renault","Renault","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Mclaren","Mclaren"],
			"color":["yellow","black","yellow","yellow","red","red","red","red","red","black","black"]},
		
  "MAS": {"team":["Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Ferrari","Williams","Williams","Williams"],
			"color":["red","red","red","red","red","red","red","red","DeepSkyBlue","DeepSkyBlue","DeepSkyBlue"]},
		
  "SAI": {"team":["","","","","","","","","","ToroRosso","ToroRosso"],
			"color":["white","white","white","white","white","white","white","white","white","blue","blue"]},
		
  "GRO": {"team":["","","","Renault","","","Lotus","Lotus","Lotus","Lotus","Haas"],
			"color":["white","white","white","yellow","white","white","gold","gold","gold","gold","crimson"]},
		
		
  "KVY": {"team":["","","","","","","","","ToroRosso","ToroRosso","ToroRosso"],
			"color":["white","white","white","white","white","white","white","white","blue","blue","blue"]},
		
  "BUT": {"team":["Honda","Honda","Honda","Brawn","Mclaren","Mclaren","Mclaren","Mclaren","Mclaren","Mclaren","Mclaren"],
			"color":["silver","silver","silver","greenyellow","black","black","black","black","black","black","black"]},
		
  "MAG": {"team":["","","","","","","","","Mclaren","Mclaren","Renault"],
			"color":["white","white","white","white","white","white","white","white","black","black","yellow"]},
		
	"MSC": {"team":["Ferrari","","","","Mercedes","Mercedes","Mercedes","","","",""],
			"color":["red","white","white","white","gray","gray","gray","white","white","white","white"]},
		
  "WEB": {"team":["Williams","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","RedBull","","",""],
			"color":["DeepSkyBlue","purple","purple","purple","purple","purple","purple","purple","white","white","white"]},
		
  "BAR": {"team":["Honda","Honda","Honda","Brawn","Williams","Williams","","","","",""],
			"color":["silver","silver","silver","greenyellow","DeepSkyBlue","DeepSkyBlue","white","white","white","white","white"]},
	  
	"FIS": {"team":["Renault","Renault","ForceIndia","ForceIndia","","","","","","",""],
			"color":["yellow","yellow","orange","orange","white","white","white","white","white","white","white"]},
		
	"HEI": {"team":["Sauber","Sauber","Sauber","Sauber","Sauber","Renault","","","","",""],
			"color":["navy","navy","navy","navy","navy","yellow","white","white","white","white","white"]},
		
		
	"PDR": {"team":["Mclaren","","","","Sauber","Sauber","HRT","","","",""],
			"color":["black","white","white","white","navy","navy","red","white","white","white","white"]},
		
	"TRU": {"team":["Toyota","Toyota","Toyota","Toyota","Lotus","Lotus","","","","",""],
			"color":["red","red","red","red","green","green","white","white","white","white","white"]},
		
	"KUB": {"team":["Sauber","Sauber","Sauber","Sauber","Renault","","","","","",""],
			"color":["navy","navy","navy","navy","yellow","white","white","white","white","white","white"]}
}];

var data = d3.entries(drivers).map(function(d) {
  var val = d.value;
  val.key = d.key;
  return val;
});
 
var svg = d3.select("#superformula").append("svg")
    .attr("width", 1280)
    .attr("height", 480)
    .append("g")
    .attr("transform", "translate(70,70)");

var teamNamesHeader = d3.select("#header").append("svg")
			.attr("width",1280)
			.attr("height",50)
			.append("g")

var parcoords = d3.parcoords()("#example")
  .data(data)
  .color(function(d,i){return d['Color'];})
  .dimensions({
    '2006':{
        domain:[0,27],
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27]
    },
    '2007':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
    },
    '2008':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
    },
    '2009':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
    },
    '2010':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27]
    },
    '2011':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
    },
    '2012':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
    },
    '2013':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
    },
    '2014':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]
    },
    '2015':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
    },
    '2016':{
        tickValues: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]
    }
  })
  .render()
  .brushMode("1D-axes")
  .hideAxis(["Color", "First", "Last"])
  .flipAxes(["2006", "2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","key"])
  .on("brush", function(items) {
    var selected = items.map(function(d) { return d.key; });
    svg.selectAll("path")
       .style("opacity", 0.2)
       .filter(function(d) { return selected.indexOf(d.key) > -1; })
       .style("opacity", 1);
    });
	
 var clicked = false;
 
var path = svg
    .selectAll("path")
    .data(d3.entries(drivers))
    .enter()
    .append("svg:image")
    .attr('x',function(d,i) { return (140*(i%8));})
    .attr('y',function(d,i){return (140*Math.floor(i/8));})
    .attr('height', '100')
    .attr('width', '100')
    .attr("xlink:href", function(d) { return "./helmets/" + d.key + ".png"; }) //image source F1Fanatic.co.uk
    .on("mouseover", function(d,i) {
	if(clicked==false){
      parcoords.highlight([data[i]]);
      for(var i=0; i<11; i++)
  		addTeams(d.key,i);
	}
    })
    .on("mouseout", function(d,i){
      parcoords.unhighlight([data[i]]);
	  removeTeams();
    });

  var DriverNames = svg
      .selectAll("path")
      .data(data)
      .enter()
      .append("text")
      .attr('x',function(d,i) { return (140*(i%8))+50;})
      .attr('y',function(d,i){return (140*Math.floor(i/8)+120);})
      .attr('text-anchor','middle')
      .text(function(d){return d["First"] + " " + d["Last"];})
      .on("mouseover", function(d,i) {
      parcoords.highlight([data[i]]);
	  for(var i=0; i<11; i++)
  		addTeams(d.key,i);
    })
    .on("mouseout", function(d,i){
      parcoords.unhighlight([data[i]]);
	  removeTeams();
    });

    window.onresize = function() {
    if($(window).width()>1280){
    $(".container").width(1280);
    }
    else{
    $(".container").width($(window).width());
    parcoords.width($(".container").width());
    parcoords.resize()
    .render()
    .brushMode("1D-axes");
    }
     };
	
	function addTeams(name,p){
		var teamBlocks = parcoords.svg.selectAll("rect[id='tooltip']")
			.data(teams)
			.enter()
			.append("rect")
			.attr("class","teamInfo")
			.attr("x", function(d){
                if($(window).width()<1280){
                    return ($("#example").width()/12)*p;
                }
                else 
                    return 107*p;
            })
			.attr("y", 0)
			.attr("opacity",0.2)
			.attr("fill",function(d){return d[name].color[p];})
			.attr("width",function(d){
                if($(window).width()<1280){
                    return $("#example").width()/13;
                }
                else{
                    return 100;
                }
            })
			.attr("height",470);

		var teamNames = parcoords.svg.selectAll("text[id='tooltip']")
						.data(teams)
						.enter()
						.append("text")
						.attr("class","teamInfo")
						.text(function(d){return d[name].team[p];})
						.attr("x", 50+107*p)
						.attr("y", -15)
						.attr("text-anchor", "middle");
	}

	function removeTeams(){
		parcoords.svg.selectAll(".teamInfo").remove();
	}

      </script>
  </body>

  <script src="js/cookie_check.js"></script>

</html>
