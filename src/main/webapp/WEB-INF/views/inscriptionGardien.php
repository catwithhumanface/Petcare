<?php
//Initiation de la connexion à la base de données
include("connexionBD.php");
   if(isset($_POST['inscriptionGardien'])){
       //Déclaration des variables
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $numRue = htmlspecialchars($_POST['numRue']);
    $CodeP = htmlspecialchars($_POST['CodeP']);
    $addresse = htmlspecialchars($_POST['addresse']);
    $telGar = htmlspecialchars($_POST['telGar']);
    $genre =htmlspecialchars($_POST['genre']);
    $mdp = sha1($_POST['mdp']); //Pour crypter le mot de passe
    $mdpConfirm = sha1($_POST['mdpConfirm']);
    //Vérification de la saisie des champs
    //if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['numRue']) AND !empty($_POST['CodeP']) AND !empty($_POST['Addresse']) AND !empty($_POST['telGar']) AND checked($_POST['genre']) AND !empty($_POST['mdp']) AND !empty($_POST['mpdConfirm'])){
       //Vérification de la taille du nom et prénom
       $nomLength = strlen($nom); //Recupérer la taille du nom
       $prenomLength = strlen($prenom); //Recupérer la taille du prénom
       $addresseLength = strlen($addresse); //Recupération de la taille de l'adresse
        if($nomLength <= 255 AND $prenomLength <=255 AND $addresseLength){
             //Vérification de la validité de l'adresse mail
             if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                //Vérification de l'existance du mail dans la base de données 
                   $reqmail = $bdd->prepare("SELECT * FROM client where mail_client = ?");
                   $reqmail->execute(array($mail));
                   $mailExiste = $reqmail->rowCount();
                   if($mailExiste==0){
                   //Vérification des mots de passe
                       if($mdp == $mdpConfirm){
                           $insertClient = $bdd->prepare("INSERT INTO gardien (nom_gardien, prenom_gardien, mail_gardien,num_rue_gardien,code_postal_gardien,nom_voie_gardien,tel_gardien,genre_gardien, password_gardien, id_role) VALUES (?,?,?,?,?,?,?,?,?,2)");
                           $insertClient->execute(array($nom,$prenom,$mail,$numRue,$CodeP,$addresse,$telGar,$genre,$mdp));
                           $succes = "Votre compte a bien été créer ! <a href=\"connexion.php\">Me connecter</a>";
                       }else{
                           $erreur = "Les deux mots de passes ne correspondent pas";
                       }
                   }else{
                       $erreur = "Cette adresse mail exite déja ! <a href=\"connexion.php\" style='color:white;'>Me Connecter</a>";
                   }
             }else{
               $erreur = "Votre adresse mail n'est pas valide";
             }
       }else{
           $erreur = "Votre Nom / Prénom / Adresse ne doit pas dépasser 255 caractères";
       }     
    
   }



?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Care by Group 4</title>
    <link rel="stylesheet" href="assets/css/inscriptionGardien.css"> 
</head>
<body>
    <div class="container">   
            <div class="row">
            <section class="section">
                <header>
                    <h3>Inscription du gardien</h3>
                        <h4>Veuillez renseigner toutes les informations ci-dessous</h4>
                </header>
                <main>
                    <form action="" method="POST" >
                        <div class="form-item box-item">
                            <input type="text" name="nom" placeholder="Nom" required  value="<?php if(isset($nom)) {echo $nom;}?>" >
                        </div>
                        <div class="form-item box-item">
                            <input type="text" name="prenom" placeholder="Prénom" required value="<?php if(isset($prenom)) {echo $prenom;}?>" >
                        </div>
                        <div class="form-item box-item">
                            <input type="email" name="mail" placeholder="Adresse mail" required value="<?php if(isset($mail)) {echo $mail;}?>">
                        </div> 
                        <div class="form-item-double box-item">
                            <div class="form-item ">
                                <input type="text" name="numRue" placeholder="Numéro de la rue" required value="<?php if(isset($numRue)) {echo $numRue;}?>" >
                            </div>
                            <div class="form-item">
                                <input type="text" name="CodeP" placeholder="Code postal" required value="<?php if(isset($CodeP)) {echo $CodeP;}?>">
                            </div>
                        </div>
                        <div class="form-item box-item">
                            <input type="text" name="addresse" placeholder="Nom de la voie"  required value="<?php if(isset($addresse)) {echo $addresse;}?>" >
                        </div>
                        <div class="form-item box-item">
                            <input type="tel" name="telGar" required placeholder="Format Téléphone :076-008-5360" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Le numéro de téléphone doit avoir cet format: 076-008-5360" value="<?php if(isset($telGar)) {echo $telGar;} ?>">
                        </div>
                        <div class="form-item box-item">
                            <div class="form-item-triple">
                                <div class="radio-label"> 
                                    <label class="label">Genre</label>
                                </div>
                                <div class="form-item"> 
                                    <input id="Male" type="radio" name="genre" value="Homme" >
                                    <label for="Male">Homme</label>
                                </div>
                                <div class="form-item"> 
                                    <input id="Female" type="radio" name="genre" value="Femme" checked>
                                    <label for="Female">Femme</label>
                                </div>
                            </div>
                        </div> 
                        <div class="form-item box-item">
                            <input type="password" name="mdp" required placeholder="Mot de passe" >
                        </div>
                        <div class="form-item box-item">
                            <input type="password" name="mdpConfirm" required placeholder="Confirmation " >
                       </div>
                        <br/>
                        <?php
                        if(isset($erreur)){
                            echo '<font color ="red">' .$erreur. '</font>';
                        }

                        if(isset($succes)){
                            echo '<font color="green">' .$succes. '</font>';
                        }
                     ?>

                        <div class="form-item">
                            <input type="submit" style="margin-left:100px;"value="S'inscrire" class="submit" name="inscriptionGardien"  > 
                            <input type="reset" value="Annuler" class="submit" > 
                        </div>
                    </form>
                </main>
                <footer>
                    <p>Vous êtes déjà inscrit? <a href="connexion.php">Connectez-vous</a></p>
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
