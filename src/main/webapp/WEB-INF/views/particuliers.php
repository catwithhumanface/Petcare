



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
    <link rel="stylesheet" href="assets/css/inscriptionGardien_service.css" >
    <title>Pet Care by Group 4</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">

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

        <nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.5s">
    <div class="top-bar smoothie hidden-xs">
        <div class="container">
            <div class="clearfix">
                <div class="pull-right text-right" >
                <ul class="list-inline nav navbar-nav navbar-right">
                            <li><div>
                                <?php
                                require('connexionBD.php');
                                session_start();
                                if (isSet($_SESSION['id_client'])) {
                                    echo
                                    "<a href='deconnexion.php'>Déconnexion</a><a href='profilClient.php?id_client=".$_SESSION['id_client']."'>Mon Compte</a>";
                                   
                                }else if(isSet($_SESSION['id_gardien'])){
                                    echo
                                    "<a href='deconnexion.php'>Déconnexion</a><a href='profilGardien.php?id_gardien=".$_SESSION['id_gardien']."'>Mon Compte</a>";
                                }else{
                                   echo
                                   " <a href='connexion.php'> Se Connecter</a>";
                                   
                                };?>
                                </a></div>
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
            <a class="navbar-brand smoothie logo logo-light" href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
            <a class="navbar-brand smoothie logo logo-dark" href="index.php"><img src="assets/img/logo_reverse.png" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="index.php">ACCUEIL</a>
                        </li>
                        <li class="dropdown">
                            <a href="#"  data-hover="dropdown" data-toggle="dropdown">Inscription<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="inscriptionClient.php">Client</a></li>
                                <li><a href="inscriptionGardien.php">Gardien</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"  data-hover="dropdown" data-toggle="dropdown">Services<span class="pe-7s-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="chenils.php">Chenils</a></li>
                                <li><a href="particuliers.php">Particuliers</a></li>
                            </ul>
                        </li>
                        
						<li class="dropdown">
                            <a href="Pertedechien.php">Perte de chien</a>
                           
                        </li>
                        <li class="dropdown">
                            <a href="about.php">A PROPOS</a>
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
            <div class="section-inner pad-top-200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading">PARTICULIERS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>


  

        <section>
            <div class="section-inner">
	
		<div class="container">
			
	<div class="row">
		




                         <?php

                            require('connexionBD.php');
                            $sql = "SELECT * FROM GARDIEN";
                            $result = $bdd->query($sql);
                            while($row = $result->fetch()){
                           // echo "Nom de Chenils: " . $row["CHENNOM"]. " - Adresse: " . $row["CHENADR"]. " " . $row["CHENTEL"]. "<br>";
                                echo "<div class='col-sm-4 wow fadeIn' data-wow-delay='0.2s' style='height:500px;'>
                                        <div class='icon-box-1 match-height mb30'>
                                            <img class='chenils' src =". $row["GPPIC"].">
                                            <div class='content-area'>
                                                <h3 class='title'>" . $row["prenom_gardien"]. "</h3> 
                                                <div class='content'>";
                                                        if($row["GPEVAL"] == 0){
                                                            echo"<h4>✫✫✫✫✫ </h4>";
                                                        }else if($row["GPEVAL"] == 5){
                                                             echo"<h4>✭✭✭✭✭ </h4>";
                                                        }else if($row["GPEVAL"] == 4){
                                                             echo"<h4>✭✭✭✭✫ </h4>";
                                                        }else if($row["GPEVAL"] == 3){
                                                             echo"<h4>✭✭✭✫✫ </h4>";
                                                        }else if($row["GPEVAL"] == 2){
                                                             echo"<h4>✭✭✫✫✫ </h4>";
                                                        }else if($row["GPEVAL"] == 1){
                                                             echo"<h4>✭✫✫✫✫ </h4>";
                                                        }
                                                         echo"
                                                            Adresse : ".$row["nom_voie_gardien"]." <br/>
                                                            TEL : ".$row["Tel_gardien"]." </div>";
                                                             echo" <p class='w3-large w3-text-theme'><b><i class='fa-fw w3-margin-right w3-text-teal'></i>
                                                                <button style='float:right; padding:7px 7px;  '><a href='#myModal'  data-toggle='modal' data-target='#myModal' data-idgp=".$row["id_gardien"]."> ";
                                                                
                                                                 if($row["genre_gardien"] == "Femme"){
                                                                    echo"Contacter la gardienne  </a> </button></b> </p>";
                                                                }else {
                                                                    echo"Contacter le gardien </a> </button></b> </p>";
                                                                }
                                                             //echo" <button style='float:right; padding:7px 7px;  '><a href='#myModal'  data-toggle='modal' data-target='#myModal' data-idgp=".$row["IDGP"].">Open Modal</a></button>;";
                                                    
                                                echo"
                                                </div>
                                        </div>
                                        </div>
                                        
                                        ";
                          
                       } 

			?>
            
            <?php
                if (isSet($_SESSION['id_client'])) {
                    $getid = intval($_SESSION['id_client']);
                    $reqClient = $bdd->prepare("SELECT * FROM client WHERE id_client=?");
                    $reqClient-> execute(array($getid));
                    $userInfo = $reqClient->fetch();
                }
            ?>

             <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding:3px 5px;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style="text-align:center ;    font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;"><span >ENVOYER UN MESSAGE </span></h4>
                                    </div>
                                    <div class="modal-body" style="padding:20px 30px;">
                                        <form role="form" method="POST" action="particuliers_sendmsg.php">
                                        <input type="hidden" name="idgp" value=""> 
                                            <div class="form-group">
                                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nom et Prénom</label>
                                                <input type="text" class="form-control" name="usrname" id="usrname" value="<?php if(isset($userInfo) and $userInfo != '') echo $userInfo['prenom_client']. $userInfo['nom_client'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Adresse mail</label>
                                                <input type="text" class="form-control" name="mail" id="mail" value="<?php if(isset($userInfo) and $userInfo != '') echo $userInfo['mail_client'];?>" readonly>
                                                


                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="usrname"><span class="glyphicon glyphicon-pencil"></span> Message :</label>
                                                <textarea class="form-control" row = "10" cols="50" id="msg" name="msg" ></textarea>
                                                
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success btn-block" name="MAJ"><span class="glyphicon glyphicon-off"></span>Envoyer</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </section>

     

        <section class="opaqued light-opaqued parallax">
            <div class="section-inner">
                
                </div>
            </div>
        </section>

        <div id="footer-wrapper">
            <section class="dark-wrapper">
                <div class="section-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget about-us-widget">
                                    <h4 class="widget-title"><strong>Informations</strong> Complémentaires</h4>
                                    <p>Ce site est un projet du cursus Master 1 Mention MIAGE Ingéniere Métiers de <a href="https://www.ut-capitole.fr/" target="_blank">l'Université Toulouse Capitole </a>. Il a été conçu par ses étudiants dans le but de se perfectionner dans la gestion et création d'un site web. </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title"><strong>Autres</strong> Sites</h4>
                                    <div>
                                        <div class="media">
                                            <ul><li><a href="https://www.empruntemontoutou.com/?gclid=CjwKCAiAv4n9BRA9EiwA30WND0gjCjLI_oBaON-o6RpIJL7XGQRMvC_FsncqLz8XFwd205phtP3ZsRoCxfUQAvD_BwE" target="_blank">Emprunte mon toutou</a></li>
                                                <li><a href="https://emmenetonchien.com/" target="_blank">Emmene ton chien</a></li>
                                                <li><a href="https://www.pourmonchien.fr/" target="_blank">Pour Mon Chien</a></li>
                                                <li><a href="https://www.chien.com/" target="_blank">Chien.com</a></li></ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title">Site d'information</h4>
                                    <div class="tagcloud">
                                        <a href="http://etu-web2/~21602823/Presentation_DogCare"  title="3 topics">
                                            Plus d'information sur PETCARE
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>

    </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                    $('#myModal').on('show.bs.modal', function(e) {
                    //get data-id attribute of the clicked element
                    var idgp = $(e.relatedTarget).data('idgp');
                    //populate the textbox
                    $(e.currentTarget).find('input[name="idgp"]').val(idgp);
                     })
                });
            </script>
   
</body>
    <script src="assets/js/jquery.js"></script>
	 <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/plugins_chenils.js"></script>
    <script src="assets/js/init.js"></script>
	
</html>

