<?php
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["pwd"])? $_POST["pwd"] : "";
    $passwordVerif = isset($_POST["pwdVerif"])? $_POST["pwdVerif"] : "";
    $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $codePostal = isset($_POST["codePostal"])? $_POST["codePostal"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $numTelephone = isset($_POST["numTelephone"])? $_POST["numTelephone"] : "";

    $finalString = "";
    $goodOrNot = true;

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["btnInscription"])) {
        if ($db_found) {

            if($pseudo != ""){
                $sql = "SELECT * FROM identification WHERE pseudo LIKE '%$pseudo%'";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $finalString .= "Pseudo déjà utilisé." . "<br>";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ Pseudo doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($email != ""){
                $sql = "SELECT * FROM identification WHERE email LIKE '%$email%'";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $finalString .= "Email déjà utilisé."  . "<br>";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ Email doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($password == ""){
                $finalString .= "Le champ Mot de passe doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($password != $passwordVerif){
                $finalString .= "Les mots de passe ne correspondent pas."  . "<br>";
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

                $sql = "INSERT INTO acheteur(ID, adresse_1, ville, code_postal, pays, numero_tel) VALUES('$id', '$adresse', '$ville', '$codePostal', '$pays', '$numTelephone')";
                mysqli_query($db_handle, $sql);
            }
        }
    }
    mysqli_close($db_handle);
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Sign Up</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='SignUpAcheteur.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST"  class="loginForm">
                    <h2>Bienvenue sur ECE-Bay</h2>
                    <input type="text" name="prenom" placeholder="Prénom" class="txtInpt">
                    <input type="text" name="nom" placeholder="Nom" class="txtInpt">
                    <input type="text" name="pseudo" placeholder="Pseudo" class="txtInpt">
                    <input type="email" name="email" placeholder="Email" class="txtInpt">
                    <input type="password" name="pwd" placeholder="Mot de passe" class="txtInpt">
                    <input type="password" name="pwdVerif" placeholder="Vérification" class="txtInpt">
                    <input type="text" name="adresse" placeholder="Adresse" class="txtInpt">
                    <input type="number" name="codePostal" placeholder="Code Postal" class="txtInpt">
                    <input type="text" name="ville" placeholder="Ville" class="txtInpt">
                    <input type="text" name="pays" placeholder="Pays" class="txtInpt">
                    <input type="number" name="numTelephone" placeholder="Numéro de téléphone" class="txtInpt">
                    <input type="submit" name="btnInscription" value="S'inscrire" class="txtInpt">
                </form>
            </div>
            <?php 
                if($finalString != ""){
                    echo '<div class="finalString"><p>Veuillez modifier vos données afin d éviter le(s) erreur(s) suivante(s).</p><p>' . $finalString .'</p></div>';
                }
            ?>
        </div>
    </body>
</html>