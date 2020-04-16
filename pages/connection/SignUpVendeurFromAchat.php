<?php
    $checkAvatar = false;
    $checkFond = false;

    $database = "piscine";

    if (isset($_POST["btnInscription"])) {

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $checkAvatar = is_uploaded_file($_FILES['avatar']['tmp_name']);
        $checkFond = is_uploaded_file($_FILES['fond']['tmp_name']);

        if ($db_found) {

            session_start();

            $id = $_SESSION['id'];
            $_SESSION['vendeur'] = true;

            if($checkAvatar && $checkFond){
                $imgNom1 = $_FILES['avatar']['name'];
                $imgNom2 = $_FILES['fond']['name'];
            }elseif($checkAvatar && !$checkFond){
                $imgNom1 = $_FILES['avatar']['name'];
                $imgNom2 = "fondDefault.jpg";
            }elseif(!$checkAvatar && $checkFond){
                $imgNom1 = "avatarDefault.jpg";
                $imgNom2 = $_FILES['fond']['name'];
            }else{
                $imgNom1 = "avatarDefault.jpg";
                $imgNom2 = "fondDefault.jpg";
            }

            $sql = "INSERT INTO vendeur(ID, img_profil, img_fond) VALUES('$id', '$imgNom1', '$imgNom2')";
            mysqli_query($db_handle, $sql);

            mysqli_close($db_handle);

            header('Location: ../profils/MonProfilVendeur.php');
        }
    }
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Sign Up</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='SignUpNext.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data" class="loginForm">
                    <h2>Formulaire pour devenir<br>Vendeur</h2>
                    <div class="choseFiles">
                        <div class="avatar">
                            <label>Photo</label>
                            <input type="file" name="avatar" accept="image/png, image/jpeg" class="inptFile">
                        </div>
                        <div class="fond">
                            <label>Fond</label>
                            <input type="file" name="fond" accept="image/png, image/jpeg" class="inptFile">
                        </div>
                    </div>
                    <input type="submit" id="btn" name="btnInscription" value="S'inscrire" class="txtInpt txtInptBtn">
                </form>
            </div>
        </div>
    </body>
</html>