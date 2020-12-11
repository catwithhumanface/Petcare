
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

        <!-- Header -->
        <header id="headerwrap" class="backstretched no-overlay fullheight">
            <div class="container vertical-center">
                <div class="intro-text vertical-center text-left smoothie">
                    <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s">Bienvenu dans PetCare</div>
                    <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s">Nous somme ici pour vos <span class="rotate">Meilleurs amis, toutous, compagnons de toujours, canailles </span></div>
                    <a href="about.html" class="btn btn-primary btn-white mt30 page-scroll" data-wow-delay="0.6s">Apprenez-en plus</a>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-sm-6 nopadding-lr match-height white-bg" data-mh="promo-inner">
                <div class="section-inner pad-sides-60 promo-inner">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h3 class="mt0">A la recherche d'un gardien</h3>
                        <p class="lead">Petcare sert à mettre en relation les maîtres de chiens aux chenils, ou personnes pouvant garder vos amis canins grâce à sa communauté.</p>
                        <p>Inscrivez vous pour profitez et renseignez les informations de votre chien.<br>Vous n'avez pas de chien et souhaitez en garder vous étes le bienvenu.<br>Retrouvez tous les chenils de la region ainsi que leurs avis.</p>
                        <p class="mt30"><a href="particuliers.php" class="btn btn-primary btn-white page-scroll">Find Out More</a></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 nopadding-lr dark-wrapper remove-opacqued-bg opaqued background-cover match-height" style="background-image: url('assets/img/bg/app1.jpg');" data-mh="promo-inner">
                <div class="dark-opaqued section-inner pad-sides-60 text-right promo-inner"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 nopadding-lr dark-wrapper remove-opacqued-bg opaqued background-cover match-height" style="background-image: url('assets/img/bg/bg6.jpg');" data-mh="promo-inner">
                <div class="dark-opaqued section-inner pad-sides-60 text-right promo-inner"></div>
            </div>

            <div class="col-sm-6 nopadding-lr match-height" data-mh="promo-inner">
                <div class="section-inner pad-sides-60 promo-inner">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h3 class="mt0">Urgences</h3>
                        <p class="lead">Il n'y rien de plus terrible que de perdre son chien. PetCare veut que sa communauté puisse s'entre-aider dans ce moment terrible.</p>
                        <p>La rubrique Perte de chiens permet à ceux ayant perdu leurs chiens de laisser un avis de recherche.<br>L'avis de recherche peut être vu par les visiteurs agrandissant la chance de retrouver le chien. </p>
                        <p class="mt30"><a href="Pertedechien.php" class="btn btn-primary btn-white page-scroll">Find Out More</a></p>
                    </div>
                </div>
            </div>
        </div>

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

   

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
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