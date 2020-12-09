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

    <title>DogCare</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

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
                <div class="pull-right text-right" >
                    <ul class="list-inline nav navbar-nav navbar-right">
                         <li>
                            <div><a href="connexion.php">Se Connecter</a></div>
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
                    <a href="index.php">ACCUEIL</a>
                </li>
                <li class="dropdown">
                    <a href="#"  data-hover="dropdown" data-toggle="dropdown">Services<span class="pe-7s-angle-down"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="chenils.php">Chenils</a></li>
                        <li><a href="particuliers.php">Particuliers</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"  data-hover="dropdown" data-toggle="dropdown">Inscription<span class="pe-7s-angle-down"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="inscriptionClient.php">Client</a></li>
                        <li><a href="inscriptionGardien.php">Gardien</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="Pertedechien.php">Perte de chien</a>
                   
                </li>
                <li class="dropdown">
                    <a href="about.html">A PROPOS</a>
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
                            <h2 class="section-heading">Perte de chiens</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                            <div style="paddiing-bottom:30px; margin-left:600px;">
                                    <button onclick="location.href='Pertedechien1.php'" type="button">
                                    Déclarer une perte</button>
                             </div>
                        <?php
                         require('connexionBD.php');

                          $sql="SELECT * FROM pertechien";
                           
                          $result = $bdd->query($sql);
                           while($row = $result->fetch()){
                              

                             echo '
                             <div style="float:left; padding: 20px 20px;">
                             <table style="width:300px; height:100px;">
                                        <tr>
                                            <td colspan=2><h2 class="post-title">'.$row['NOMCHIENP'].'</h2> </td>
                                        </tr>
                                        <tr>
                                            <td><h6>Race</h6></td>
                                            <td>'.$row['RACEP'].'</td>
                                        </tr>
                                        <tr>
                                            <td><h6>Description</h6></td>
                                            <td colspan=2 >'.$row['DESCP'].'</td>
                                        </tr>
                                        <tr>
                                            <td><h6>Lieu de perte</h6></td>
                                            <td colspan=2 >'.$row['LIEUP'].'</td>
                                        </tr>
                                        <tr>
                                            <td><h6>Contact</h6></td>
                                            <td colspan=2 >
                                            <table>
                                                <tr>
                                                    <td><a href="mailto:'.$row['MAILP'].'">Email :'.$row['MAILP'].'</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Num :'.$row['NUMP'].'</td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                      
                            </table>
                            </div>';  }?>  
                            
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
                                        <a href="http://etu-web2/~22003366/petcare"  title="3 topics">
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


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins_chenils.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    $(document).ready(function() {
        'use strict';
        jQuery('#headerwrap').backstretch([
            "assets/img/bg/bg1.jpg",
            "assets/img/bg/bg2.jpg",
            "assets/img/bg/bg3.jpg"
        ], {
            duration: 8000,
            fade: 500
        });
    });
    </script>

</body>

</html>
