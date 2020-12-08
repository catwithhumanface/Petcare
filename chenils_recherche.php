



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    <title>Pet Care by Group 4</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">
	
	
	<!--OpenstreetMap-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" 
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        
		
		<style type="text/css">
            #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                height:400px;
				width:100%;
				margin-top:100px;
				margin-bottom:80px;
            }
        </style>

<!--
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
</head>

<body id="page-top" class="index">

    <div class="master-wrapper">

        <div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading"/></span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.5s">
            <div class="top-bar smoothie hidden-xs">
                <div class="container">
                    <div class="clearfix">
                       

                        <div class="pull-right text-right">
                            <ul class="list-inline nav navbar-nav navbar-right">
                                <li>
                                    <div><a href="#">Sign in</a></div>
                                </li>
                                 <li>
                                    <div><a href="#">Sign up</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo logo-light" href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
                    <a class="navbar-brand smoothie logo logo-dark" href="index.html"><img src="assets/img/logo_reverse.png" alt="logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="index.html">Home</a>
						</li>
                        <li class="dropdown">
                            <a href="#"  data-hover="dropdown" data-toggle="dropdown">Services<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                               <li><a href="chenils.php">Chenils</a></li>
                                <li><a href="particuliers.php">Particuliers</a></li>
                            </ul>
                        </li>
						<li class="dropdown">
                            <a href="#"  data-hover="dropdown" data-toggle="dropdown">Urgences<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="urgence1.html">Urgence 1</a></li>
                                <li><a href="urgence1.html">Urgence 2</a></li>
                                <li><a href="urgence1.html">Urgence 3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="forum.html">Forum</a>
                        </li>
						<!-- à trouver dans Mon compte-->
						<!--
                        <li class="dropdown">
                            <a href="about.html">Documents
							<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="header-1.html">Carnets</a></li>
                                <li><a href="header-2.html">Mes favoris</a></li>
                            </ul>
                        </li>
						-->
                        <li class="dropdown">
                            <a href="about.html">About</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div id="search-wrapper">
            <button type="button" class="close">×</button>
            <div class="vertical-center text-center">
                <form>
                    <input type="search" value="" placeholder="Enter Search Term" />
                    <button type="submit" class="btn btn-primary btn-white">Search</button>
                </form>
            </div>
        </div>

       
        <section class="dark-wrapper opaqued parallax imgback">
            <div class="section-inner pad-top-200 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading">CHENILS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  

        <section>
            <div class="section-inner">
			
		<form action = "chenils_recherche.php" name="search_form" method="post">
			   <div class="col-xs-8 col-xs-offset-2">
					<div class="input-group" style='margin-bottom:50px; margin-left:20%; margin-right:20%; width:60%;'>
					   
						<input type="text" id ="searchterm" class="form-control" name="searchterm" placeholder="Search term...">
						<span class="input-group-btn" style='margin-right:40%;'>
							<button class="btn btn-default" type="submit">
								<img class="search_icon" src ="assets/img/search_icon" style='width:40px; heigth:auto; padding-top:10px;'>
							</button>
						</span>
					</div>
				</div>
		</form>
		<div class="container">
			
	<div class="row">
		<div id="map">
	    <!-- Ici s'affichera la carte -->
		</div>   
		<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

	<script type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
			var villes = {
				"Paris": { "lat": 48.852969, "lon": 2.349903 },
				"Brest": { "lat": 48.383, "lon": -4.500 },
				"Quimper": { "lat": 48.000, "lon": -4.100 },
				"Bayonne": { "lat": 43.500, "lon": -1.467 },
				"Toulouse": { "lat": 43.604652, "lon": 1.444209},
				"UT1" : { "lat": 43.606912214600136, "lon": 1.4371872994545967}
				}
            var lat = 43.604652;
            var lon = 1.444209;
            var macarte = null;
			var marker = null;
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lon], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20

						
                }).addTo(macarte);
				for (ville in villes) {
				var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte);
				}   

				for (ville in villes) {
					var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte);
					// Nous ajoutons la popup. A noter que son contenu (ici la variable ville) peut être du HTML
					marker.bindPopup(ville);
				}    
            }
			 
            window.onload = function(){
		// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
		initMap(); 
		
            };
       
	</script>
	




                         <?php
                      
                            $servername = "localhost";
                            $database = "petcare";
                            $username = "root";
                            $password = "mysql";

                            // Create connection

                            $conn = mysqli_connect($servername, $username, $password, $database);
                           
                            // Check connection
                            
                            $searchterm = $_POST['searchterm'];
                            // Style procédural
                            mysqli_set_charset( $conn, "utf8");

                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }else{
                            // echo "connected !";
                            }

                           $sql = "SELECT CHENNOM, CHENADR,CHENMAIL, CHENSW, CHENTEL, CHENPIC FROM CHENILS WHERE CHENNOM LIKE '%$searchterm%' OR '$searchterm%' OR '%LOWER($searchterm)%'";
                           $result = $conn->query($sql);

                           
                           if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                               // echo "Nom de Chenils: " . $row["CHENNOM"]. " - Adresse: " . $row["CHENADR"]. " " . $row["CHENTEL"]. "<br>";
                       
                                        echo "<div class='col-sm-4 wow fadeIn' data-wow-delay='0.2s' style='height:500px;'>
                                        <div class='icon-box-1 match-height mb30'>
                                            <img class='chenils' src =". $row["CHENPIC"].">
                                            <div class='content-area'>
                                                <h3 class='title'>"
                                                . $row["CHENNOM"]. "</h3> <div class='content'> <a href='javascript:popup(".$row["CHENADR"].");'> Adresse : ".$row["CHENADR"]." </a><br/>
                                                    TEL : ".$row["CHENTEL"]." </div>";
                                    
                                                    if($row["CHENSW"] == NULL){
                                     
                                                }else{
                                                    echo" <a href='". $row["CHENSW"]."'><h4 class='mailto'>Visiter le site</h4></a>";
                                                }
                                                    if($row["CHENMAIL"] == NULL){
                                                }else{
                                                    echo"  <a href='mailto:". $row["CHENMAIL"]."'><h4 class='mailto'>Envoyer un mail</h4></a>";
                                                }
                                                echo"
                                                </div>
                                        </div>
                                        </div>";
                                 }
                         }

			?>

                    </div>
                </div>
            </div>
        </section>

     

        <footer class="white-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="list-inline social-links wow">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>

                    <hr class="thin-hr" />

                    <div class="col-md-12 text-center wow">
                        <span class="copyright">Copyright 2019. Designed by DISTINCTIVE THEMES</span>
                    </div>
                </div>
            </div>
        </footer>

    </div>
   
</body>
    <script src="assets/js/jquery.js"></script>
	 <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/plugins_chenils.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>
	
</html>

