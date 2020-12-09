<?php
//Initialisation de la session
session_start();
    //Initiation de la connexion à la base de données
     include("connexionBD.php");
     $sql = "SELECT designation_role FROM roles"; //Recupérer les roles
     $stmt = $bdd->prepare($sql);
     $stmt->execute();
     $results = $stmt->fetchAll();
     if(isset($_POST['connexionUser'])){
         $loginConnect = htmlspecialchars($_POST['loginConnect']); 
         $mdpConnect = sha1($_POST['mdpConnect']);
         $role = $_POST['role'];  
        if($role=='Client'){
            $reqClient = $bdd-> prepare("SELECT * FROM client WHERE mail_client=? AND password_client=?" );
            $reqClient->execute(array($loginConnect,$mdpConnect));
            $ClientExist  = $reqClient->rowCount();
            if($ClientExist == 1){ 
                $ClientInfo = $reqClient->fetch();
                $_SESSION['id_client'] = $ClientInfo['id_client'];
                header("Location:profilClient.php?id_client=".$_SESSION['id_client']);
            }else{
                    $erreur = "Mauvais identifiants (Mot de passe ou mail incorrect";
            }
        }else if($role=='Gardien'){
            $reqGardien = $bdd-> prepare("SELECT * FROM gardien WHERE mail_gardien=? AND password_gardien=?");
            $reqGardien->execute(array($loginConnect,$mdpConnect));
            $GardienExist  = $reqGardien->rowCount();
            if($GardienExist == 1){
                $GardienInfo = $reqGardien->fetch();
                $_SESSION['id_gardien'] = $GardienInfo['id_gardien'];
                    header("Location:profilGardien.php?id_gardien=".$_SESSION['id_gardien']);
                }else{
                    $erreur = "Mauvais identifiants (Mot de passe ou mail incorrect";
                }
        }else{
                $erreur = "Veuillez selectionner un rôle";
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Care by Group 4</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="assets/css/connection.css ">
</head>

<body>
<div class="container">   
            <div class="row">
            <section class="section">
                <header>
                    <h3>Connexion Utilisateur </h3>
                        <h4>Veuillez vous connecter à votre espace compte</h4>
                </header>
                <main>
                    <form action="" method="POST" >
                    <div class="form-item box-item">
                            <div class="form-item-triple">
                                <div class="radio-label"> 
                                    <label class="label">Rôle</label>
                                </div>
                                <div class="form-item"> 
                                    <select name="role" id="choix" required>
                                        <option value="">Vous êtes ?</option>
                                        <?php foreach ($results as $output) {?>
                                        <option><?php echo $output['designation_role'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="form-item box-item">
                        <input type="email" name="loginConnect" required placeholder="Entrez votre login : C'est votre mail d'inscription">
                        </div>
                        <div class="form-item box-item">
                        <input type="password" name="mdpConnect" required placeholder="Entrez votre mot de passe">
                        </div>
                        <?php
                        if(isset($erreur)){
                            echo '<font color ="red">' .$erreur. '</font>';
                        }
                     ?>
                      <div class="form-item">
                            <input type="submit" value="Se connecter" class="submit" name="connexionUser"  > 
                        </div>
                    </form>
                </main>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Création d'un compte client</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <button type="button" class="btn btn-default btn-lg" id="myBtn1"><a href="inscriptionClient.php">Création d'un compte Client</a> </button>
                                </p>
                                <p>
                                    <button type="button" class="btn btn-default btn-lg" id="myBtn2"> <a href="inscriptionGardien.php">Création d'un compte Gardien</a> </button>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <p>Mot de passe oublié ? <a href="motDePasseOublie.php">Recupérer mon mot de passe </a></p>
                    <p>Vous n'avez pas de compte ? <a href="#" type="button" data-toggle="modal" data-target="#myModal"> Je crée mon compte</a></p>
                    <p> <a href="index.php">Aller à la page d'accueil</a>  </p>
                </footer>
                <i class="wave"></i>
            </section>
        </div>
    </div>




    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
