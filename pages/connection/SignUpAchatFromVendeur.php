<?php
    $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $codePostal = isset($_POST["codePostal"])? $_POST["codePostal"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $numTelephone = isset($_POST["numTelephone"])? $_POST["numTelephone"] : "";

    $database = "piscine";
    $goodOrNot = true;
    $finalString = "";

    if (isset($_POST["btnInscription"])) {

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if($db_found){

            if($adresse == ""){
                $finalString .= "Le champ Adresse doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($codePostal == ""){
                $finalString .= "Le champ Code Postal doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($ville == ""){
                $finalString .= "Le champ Ville doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($pays == ""){
                $finalString .= "Le champ Pays doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($goodOrNot){

                session_start();

                $id = $_SESSION['id'];
                $_SESSION['acheteur'] = true;

                $sql = "INSERT INTO acheteur(ID, adresse_1, ville, code_postal, pays, numero_tel) 
                        VALUES('$id', '$adresse', '$ville', '$codePostal', '$pays', '$numTelephone')";

                mysqli_query($db_handle, $sql);

                mysqli_close($db_handle);

                header('Location: ../profils/MonProfilAcheteur.php');
            }else{
                mysqli_close($db_handle);
            }
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

    <!-- On rempli les info acheteurs puis on root sur paiement -->
    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST"  class="loginForm">
                    <h2>Formulaire pour devenir<br>Acheteur</h2>
                    <input type="text" name="adresse" placeholder="Adresse" class="txtInpt">
                    <input type="text" name="ville" placeholder="Ville" class="txtInpt">
                    <input type="number" name="codePostal" placeholder="Code Postal" class="txtInpt">
                    <input type="text" name="pays" placeholder="Pays" class="txtInpt">
                    <input type="number" name="numTelephone" placeholder="Numéro de téléphone" class="txtInpt">
                    <input type="submit" id="btn" name="btnInscription" value="S'inscrire" class="txtInpt btn txtInptBtn">
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