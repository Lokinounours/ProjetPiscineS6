<?php
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["pwd"])? $_POST["pwd"] : "";
    $passwordVerif = isset($_POST["pwdVerif"])? $_POST["pwdVerif"] : "";
    $checkAvatar = false;
    $checkFond = false;

    $finalString = "";
    $goodOrNot = true;

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["btnInscription"])) {
        $checkAvatar = is_uploaded_file($_FILES['avatar']['tmp_name']);
        $checkFond = is_uploaded_file($_FILES['fond']['tmp_name']);
        if ($db_found) {

            if($pseudo != ""){
                $sql = "SELECT * FROM identification WHERE pseudo LIKE '%$pseudo%'";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $finalString .= "Pseudo déjà utilisé. ";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ pseudo doit être rempli. ";
                $goodOrNot = false;
            }

            if($email != ""){
                $sql = "SELECT * FROM identification WHERE email LIKE '%$email%'";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $finalString .= "Email déjà utilisé. ";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ email doit être rempli. ";
                $goodOrNot = false;
            }

            if($password == ""){
                $finalString .= "Le champ Mot de passe doit être rempli. ";
                $goodOrNot = false;
            }

            if($password != $passwordVerif){
                $finalString .= "Les mots de passe ne correspondent pas. ";
                $goodOrNot = false;
            }

            if($goodOrNot){
                $sql = "INSERT INTO identification(email, pseudo, password, nom, prenom) VALUES('$email', '$pseudo', '$password', '$nom', '$prenom')";
                mysqli_query($db_handle, $sql);

                $sql = "SELECT * FROM identification WHERE email LIKE '%$email%'";
                $result = mysqli_query($db_handle, $sql);
                
                if (mysqli_num_rows($result) == 0){
                    while(mysqli_num_rows($result) == 0){
                        $result = mysqli_query($db_handle, $sql);
                    }
                }
                while ($data = mysqli_fetch_assoc($result)){
                    $id = $data["ID"];
                }

                if($checkAvatar && $checkFond){
                    $imgBlob1 = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
                    $imgBlob2 = addslashes(file_get_contents($_FILES['fond']['tmp_name']));
                    $sql = "INSERT INTO vendeur(ID, img_profil, img_fond) VALUES('$id', '$imgBlob1', '$imgBlob2')";
                    mysqli_query($db_handle, $sql);
                }elseif($checkAvatar && !$checkFond){
                    $imgBlob1 = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
                    $sql = "INSERT INTO vendeur(ID, img_profil) VALUES('$id', '$imgBlob1')";
                    mysqli_query($db_handle, $sql);
                }elseif(!$checkAvatar && $checkFond){
                    $imgBlob2 = addslashes(file_get_contents($_FILES['fond']['tmp_name']));
                    $sql = "INSERT INTO vendeur(ID, img_fond) VALUES('$id', '$imgBlob2')";
                    mysqli_query($db_handle, $sql);
                }else{
                    $sql = "INSERT INTO vendeur(ID) VALUES('$id')";
                    mysqli_query($db_handle, $sql);
                }
            }
            
        }
    }
    mysqli_close($db_handle);
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Login</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='SignUpVendeur.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data" class="loginForm">
                    <h2>Bienvenue sur ECE-Bay</h2>
                    <input type="text" name="prenom" placeholder="Prénom" class="txtInpt">
                    <input type="text" name="nom" placeholder="Nom" class="txtInpt">
                    <input type="text" name="pseudo" placeholder="Pseudo" class="txtInpt">
                    <input type="email" name="email" placeholder="Email" class="txtInpt">
                    <input type="password" name="pwd" placeholder="Mot de passe" class="txtInpt">
                    <input type="password" name="pwdVerif" placeholder="Vérification" class="txtInpt">
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
                    <input type="submit" name="btnInscription" value="S'inscrire" class="txtInpt">
                </form>
            </div>
        </div>
    </body>
</html>