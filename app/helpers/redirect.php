<?php

    function redirect($page){
        header('location:'.URLROOT.'/'.$page);
    }

    function access_grant(){
         if (isset($_SESSION['student_id'])) {
             return true;
         } else {
             return false;
         }
    }


?>
