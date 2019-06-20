<?php 
    include ("controller/connection.php");
    //Extraction of students
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
?>