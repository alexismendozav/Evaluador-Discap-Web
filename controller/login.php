<?php
    require_once 'connection.php';
    if(isset($_POST))
    {   
        $email = trim($_POST['login']);
        $password = ($_POST['password']); 
        if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || empty($password)){
            $_SESSION['error_login'] = "Todos los campos son obligatorios";
            header('Location:/discap/index.php');        
        }else
        {
            $query = "SELECT * FROM maestros WHERE correo='$email';";
            $login = mysqli_query($connection,$query);
            if($login && mysqli_num_rows($login)==1)
            {
                $user = mysqli_fetch_assoc($login);
                if($password == $user['contrasena']){
                    $_SESSION['user'] = $user;
                       if(isset($_SESSION['error_login'])){
                           unset($_SESSION['error_login']);
                       }
                       header('Location:/discap/student.php');
                }else{
                        // Si algo falla enviar una session con el fallo
                        $_SESSION['error_login'] = "Usuario o contraseña incorrectos";
                        header('Location:/discap/index.php');        
                }
            }else
            {
                    // Si algo falla enviar una session con el fallo
                    $_SESSION['error_login'] = "Usuario o contraseña incorrectos";
                    header('Location:/discap/index.php');        
            }
        }
    }else
    {
        header('Location:/discap/index.php');
    }
       
?>