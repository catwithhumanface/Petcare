
  <?php
       require('connexionBD.php');
      $test1=$_POST['Nomchien'];
      $test2=$_POST['description'];
      $test3=$_POST['race'];
      $test4=$_POST['lieu'];
      $test5=$_POST['tel'];
      $test6=$_POST['mail'];
      $sql="INSERT INTO pertechien(NOMCHIENP,DESCP,RACEP,LIEUP,NUMP,MAILP) VALUES ('$test1','$test2','$test3','$test4','$test5','$test6')";
      
      if($bdd -> query($sql)) {
          echo"<script>alert('Votre déclaration a bien été envoyée.');</script>";
          echo "<script>location.href='Pertedechien.php';</script>";
          
      } else {
        
         echo"<script>alert('Votre déclaration a échoué.');</script>";
         echo "<script>location.href='Pertedechien1.html';</script>";
      }  
     
      ?>
</body>
