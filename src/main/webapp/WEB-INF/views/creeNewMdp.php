<?php
    session_start();
    include ("connexionBD.php");
    if(isset($_SESSION['id_client'])){ //S'il s'agit du Client
        if(isset($_POST['changerSubmit'])){
            $pwd = sha1($_POST['pwd']);
            $pwd_repeat = sha1($_POST['pwd_repeat']);
            $requser = $bdd->prepare("SELECT * FROM client WHERE id_client=?");
            $requser->execute(array($_SESSION['id_client']));
            $user=$requser->fetch();    
            if($pwd == $pwd_repeat)	{
                $insertmdpClient= $bdd->prepare("UPDATE client SET password_client = ? WHERE id_client = ?");
                $insertmdpClient->execute(array($pwd, $_SESSION['id_client']));
                $succes ="Votre mot de passe a bien été modifié ! <a href=\"connexion.php\">Connectez-vous</a>";
            }
            else{
                    $erreur="Vos Deux mots de passe ne Correspondent Pas";
            }
        } 
    }else if (isset($_SESSION['id_gardien'])){ //S'il s'agit du Gardien
        if(isset($_POST['changerSubmit'])){
            $pwd = sha1($_POST['pwd']);
            $pwd_repeat = sha1($_POST['pwd_repeat']);
            $requserGardien = $bdd->prepare("SELECT * FROM gardien WHERE id_gardien=?");
            $requserGardien->execute(array($_SESSION['id_gardien']));
            $userGardien=$requserGardien->fetch();  
            if($pwd == $pwd_repeat){
                $insertmdpClient= $bdd->prepare("UPDATE gardien SET password_gardien = ? WHERE id_gardien = ?");
                $insertmdpClient->execute(array($pwd, $_SESSION['id_gardien']));
               $succes ="Votre mot de passe a bien été modifié ! <a href=\"connexion.php\">Connectez-vous</a>";
            }else{
                $erreur = "Vos deux mots de passes ne correspondent pas";
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
                    <h3>Changer votre mot de passe </h3>
                        <h4>Veuillez renseigner le nouveau mot de passe </h4>
                </header>
                <main>
                    <form action="" method="POST">
                        <div class="form-item">
                            <input type="password" name="pwd" placeholder="Entre votre nouveau mot de passe" required> 
                        </div>
                        <div class="form-item">
                            <input type="password" name="pwd_repeat" required placeholder="Confirmer votre nouveau mot de passe"> 
                        </div>
                        <div class="form-item">
                            <input type="submit" value="Changer" class="submit" name="changerSubmit" > 
                        </div>
                    </form>
                </main>
                <?php
                        if(isset($erreur)){
                            echo '<font color ="red">' .$erreur. '</font>';
                        }

                        if(isset($succes)){
                            echo '<font color="green">' .$succes. '</font>';
                        }
                     ?>

                <footer>
                    <p>Je me rappelle de mon mot de passe !! <a href="connexion.php">Je me connecte</a></p>
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
