<?php 
    include ("controller/connection.php");
    //Extraction of students
    $query = "SELECT * FROM maestros;";
    $teachers = mysqli_query($connection,$query);   
    if($teachers){
        while($data = mysqli_fetch_assoc($teachers)){
            $array_teachers["data"][] = array_map("utf8_encode",$data);
        }
        echo json_encode($array_teachers);
    }else{
    echo "error";
    }
?>