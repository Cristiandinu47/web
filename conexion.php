<?php
      $con = new mysqli('localhost','root','','seginformatica');
      if($con-> connect_error){
            die('Connection failed: '. $con->connect_error);
      }
      //else{
      //      echo 'Connected successfully';
      //}
?>