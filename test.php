
  <?php
  require_once('connexion.php');
  $servername = "localhost";
  $database = "test";
  $username = "root";
  $password = "";

  // Create connection

  
  $conn = mysqli_connect($servername, $username, $password, $database);
 
  // Check connection
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
  mysqli_set_charset( $conn, "utf8"); 
  // Style procédural
$test1=$_POST['Nomchien'];
$test2=$_POST['descr'];
$test3=$_POST['race'];
$test4=$_POST['lieu'];
$test5=$_POST['numtel'];
$test6=$_POST['mail'];
$sql="INSERT INTO pertechien(NOMCHIENP,DESCP,RACEP,LIEUP,NUMP,MAILP) VALUES ('$test1','$test2','$test3','$test4','$test5','$test6')";
if (mysqli_query($conn, $sql)) {
    echo 'Votre demande a bien été prise en compte. ';
    echo 'Vous pouvez la voir sur <a href="Pertedechien.php"> Perte de chien</a>';
 } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
 }
 $conn->close();
?>
</body>
