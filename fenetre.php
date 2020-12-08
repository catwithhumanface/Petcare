<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

<p class="w3-large w3-text-theme"><b><i class="fa-fw w3-margin-right w3-text-teal"></i>
 <button><a href="#" type="button" data-toggle="modal" data-target="#myModal">Compléter mon profil</a> </button> 
                                    </b>
                                    </p>
<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding:3px 5px;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style="text-align:center;"><span class="glyphicon glyphicon-edit">Modification du profil de <?php echo $userInfo['prenom_client'];?></span></h4>
                                    </div>
                                    <div class="modal-body" style="padding:20px 30px;">
                                        <form role="form" method="POST" action="">
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
                                                <label for="psw"><span class="glyphicon glyphicon-picture"></span> Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo" >
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success btn-block" name="MAJ"><span class="glyphicon glyphicon-off"></span> Mettre à jour</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                                
</body>

</html>
