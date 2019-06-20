<?php 
   include ("database/connection.php");
   if(isset($_POST['btn-session'])){
       $user = $_POST['user'];
       $password = $_POST['password'];
       $query = "SELECT * FROM maestros WHERE correo='jesus@gmasdom' AND contrasena='1234asd';";
       $result = mysqli_query($connection,$query);
       if($result->num_rows != 0){
           
       } else{

       }
   }
?>