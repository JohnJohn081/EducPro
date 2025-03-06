<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $db =  "dbgeral";

    
    if ($conn = mysqli_connect($server, $user, $password, $db)){
        #echo"Conectado";
    } else{
        echo "ERROR";
    }

?>