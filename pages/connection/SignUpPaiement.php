<?php
    $TypeDeCarte = isset($_POST["TypeDeCarte"])? $_POST["TypeDeCarte"] : "";
    $NumDeCarte = isset($_POST["NumDeCarte"])? $_POST["NumDeCarte"] : "";
    $CVV = isset($_POST["CVV"])? $_POST["CVV"] : "";
    $NomCarte = isset($_POST["NomCarte"])? $_POST["NomCarte"] : "";
    $dateExp = isset($_POST["DateExpiration"])? $_POST["DateExpiration"] : "";

    $finalString = "";
    $goodOrNot = true;

    $database = "piscine";

    if (isset($_POST["btnInscription"])) {

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if($db_found){

            if($TypeDeCarte == ""){
                $finalString .= "Le champ Type de Carte doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($NumDeCarte != ""){
                if (strlen($NumDeCarte) != 16) {
                    $finalString .= "Un numéro de carte est composé de 16 chiffres." . "<br>";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ Numéro de Carte doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($CVV != ""){
                if (strlen($CVV) != 3) {
                    $finalString .= "Un CVV est composé de 3 chiffres." . "<br>";
                    $goodOrNot = false;
                }
            }else{
                $finalString .= "Le champ CVV doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($NomCarte == ""){
                $finalString .= "Le champ Nom sur la carte doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($dateExp == ""){
                $finalString .= "Le champ Date d'expiration doit être rempli."  . "<br>";
                $goodOrNot = false;
            }

            if($goodOrNot){

                session_start();

                $id = $_SESSION['id'];

                $solde = random_int(100, 1000);

                $sql = "INSERT INTO info_paiement(ID, type_carte, numero_carte, nom_carte, date_expiration, code, solde) 
                        VALUES('$id', '$TypeDeCarte', '$NumDeCarte', '$NomCarte', '$dateExp', '$CVV', '$solde')";
                mysqli_query($db_handle, $sql);

                mysqli_close($db_handle);

                header('Location: ../profils/MonProfilAcheteur.php');

            }else{
                mysqli_close($db_handle);
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='SignUpNext.css'>
    <title>Inscription | Info paiement</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <form action="" method="POST"  class="loginForm">
                <h2>Bienvenue sur ECE-Bay<br>Acheteur</h2>
                <input type="text" name="TypeDeCarte" placeholder="Type de carte" class="txtInpt">
                <input type="text" name="NumDeCarte" placeholder="N° de carte" class="txtInpt">
                <input type="text" name="CVV" placeholder="CVV" class="txtInpt">
                <input type="text" name="NomCarte" placeholder="Nom sur la carte" class="txtInpt">
                <input type="date" name="DateExpiration" placeholder="" class="txtInpt">
                <input type="submit" name="btnInscription" value="C'est parti !" class="txtInpt">
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