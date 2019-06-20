<?php 
    include_once "connection.php";
    if(isset($_POST['action'])){
       switch($_POST['action']){
            case "add":
                    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection,$_POST['name']) : false;
                    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connection,$_POST['lastname']) : false;
                    $lastname2 = isset($_POST['lastname2']) ? mysqli_real_escape_string($connection,$_POST['lastname2']) : false;
                    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection,$_POST['email']) : false;
                    $password =isset($_POST['password']) ? mysqli_real_escape_string($connection,$_POST['password']) : false;
                    $verifyPassword =isset($_POST['verifyPassword']) ? mysqli_real_escape_string($connection,$_POST['verifyPassword']) : false;
                    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection,$_POST['address']) : false;
                    $level = isset($_POST['level']) ? mysqli_real_escape_string($connection,$_POST['level']) : false;
                   //Array para guardar errores
                    $errors = array();
                    //Validacion de datos
                    if(empty($name) || is_numeric($name) || preg_match("/[0-9]/",$name)){
                        $errors['name'] = "El nombre no es valido";
                    }
                    if(empty($lastname) || is_numeric($lastname) || preg_match("/[0-9]/",$lastname)){
                        $errors['lastname'] = "El apellido paterno no es valido";
                    }
                
                    if(empty($lastname2) || is_numeric($lastname2) || preg_match("/[0-9]/",$lastname2)){
                        $errors['lastname2'] = "El apellido materno no es valido";
                    }
                    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "correo no valido";
                    }

                    if(empty($password)){
                        $errors['passwprd'] = "La contraseña no es valida";
                    }

                    if(empty($verifyPassword)){
                        $errors['verify'] = "Verifique su contraseña";
                    }

                    if($password != $verifyPassword){
                        $errors['passwords'] = "la contraseña no coincide";
                    }

                    if(empty($address)){
                        $errors['address'] = "La direccion no es valida";
                    }
                    
                    if(empty($level)){
                        $errors['level'] = "El nivel educativo no es valido";
                    }

                    if(count($errors) == 0){
                        $password_encrypted = password_hash("$password",PASSWORD_DEFAULT);
                        $sql = "INSERT INTO maestros VALUES (NULL,'$name','$lastname','$lastname2','$email','$password','$address','$level');"; 
                        $guardar = mysqli_query($connection,$sql);
                        echo 'ok'; 
                    }else{
                        print_r( $errors);
                    }
                       
            break;
            case "update":
                    $id = isset($_POST['id']) ? mysqli_real_escape_string($connection,$_POST['id']) : false;
                    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection,$_POST['name']) : false;
                    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connection,$_POST['lastname']) : false;
                    $lastname2 = isset($_POST['lastname2']) ? mysqli_real_escape_string($connection,$_POST['lastname2']) : false;
                    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection,$_POST['email']) : false;
                    $password =isset($_POST['password']) ? mysqli_real_escape_string($connection,$_POST['password']) : false;
                    $verifyPassword =isset($_POST['verifyPassword']) ? mysqli_real_escape_string($connection,$_POST['verifyPassword']) : false;
                    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection,$_POST['address']) : false;
                    $level = isset($_POST['level']) ? mysqli_real_escape_string($connection,$_POST['level']) : false;
                    
                     //Array para guardar errores
                    $errors = array();
                    //Validacion de datos
                    if(empty($name) || is_numeric($name) || preg_match("/[0-9]/",$name)){
                        $errors['name'] = "El nombre no es valido";
                    }
                    if(empty($lastname) || is_numeric($lastname) || preg_match("/[0-9]/",$lastname)){
                        $errors['lastname'] = "El apellido paterno no es valido";
                    }
                
                    if(empty($lastname2) || is_numeric($lastname2) || preg_match("/[0-9]/",$lastname2)){
                        $errors['lastname2'] = "El apellido materno no es valido";
                    }
                    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "correo no valido";
                    }

                    if(empty($password)){
                        $errors['passwprd'] = "La contraseña no es valida";
                    }

                    if(empty($verifyPassword)){
                        $errors['verify'] = "Verifique su contraseña";
                    }

                    if($password != $verifyPassword){
                        $errors['passwords'] = "la contraseña no coincide";
                    }

                    if(empty($address)){
                        $errors['address'] = "La direccion no es valida";
                    }
                    
                    if(empty($level)){
                        $errors['level'] = "El nivel educativo no es valido";
                    }
                    
                    if(count($errors) == 0){
                        $password_encrypted = password_hash("$password",PASSWORD_BCRYPT,['cost' => 4]);
                        $sql = "UPDATE maestros SET nombre= '$name',apellido_paterno='$lastname',apellido_paterno='$lastname2',correo='$email',contrasena='$password_encrypted',domicilio='$address',nivel_educativo='$level' WHERE id_maestro=$id;"; 
                        $guardar = mysqli_query($connection,$sql);
                        echo 'ok'; 
                    }else{
                        print_r( $errors);
                    }
                     
            break;

            case "delete":
             $id = isset($_POST['id']) ? mysqli_real_escape_string($connection,$_POST['id']) : false;
             $sql=  "DELETE FROM maestros WHERE id_maestro=$id";
             $delete = mysqli_query($connection,$sql);
             echo 'ok';
        break;
           
       }
    }
?>