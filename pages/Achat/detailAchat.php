<?php
    //session_start();
    // $idVendeur = $_SESSION['id'];

    // $idVendeur = 60;

    // $database = "piscine";
    // $db_handle = mysqli_connect('localhost', 'root', '');
    // $db_found = mysqli_select_db($db_handle, $database);

    // if ($db_found) {
    //     $sql = "SELECT * FROM item WHERE IDprop = $idVendeur";
    //     $result = mysqli_query($db_handle, $sql);

    //     $sql = "SELECT * FROM vendeur WHERE ID = $idVendeur";
    //     $result2 = mysqli_query($db_handle, $sql);

    //     $imgProfil = "../../images/Avatar/";
    //     $imgFond = "../../images/Fond/";
    //     while ($data2 = mysqli_fetch_assoc($result2)){
    //         $imgProfil .= $data2["img_profil"];
    //         $imgFond .= $data2["img_fond"];
    //     }

    //     $sql = "SELECT * FROM identification WHERE ID = $idVendeur";
    //     $result3 = mysqli_query($db_handle, $sql);
    //     while ($data3 = mysqli_fetch_assoc($result3)){
    //         $pseudo = $data3["pseudo"];
    //     }
    // }

    // mysqli_close($db_handle);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='detailAchat.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="detailVente.js"></script>
    <title>Detail Achat</title>
    <!-- <script src='main.js'></script> -->
</head>

<body>

    <form action="">
        <input type="hidden" id="hiddenPrix" name="hiddenPrix" />
    </form>

    <div class="nav-barre">
        <ul>
            <li class="actif">ACHAT</li>
            <li>Compte</li>
            <li >VENTE</li>
        </ul>
    </div>
    <div class="container">
        <div class="fondVendre" style="background-image: url(../../images/Fond/fond-choix3.jpg);">
            <p>Achat</p>
            <div class="carteVendeur">
                <div class="bckgdCarteVendeur" style="background-image: url('../../images/Fond/fond-choix1.jpg');">
                </div>
                <div class="imgVendeur">
                    <img src="../../images/Avatar/avatar-Compte.png">
                </div>
                <div class="psdVendeur">
                    <p>Piotr</p>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-item">
        <div class="top">
            <div class="left"><img src="../../images/Items/6.png" alt=""></div>
            <div class="right">
                <h1>Musée</h1>
                <p>Il date d'avant JC ce ouf.</p>
            </div>
        </div>
        <div class="bottom">
            <!-- ID en fonction du type de vente -->
            <!-- if etat == E -->
            <div class="elem" id="E">
                <div class="left"><img src="../../images/Logo/logo-enchere.png" alt=""></div>
                <div class="right">
                    <h1>Enchère</h1>
                    <!-- ID en fonction du type de vente -->
                    <p id="E">40£</p>
                </div>
            </div>
            <!-- ID en fonction du type de vente -->
            <!-- if etat == I -->
            <div class="elem" id="I"> 
                <div class="left"><img src="../../images/Logo/logo-achat-imédiat.png" alt=""></div>
                <div class="right">
                    <h1>Achat immédiat</h1>
                    <!-- ID en fonction du type de vente -->
                    <p id="I">85£</p>
                </div>
            </div>
            <!-- ID en fonction du type de vente -->
            <!-- if etat == M -->
            <div class="elem" id="M"> 
                <div class="left"><img src="../../images/Logo/logo-meilleure-offre.png" alt=""></div>
                <div class="right">
                    <h1>Meilleure offre</h1>
                    <!-- ID en fonction du type de vente -->
                    <p id="M">21£</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>