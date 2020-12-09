<?php
    session_start();//Démarrer la session 
    include ("connexionBD.php");
    $sql = "SELECT designation_role FROM roles"; //Recupérer les roles
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if(isset($_POST['recupMail'])){
        $mailrecup = htmlspecialchars($_POST['mailrecup']);
        $role = $_POST['role']; 
        if($role=='Client'){
            $reqClient = $bdd-> prepare("SELECT * FROM client WHERE mail_client=?" );
            $reqClient->execute(array($mailrecup));
            $ClientExist  = $reqClient->rowCount();
            if($ClientExist == 1){
                $ClientInfo = $reqClient->fetch();
                $_SESSION['id_client'] = $ClientInfo['id_client'];
                header("Location:creeNewMdp.php?id_client=".$_SESSION['id_client']);  
            }else{
                    $erreur = "Cet Client n'est pas inscrit chez nous";
                }
        }else if($role=='Gardien'){
            $reqGardien = $bdd-> prepare("SELECT * FROM gardien WHERE mail_gardien=?" );
            $reqGardien->execute(array($mailrecup));
            $gardienExist  = $reqGardien->rowCount();
            if($gardienExist==1){
                $GardienInfo = $reqGardien->fetch();
                $_SESSION['id_gardien'] = $GardienInfo['id_gardien'];
                header("Location:creeNewMdp.php?id_gardien=".$_SESSION['id_gardien']);  
            }else{
                $erreur = "Cet Gardien n'est pas inscrit chez nous";
            }
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="assets/css/connection.css ">
</head>

<body>
<div class="container">   
            <div class="row">
            <section class="section">
                <header>
                    <h3>Recupération du mot de passe </h3>
                        <h4>Veuillez entrez votre adresse mail</h4>
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
                            <input type="email" name="mailrecup" required placeholder="Adresse mail ">
                        </div>
                        
                      <div class="form-item">
                            <input type="submit" value="Je recupère" class="submit" name="recupMail"  > 
                        </div>

                        <?php
                        if(isset($erreur)){
                            echo '<font color ="red">' .$erreur. '</font>';
                        }
                     ?>
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
                    <p>Vous serez amené à créer un nouveau mot de passe.</p>
                    <p>Oups, je n'ai pas pas de compte <a href="#" type="button" data-toggle="modal" data-target="#myModal"> Je crée mon compte</a></p>
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
