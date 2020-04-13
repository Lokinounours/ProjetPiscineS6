<?php
    $login = isset($_POST["lgn"])? $_POST["lgn"] : "";
    $password = isset($_POST["pwd"])? $_POST["pwd"] : "";

    if($login == $password){
        header('Location: Accueil.html');
    }
?>