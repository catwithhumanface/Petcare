  <?php
                        require('connexionBD.php');
                        session_start();
                            // Check connection
                           
                            if (isSet($_SESSION['id_client'])) {
                                $idu =  $_SESSION['id_client'];
                                $msg = $_POST['msg'];
                                //prendre depuis la session 
                                //$idu = $_POST['idu'];
                                $idgp = $_POST['idgp'];
                                $usrname = $_POST['usrname'];
                                $mail = $_POST['mail'];
                                
                                 $sql = "INSERT INTO `messages`(`MESSTEXTE`, `id_client`, `id_gardien`) VALUES ";
                                $sql = $sql."('$msg', $idu, $idgp)";
                                //$result = $bdd->query($sql);
                                if($bdd -> query($sql)) {
                                    echo"<script>alert('Votre message a bien été envoyé.');</script>";
                                    echo "<script>location.href='index.php';</script>";
                                    
                                } else {
                                    echo"<script>alert('Votre message a échoué.');</script>";
                                    echo "<script>location.href='index.php';</script>";
                                }  
 
                            }else {
                                echo " erreur de session";
                               // echo "<script>location.href='connexion.php';</script>";
                                echo"<script>alert('Connectez-vous d'abord afin de communiquer avec nos gardiens !');</script>";
                            }
                            
                        ?>