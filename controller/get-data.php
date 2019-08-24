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
   
    //Extraction of areas
    function getAreas($connection){
      $query = "SELECT DISTINCT area FROM `habilidades` ORDER BY area;";
      $areas = mysqli_query($connection,$query);   
      $result = array();
         if($areas && mysqli_num_rows($areas)>=1){
           $result = $areas;
         }
         return $result;
  }
    

?>