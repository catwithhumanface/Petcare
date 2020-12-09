  <?php
                        require('connexionBD.php');
                            // Check connection
                            
                            $msg = $_POST['msg'];
                            //prendre depuis la session 
                            //$idu = $_POST['idu'];

                            $idgp = $_POST['idgp'];


                           $sql = "INSERT INTO `messages`(`MESSTEXTE`, `IDU`, `IDGP`) VALUES ";
                            $sql = $sql."('$msg', '2', '$idgp')";
                            //$result = $bdd->query($sql);
                            if($bdd -> query($sql)) {
                                echo"<script>alert('Votre message a bien été envoyé.');</script>";
                                echo "<script>location.href='index.php';</script>";
                                
                            } else {
                                echo "<script>";
                                echo "alert('INSERT 오류발생');";
                                echo "location.href='index.php';";
                                echo "</script>";
                            }  
 
                        ?>