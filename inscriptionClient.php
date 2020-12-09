<?php
 //Initiation de la connexion à la base de données
   include("connexionBD.php");
  if(isset($_POST['formInscription'])){
    //Déclaration des variables
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $tel = htmlspecialchars($_POST['tel']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']); //Pour crypter le mot de passe
    $mdpConfirm = sha1($_POST['mdpConfirm']);
    //Vérification de la saisie des champs
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpConfirm'])){
        //Vérification de la taille du nom et prénom
        $nomLength = strlen($nom); //Recupérer la taille du nom
        $prenomLength = strlen($prenom); //Recupérer la taille du prénom
        if($nomLength <= 255 AND $prenomLength <=255){
            //Vérification de la validité de l'adresse mail
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                //Vérification de l'existance du mail dans la base de données 
                $reqmail = $bdd->prepare("SELECT * FROM client where mail_client = ?");
                $reqmail->execute(array($mail));
                $mailExiste = $reqmail->rowCount();
                if($mailExiste==0){
                        //Vérification des mots de passe
                        if($mdp == $mdpConfirm){
                            $insertClient = $bdd->prepare("INSERT INTO client (nom_client, prenom_client, tel_client, mail_client, password_client,id_role) VALUES (?,?,?,?,?,1)");
                            $insertClient->execute(array($nom,$prenom,$tel,$mail,$mdp));
                            $succes = "Votre compte a bien été créer ! <a href=\"connexion.php\">Me connecter</a>";
                        }else{
                            $erreur = "Les deux mots de passes ne correspondent pas";
                        }
                }else{
                    $erreur = "Cette adresse mail exite déja ! <a href=\"connexion.php\">Me Connecter</a>";
                }
            }else{
                $erreur = "Votre adresse mail n'est pas valide";
            }
        }else{
            $erreur = "Votre Nom / Prénom ne doit pas dépasser 255 caractères";
        }
    } else{
        $erreur = "Attention! Tous les champs doivent être complétés";
       
    }

  }




?>
























<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Care by Group 4</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/inscriptionGardien.css"> 
</head>

<body>
    <div class="container">
    <div class="row">
            <section class="section">
                <header>
                    <h3>Inscription du Client</h3>
                        <h4>Veuillez renseigner toutes les informations ci-dessous</h4>
                </header>
                <main>
                <form action="" method="POST" >
                    <div class="form-item box-item">
                    <input type="text" name="nom" required placeholder="Entrez votre nom" value="<?php if(isset($nom)) {echo $nom;}?>">
                    </div>
                    <div class="form-item box-item">
                    <input type="text" name="prenom" required placeholder="Entrez votre prénom" value="<?php if(isset($prenom)) {echo $prenom;}?>">
                    </div>
                    <div class="form-item box-item">
                        <input type="tel"  name="tel" required placeholder="Format Téléphone :076-008-5360" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Le numéro de téléphone doit avoir cet format: 076-008-5360" value="<?php if(isset($tel)) {echo $tel;} ?>" >
                    </div>
                    <div class="form-item box-item">
                        <input type="email"  name="mail" required placeholder="Entrez votre adrese mail" value="<?php if(isset($mail)) {echo $mail;} ?>" >
                    </div>
                    <div class="form-item box-item">
                        <input type="password" name="mdp" required placeholder="Entrez votre mot de passe">
                    </div>
                    <div class="form-item box-item">
                        <input type="password"  name="mdpConfirm" required placeholder="Confirmez votre mot de passe" >
                    </div><br/>
                    <?php
                        if(isset($erreur)){
                            echo '<font color ="red">' .$erreur. '</font>';
                        }

                        if(isset($succes)){
                            echo '<font color="green">' .$succes. '</font>';
                        }
                    ?>

                    <div class="form-item">
                        <input type="submit" value="S'inscrire" name="formInscription" class="submit" >
                        <input type="reset" value="Annuler" class="submit" >  
                    </div>
                </form>
                </main>
                <footer>
                    <p>Vous êtes déjà inscrit? <a href="connexion.php">Connectez-vous</a></p>
                    <p> <a href="index.php">Aller à la page d'accueil</a>  </p>
                </footer>


        
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>


</html>
