<?php

class CreateDb
{
       

      
      
    

         

    // get product from the database
    public function getData(){
        include 'config.php';
        $sql = "SELECT * FROM products";
        
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}






