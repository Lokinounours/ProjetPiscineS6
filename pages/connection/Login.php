<?php
    $login = isset($_POST["lgn"])? $_POST["lgn"] : "";
    $password = isset($_POST["pwd"])? $_POST["pwd"] : "";

    $finalString = "";
    $goodOrNot = true;

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["btnLogin"])) {

        if ($db_found) {

            if($login!="" && $password!=""){

                $sql = "SELECT * FROM identification WHERE email LIKE '%$login%'";
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) != 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        $verifPwd = $data['password'];
                        $ID = $data["ID"];
                        $pseudo = $data['pseudo'];
                    }
                    if($password!=$verifPwd){
                        $finalString .= "Mot de passe incorrect. <br>";
                        $goodOrNot = false;
                    }
                }else{
                    $finalString .= "Email non reconnu. <br>";
                    $goodOrNot = false;
                }

                if($goodOrNot){
                    $sql = "SELECT * FROM admin WHERE ID LIKE '%$ID%'";
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        $admin = false;
                    }else{
                        $admin = true;
                    }

                    $sql = "SELECT * FROM vendeur WHERE ID LIKE '%$ID%'";
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        $vendeur = false;
                    }else{
                        $vendeur = true;
                    }

                    $sql = "SELECT * FROM acheteur WHERE ID LIKE '%$ID%'";
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        $acheteur = false;
                    }else{
                        $acheteur = true;
                    }

                    session_start();

                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['id'] = $ID;
                    $_SESSION['admin'] = $admin;
                    $_SESSION['vendeur'] = $vendeur;
                    $_SESSION['acheteur'] = $acheteur;

                    mysqli_close($db_handle);

                    if($admin){
                        // header('Location: ../profils/MonProfilVendeur.php'); Vers Profil Admin
                    }else{
                        if($vendeur){
                            header('Location: ../profils/MonProfilVendeur.php');
                        }else{
                            if($acheteur){
                                header('Location: ../profils/MonProfilAcheteur.php');
                            }
                        }
                    }

                }else{
                    mysqli_close($db_handle);
                }
            }else{
                $finalString .= "Tous les champs doivent être remplis. <br>";
                mysqli_close($db_handle);
            }
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Login.css'>
    <!-- <script src='main.js'></script> -->
</head>

<body>
    <div class="container">
        <div class="card">
            <form action="" method="POST" class="loginForm">
                <h2>Bienvenue sur ECE-Bay</h2>
                <input type="text" name="lgn" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input class="btn" type="submit" name="btnLogin" value="Connection">
            </form>
        </div>
        <?php 
            if($finalString != ""){
                echo '<div class="finalString"><p>'. $finalString .'</p></div>';
            }
        ?>
    </div>
</body>

</html>