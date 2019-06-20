<?php
    require_once 'connection.php';
    if(isset($_POST)){
        $email = trim($_POST['user']);
        $password = ($_POST['password']);
        $query = "SELECT * FROM maestros WHERE correo='$email';";
        $login = mysqli_query($connection,$query);
        if($login && mysqli_num_rows($login)==1){
            $user = mysqli_fetch_assoc($login);
            if(password_verify($password,$user['password'])){
                $_SESSION['user'] = $user;
                   if(isset($_SESSION['error_login'])){
                       unset($_SESSION['error_login']);
                   }
                   header('Location:student.php');
            }else{
                    // Si algo falla enviar una session con el fallo
                    $_SESSION['error_login'] = "Login incorrecto";
                    header('Location:index.php');
            }
        }else{
                // Si algo falla enviar una session con el fallo
                $_SESSION['error_login'] = "Login incorrecto";
                header('Location:index.php');
        }
    }else{
        echo 'Hola';
    }
    echo 'Hola';
    
?>