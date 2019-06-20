<?php 
    include ("controller/connection.php");
    //Extraction of levels
    function getLevels($connection){
        $query = "SELECT * FROM niveles;";
        $levels = mysqli_query($connection,$query);   
        $result = array();
           if($levels && mysqli_num_rows($levels)>=1){
             $result = $levels;
           }
           return $result;
    }
   

?>