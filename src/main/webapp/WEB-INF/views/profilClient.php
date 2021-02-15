<?php
    session_start();
    include("connexionBD.php");
    if(isset($_GET['id_client']) AND $_GET['id_client']>0){
        $getid = intval($_GET['id_client']);
        $reqClient = $bdd->prepare("SELECT * FROM client WHERE id_client=?");
        $reqClient-> execute(array($getid));
        $userInfo = $reqClient->fetch();
        $repProfil = $bdd->prepare("SELECT * FROM profil_client_complete WHERE profil_client_complete.id_client =?");
        $repProfil->execute(array($_SESSION['id_client']));
      
        if(isset($_POST['MAJ'])){
            $adresse = htmlspecialchars($_POST['adresse']);
            $photoModif = $_FILES['photos']['name'];
            $extensions = array('jpg', 'png','jpeg');
           // Dossier des images
            $importer= "assets/uploads/".$photoModif; 
            move_uploaded_file($_FILES['photos']['tmp_name'],$importer);     
            if(!empty($_POST['adresse'])){
                $insertTout = $bdd->prepare("UPDATE profil_client_complete SET adresse_client =? WHERE profil_client_complete.id_client=?");
                $insertTout ->execute(array( $adresse,$_SESSION['id_client']));
             }
             if(!empty($photoModif) AND $extensions){
                    $insertTout = $bdd->prepare("UPDATE profil_client_complete SET photo_client = ? WHERE profil_client_complete.id_client=?");
                    $insertTout ->execute(array($photoModif,$_SESSION['id_client']));                
             }else{
                 $erreur="Attention! Vérifiez que l'image a bien été selectionnée et l'extention valide";
             }
        }
            $profilInfo = $repProfil->fetch();
            if(isset($_POST['modifierPhoto'])){
                $repPhoto = $bdd->prepare("SELECT photo_client FROM profil_client_complete WHERE profil_client_complete.id_client =?");
                $repPhoto->execute(array($_SESSION['id_client'])); 
                $photoInfo = $repPhoto->fetch();                 
            } 

            $reqChien =$bdd->prepare("SELECT *  FROM chiens WHERE chiens.id_client=?");
            $reqChien->execute(array($_SESSION['id_client']));
            $chienInfo= $reqChien->fetch();

            $racess = $bdd->prepare("SELECT RNOM FROM races,chiens,client WHERE races.IDR=chiens.IDR AND chiens.id_client=client.id_client AND chiens.id_client=?");
            $racess->execute(array($_SESSION['id_client']));
            $racesInfo =$racess->fetch();
           
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profil du Client</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/profil.css">
        <link rel="stylesheet" href="assets/css/inscriptionGardien.css" >
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <link href="assets/css/plugins.css" rel="stylesheet">
    
    </head>
    <body class="w3-light-grey">
    <div class="container">
        <div class="navbar-wrapper">
        
            <div class="w3-content w3-margin-top" style="max-width:1400px;">
                <div class="w3-row-padding">
                    <div class="w3-third">
                        <div class="w3-white w3-text-grey w3-card-4">
                            <div class="w3-display-container">
                                <form action="" method="POST">
                                    <img src= "assets/images/img_avatar.png" style="width:100%" alt="Avatar" id="" name="profile" value="">
                                    <button type="submit" class="btn btn-success btn-block" name="modifierPhoto"><span class="glyphicon glyphicon-off"></span> Mettre à jour</button>
                                </form>
                            </div>
                        <div class="w3-container">
                            <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong> Nom </strong> :
                                <input type="" value=" <?php echo $userInfo['nom_client'];?>" readonly>
                            </p>
                            <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Prénom :</strong>   
                                <input type="text" readonly value="<?php echo $userInfo['prenom_client']?>" >  
                            </p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Adresse mail :</strong>  
                                <input type="text" value=" <?php echo $userInfo['mail_client'];?>" readonly>
                            </p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>    
                                <strong> Contact :</strong>
                                <input type="text" value=" <?php echo $userInfo['tel_client'];?>" readonly>
                            </p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>    
                                <strong id="adresseLabel"> Adresse :</strong>
                                <input type="text"  id="adresseVal" value="<?php echo $profilInfo['adresse_client'];?>" readonly>
                            </p>                             
                            <hr>
                            <p class="w3-large w3-text-theme"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>
                                <button><a href="#" type="button" data-toggle="modal" data-target="#myModal">Compléter mon profil</a> </button> 
                               </b>
                            </p>
                            <p class="w3-large w3-text-theme"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>
                                <button><a href="deconnexion.php">Déconnexion</a> </button>
                                </b>
                            </p>
                            <p class="w3-large w3-text-theme"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>
                                <button><a href="index.php">Page d'accueil</a> </button>
                                </b>
                            </p>
                            <br>
                        </div>
                    </div><br>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header" style="padding:3px 5px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 style="text-align:center;"><span class="glyphicon glyphicon-edit">Modification du profil de <?php echo $userInfo['prenom_client'];?></span></h4>
                                </div>
                                <div class="modal-body" style="padding:20px 30px;">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nom et Prénom</label>
                                            <input type="text" class="form-control" id="usrname" value=" <?php echo $userInfo['nom_client'] . " ". $userInfo['prenom_client'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Adresse mail</label>
                                            <input type="text" class="form-control" id="mail" value=" <?php echo $userInfo['mail_client'] . " ". $userInfo['prenom_client'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-phone"></span> Numéro de téléphone</label>
                                            <input type="tel" class="form-control" id="phones" name="phones" value=" <?php echo $userInfo['tel_client'] ;?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-map-marker"></span>Ajoutez une Adresse</label>
                                            <input type="text" class="form-control" id="adresse" name="adresse" value="" placeholder="Entrez votre adresse">
                                        </div>   
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-map-marker"></span>Télécharger une photo</label>
                                            <input type="hidden" class="form-control" id="size" name="size" value="">
                                            <input type="file" class="form-control" id="adresse" name="photos" value="">
                                        </div>                                          
                                        <button type="submit" class="btn btn-success btn-block" name="MAJ"><span class="glyphicon glyphicon-off"></span> Mettre à jour</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-twothird">
                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>
                            Bienvenue  <?php echo $userInfo['nom_client'] . " ". $userInfo['prenom_client'];?>
                        </h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Présentation</b></h5>
                            <p>Bonjour je m'appelle <?php echo $userInfo['nom_client'] . " ". $userInfo['prenom_client'];?>. Je suis chef d'entreprise chez <?php echo $userInfo['prenom_client']?>Tech et père de 3 petites filles.
                               Je suis un client de l'entreprise DogCare depuis plus d'une année maintenant. Je suis très satisfait des services que l'entreprise offres. Les services sont fiables et rassurants. 
                            </p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Informations sur mon chien</b></h5>
                            <p>Mon chien s'appelle <strong><?php echo $chienInfo['CNOM'];?></strong> . Il est né le <strong><?php echo $chienInfo['CDN'];?></strong>à Cugnaux. Il appartient à la race <strong><?php echo $racesInfo['RNOM'];?></strong>.</p>
                            <p>Il est allergique au PIMENT et à la LUMIERE. En ce jour, il n'a aucune maladie grave. Il se sent juste un peu seul raison pour laquelle je suis entré en contact avec l'entreprise DOGCARE.</p>
                            <p>Je travaille tous les jours donc je n'ai pas assez de temps pour lui. Merci pour votre accompagnement</p>
                            <hr>
                        </div>

                        <strong></strong>

                    </div>
                    <div class="w3-container w3-card w3-white">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Voici quelques images de <strong><?php echo $chienInfo['CNOM'];?></strong></h2>
                        <div class="w3-container" data-wow-delay="0.4s" >
                            <img src="assets/images/3.jpg" alt="" id="masuperimage" >
                            <img src="assets/images/2.jpg" alt=" " id="masuperimage">
                            <img src="assets/images/téléchargement.jpg" alt="" id="masuperimage">
                            <img src="assets/images/4.jpg" alt="" id="masuperimage">
                             <script>
                                    // Un tableau qui va contenir toutes tes images.
                                    var images = new Array();
                                    images.push("assets/images/3.jpg");
                                    images.push("assets/images/2.jpg");
                                    images.push("assets/images/1.jpg");
                                    images.push("assets/images/téléchargement.jpg");          
                                    var pointeur = 0;         
                                    function ChangerImage(){
                                        document.getElementById("masuperimage").src = images[pointeur];       
                                        if(pointeur < images.length - 1){
                                            pointeur++;
                                        }
                                        else{
                                            pointeur = 0;
                                        }           
                                        setTimeout("ChangerImage()", 10000)
                                        }       
                                        // Charge la fonction
                                        window.onload = function(){
                                        ChangerImage();
                                    }                                 
                             </script>  
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="w3-container w3-teal w3-center w3-margin-top">
            <p>Retrouvez-nous sur </p>
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
            <p>Powered by <a href="#" target="_blank">Team 4</a></p>
        </footer>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php  }


?>  
