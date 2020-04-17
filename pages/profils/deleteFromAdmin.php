<?php

    $fullId = $_POST['fullId'];

    if($fullId!=""){

        $type = $fullId[0];
        $id = intval(substr($fullId,1));

        if($type == 'V'){
            $table = "vendeur";
        }elseif($type == 'A'){
            $table = "acheteur";
        }else{
            $table = "item";
        }

        $database = "piscine";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "DELETE FROM $table WHERE ID = $id";
            mysqli_query($db_handle, $sql);
            mysqli_close($db_handle);
        }
    }
?>