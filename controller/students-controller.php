<?php 
 include_once "connection.php";
 if(isset($_POST['action'])){
    switch($_POST['action']){
        case "add":
        $name = isset($_POST['name']) ? mysqli_real_escape_string($connection,$_POST['name']) : false;
        $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connection,$_POST['lastname']) : false;
        $lastname2 = isset($_POST['lastname2']) ? mysqli_real_escape_string($connection,$_POST['lastname2']) : false;
        $date = isset($_POST['date']) ? mysqli_real_escape_string($connection,$_POST['date']) : false;
        $curp =isset($_POST['curp']) ? mysqli_real_escape_string($connection,$_POST['curp']) : false;
        $gender =isset($_POST['gender']) ? mysqli_real_escape_string($connection,$_POST['gender']) : false;
        $level = isset($_POST['level']) ? mysqli_real_escape_string($connection,$_POST['level']) : false;
        $address = isset($_POST['address']) ? mysqli_real_escape_string($connection,$_POST['address']) : false;
        $diagnostic = isset($_POST['diagnostic']) ? mysqli_real_escape_string($connection,$_POST['diagnostic']) : false;

        //Array para guardar errores
        $errors = array();
        //Validacion de datos
        if(empty($name) || is_numeric($name) || preg_match("/[0-9]/",$name)){
            $errors['name'] = "El nombre no es valido";
        }

        if(empty($lastname) || is_numeric($lastname) || preg_match("/[0-9]/",$lastname)){
            $errors['lastname'] = "El apellido paterno no es valido";
        }
    
        if(!empty($lastname2) || !is_numeric($lastname2) || preg_match("/[0-9]/",$lastname2)){
            $errors['lastname2'] = "El apellido materno no es valido";
        }

        if(empty($date)){
            $errors['date'] = "La fecha no es valida";
        }
    
        if(empty($curp) || strlen($curp) != 18 ){
            $errors['curp'] = "La curp no es valida";
        }
        if(empty($gender)){
            $errors['gender'] = "El genero no es valido";
        }
    
        if(empty($level)){
            $errors['level'] = "El nivel educativo no es valido";
        }
    
        if(empty($address)){
            $errors['address'] = "La direccion no es valida";
        }
    
        if(empty($diagnostic)){
            $errors['diagnostic'] = "Seleccione el diagnostico";
        }
    
        if(count($errors) == 0){
            $sql = "INSERT INTO alumnos VALUES (NULL,'$name','$lastname','$lastname2','$curp','$date','$gender','$level','$address','$diagnostic');"; 
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
        $date = isset($_POST['date']) ? mysqli_real_escape_string($connection,$_POST['date']) : false;
        $curp =isset($_POST['curp']) ? mysqli_real_escape_string($connection,$_POST['curp']) : false;
        $gender =isset($_POST['gender']) ? mysqli_real_escape_string($connection,$_POST['gender']) : false;
        $level = isset($_POST['level']) ? mysqli_real_escape_string($connection,$_POST['level']) : false;
        $address = isset($_POST['address']) ? mysqli_real_escape_string($connection,$_POST['address']) : false;
        $diagnostic = isset($_POST['diagnostic']) ? mysqli_real_escape_string($connection,$_POST['diagnostic']) : false;

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

        if(empty($date)){
            $errors['date'] = "La fecha no es valida";
        }
    
        if(empty($curp) || strlen($curp) != 18 ){
            $errors['curp'] = "La curp no es valida";
        }
        if(empty($gender)){
            $errors['gender'] = "El genero no es valido";
        }
    
        if(empty($level)){
            $errors['level'] = "El nivel educativo no es valido";
        }
    
        if(empty($address)){
            $errors['address'] = "La direccion no es valida";
        }
    
        if(empty($diagnostic)){
            $errors['diagnostic'] = "Seleccione el diagnostico";
        }
    
        if(count($errors) == 0){
            $sql = "UPDATE alumnos SET nombre='$name',apellido_paterno='$lastname',apellido_materno='$lastname2',curp='$curp',nacimiento='$date',sexo='$gender',nivel_educativo='$level',domicilio='$address', diagnostico='$diagnostic' WHERE id_alumno =$id;";
            $guardar = mysqli_query($connection,$sql);
            $response = mysqli_error($connection);
            echo 'ok';
        }else{
            print_r( $errors);
        }
    
        break;

        case "delete":
             $id = isset($_POST['id']) ? mysqli_real_escape_string($connection,$_POST['id']) : false;
             $sql=  "DELETE FROM alumnos WHERE id_alumno=$id";
             $delete = mysqli_query($connection,$sql);
             echo 'ok';
        break;
    } 
 }else{
     echo 'Error';
 }
?>