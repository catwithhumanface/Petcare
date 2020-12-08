  <?php
                      
                            $servername = "localhost";
                            $database = "petcare";
                            $username = "root";
                            $password = "mysql";

                            // Create connection

                            $conn = mysqli_connect($servername, $username, $password, $database);
                           
                            // Check connection
                            
                            $msg = $_POST['msg'];
                            //prendre depuis la session 
                            //$idu = $_POST['idu'];

                            $idgp = $_POST['idgp'];


                            // Style procédural
                            mysqli_set_charset( $conn, "utf8");

                             if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }else{
                            // echo "connected !";
                            }
                           $sql = "INSERT INTO `messages`(`MESSTEXTE`, `IDU`, `IDGP`) VALUES ";
                            $sql = $sql."('$msg', '2', '$idgp')";
                            if($conn -> query($sql)) {
                               // echo "alert('Le messqge a été envoyé.')";
                                echo "<script>location.href='index.php';</script>";
                            } else {
                                echo "<script>";
                                echo "alert('INSERT 오류발생');";
                                echo "location.href='index.php';";
                                echo "</script>";
                            }  
 
                        ?>