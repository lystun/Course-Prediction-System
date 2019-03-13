<?php

	session_start();

    // Load Config
    require_once 'config/config.php';
    require_once 'helpers/redirect.php';
    
    //Autoload core libraries
    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    })


    

?>