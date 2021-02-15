<?php
    session_start();
    include("connexionBD.php");
    if(isset($_GET['id_gardien']) AND $_GET['id_gardien']>0){
        $getid = intval($_GET['id_gardien']);
        $reqGardien = $bdd->prepare("SELECT * FROM gardien WHERE id_gardien=?");
        $reqGardien-> execute(array($getid));
        $userInfo = $reqGardien->fetch();
        $mesDemanes = $bdd->prepare("SELECT * FROM demandes WHERE demandes.id_gardien=?");
        $mesDemanes->execute(array($_SESSION['id_gardien']));
        $infoDemandes =$mesDemanes->fetch();
        $client = $bdd->prepare("SELECT MESSTEXTE, nom_client, prenom_client ,tel_client, mail_client FROM client,messages WHERE client.id_client=messages.id_client AND messages.id_gardien=?");
        $client ->execute(array($_SESSION['id_gardien']));
        $reCli = $client->fetchAll();
       
        $reqChien =$bdd->prepare("SELECT CNOM, CSEXE, CTAILLE, CPOIDS, CDN, chiens.id_client, IDR FROM chiens,client,demandes WHERE chiens.id_client=client.id_client AND client.id_client=demandes.id_client AND demandes.id_gardien=?");
        $reqChien->execute(array($_SESSION['id_gardien']));
        $chienInfo= $reqChien->fetch();
        $racess = $bdd->prepare("SELECT RNOM FROM races,chiens,client,demandes WHERE races.IDR=chiens.IDR AND chiens.id_client=client.id_client AND client.id_client=demandes.id_client AND demandes.id_gardien=?");
        $racess->execute(array($_SESSION['id_gardien']));
        $racesInfo =$racess->fetch();

        $repProfil = $bdd->prepare("SELECT * FROM profil_gardien_complete WHERE profil_gardien_complete.id_gardien =?");
        $repProfil->execute(array($_SESSION['id_gardien']));
        
        if(isset($_POST['MAJ'])){
            $adresse = htmlspecialchars($_POST['adresse']);
            $photoModif = $_FILES['photos']['name'];
            $extensions = array('jpg', 'png','jpeg');
           // Dossier des images
            $importer= "assets/uploads/".$photoModif; 
            move_uploaded_file($_FILES['photos']['tmp_name'],$importer);   
            if(!empty($_POST['adresse'])){
                $insertTout = $bdd->prepare("UPDATE profil_gardien_complete SET adresse_gardien =? WHERE profil_gardien_complete.id_gardien=?");
                $insertTout ->execute(array( $adresse,$_SESSION['id_gardien']));
             }
             if(!empty($photoModif) AND $extensions){
                    $insertTout = $bdd->prepare("UPDATE profil_gardien_complete SET photo_gardien = ? WHERE profil_gardien_complete.id_gardien=?");
                    $insertTout ->execute(array($photoModif,$_SESSION['id_gardien']));                
             }else{
                 $erreur="Attention! Vérifiez que l'image a bien été selectionnée et l'extention valide";
             }
            
            
        }
        $profilInfo = $repProfil->fetch();
        if(isset($_POST['modifierPhoto'])){
            $repPhoto = $bdd->prepare("SELECT photo_gardien FROM profil_gardien_complete WHERE profil_gardien_complete.id_gardien =?");
            $repPhoto->execute(array($_SESSION['id_gardien'])); 
            $photoInfo = $repPhoto->fetch();                 
        } 
           
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profil du Gardien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/profil.css">
        <link rel="stylesheet" href="assets/css/inscriptionGardien.css">
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
                                <input type="" value=" <?php echo $userInfo['nom_gardien'];?>" readonly>
                            </p>
                            <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Prénom :</strong>   
                                <input type="text" readonly value="<?php echo $userInfo['prenom_gardien']?>" >  
                            </p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Adresse mail :</strong>  
                                <input type="text" value=" <?php echo $userInfo['mail_gardien'];?>" readonly>
                            </p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>    
                                <strong> Contact :</strong>
                                <input type="text" value=" <?php echo $userInfo['Tel_gardien'];?>" readonly>
                            </p>
                            <p><i class="fa fa-address-card fa-fw w3-margin-right w3-large w3-text-teal"></i>
                               <strong>Rue :</strong> 
                                <input type="text" readonly value="<?php echo $userInfo['num_rue_gardien'] ;?>">
                            </p>
                            <p><i class="fa fa-address-card fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Voie :</strong>
                                <input type="text" readonly value="<?php echo $userInfo['nom_voie_gardien'] ;?>">
                            </p>
                            <p><i class="fa fa-address-card fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                <strong>Code postal :</strong>
                                <input type="text" readonly value="<?php echo $userInfo['code_postal_gardien'] ;?>">
                            </p>
                            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
                              <strong>  Genre :</strong>
                                <input type="text" readonly value="<?php echo $userInfo['genre_gardien'];?>">
                            </p>                           
                            <hr>
                            <p class="w3-large w3-text-theme"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>
                                <button><a href="#" type="button" data-toggle="modal" data-target="#myModal">Modifier mon profil</a> </button> 
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
                                    <h4 style="text-align:center;"><span class="glyphicon glyphicon-edit">Modification du profil de <?php echo $userInfo['prenom_gardien'];?></span></h4>
                                </div>
                                <div class="modal-body" style="padding:20px 30px;">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nom et Prénom</label>
                                            <input type="text" class="form-control" id="usrname" value=" <?php echo $userInfo['nom_gardien'] . " ". $userInfo['prenom_gardien'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Adresse mail</label>
                                            <input type="text" class="form-control" id="mail" value=" <?php echo $userInfo['mail_gardien'] . " ". $userInfo['prenom_gardien'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-phone"></span> Numéro de téléphone</label>
                                            <input type="tel" class="form-control" id="phones" name="phones" value=" <?php echo $userInfo['Tel_gardien'] ;?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label for="usrname"><span class="glyphicon glyphicon-map-marker"></span>Modififer la rue</label>
                                            <input type="text" class="form-control" id="adresse" name="adresse" value="" placeholder="Entrez votre nouvelle rue">
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
                        Bienvenue <?php echo $userInfo['nom_gardien'] . " ". $userInfo['prenom_gardien'];?>
                        </h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Présentation</b></h5>
                            <p>Bonjour <?php echo $userInfo['nom_gardien'] . " ". $userInfo['prenom_gardien'];?>. Je suis cheffe de l'entreprise chez <?php echo  $userInfo['prenom_gardien']?>Tech spécialisée dans le développement.
                               Je fais aussi le gardiennage pendant mon freetime. 
                            </p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Expériences Sur les chiens</b></h5>
                            <p>J'ai 5ans d'expériences </p>                 
                            <hr>
                        </div>
                            <div class="w3-container">
                            <h5 class="w3-opacity"><b>Mes disponibilités</b></h5>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Lundi  15h - 18h</h6>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jeudi  10h - 12h</h6>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mercredi 15 - 16h</h6>
                        </div>
                    </div>
                    <div class="w3-container w3-card w3-white">
                        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Mes Messages</h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><?php foreach ($reCli as $output){ echo '<p>Client :'. $output['nom_client'] . " " .$output['prenom_client']. '</p>
                            <p> Tel : '. $output['tel_client']. '</p>
                             <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>' .$output['MESSTEXTE'] .'</h6><br/>';}?>
                            </b></h5>
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
<?php  }?>  
