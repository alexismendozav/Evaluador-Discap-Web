<?php 
    include ("controller/connection.php");
    //Extraction of students
    if(isset($_POST['level'])){
        $level = isset($_POST['level']) ? mysqli_real_escape_string($connection,$_POST['level']) : false;
        $query = "SELECT * FROM alumnos WHERE nivel_educativo = $level;";
        $students = mysqli_query($connection,$query);   
        if($students){
            while($data = mysqli_fetch_assoc($students)){
                $array_students["data"][] = array_map("utf8_encode",$data);
            }
            echo json_encode($array_students);
        }else{
            die("Error");
        }
        mysqli_free_result($students);
        mysqli_close($connection);
    }else{
        $query = "SELECT * FROM alumnos;";
        $students = mysqli_query($connection,$query);   
        if($students){
            while($data = mysqli_fetch_assoc($students)){
                $array_students["data"][] = array_map("utf8_encode",$data);
            }
            echo json_encode($array_students);
        }else{
            die("Error");
        }
        mysqli_free_result($students);
        mysqli_close($connection);
    }
    
?>