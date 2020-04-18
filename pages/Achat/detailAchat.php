<?php
    session_start();
    $idAcheteur = $_SESSION['id'];
    $idProduit = $_SESSION['idProduit'];

    if (!empty($_REQUEST["hiddenPrix"]))$prix = $_REQUEST["hiddenPrix"];
    else $prix = 0;

    $database = "piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $sql = "SELECT * FROM item WHERE ID = $idProduit";
        $result = mysqli_query($db_handle, $sql);
        while($data = mysqli_fetch_assoc($result)){
            $nomItem = $data['nom'];
            $descriptionItem = $data['description'];
            $photoItem = $data['photo'];
            $nomItem = $data['nom'];
            $videoItem = $data['video'];
            $prixItem = $data['prix'];
            $categorieItem = $data['categorie'];
            $idProp = $data['IDprop'];
            $etat = $data['etat'];
        }

        $sql = "SELECT * FROM identification WHERE ID = $idProp";
        $result2 = mysqli_query($db_handle, $sql);

        while($data = mysqli_fetch_assoc($result2)){
            $pseudoVendeur = $data['pseudo'];
        }

        $sql = "SELECT * FROM vendeur WHERE ID = $idProp";
        $result3 = mysqli_query($db_handle, $sql);
    }

    mysqli_close($db_handle);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='detailAchat.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="detailAchat.js"></script>
    <title>Detail Achat</title>
</head>

<body>

    <form action="" enctype="multipart/form-data" method="POST" id="formSearch">
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
                <?php
                    while($data = mysqli_fetch_assoc($result3)){
                        echo '<div class="bckgdCarteVendeur" style="background-image: url("../../images/Fond/'. $data['img_fond'] . '");">';
                        echo '</div>';
                        echo '<div class="imgVendeur">';
                        echo '<img src="../../images/Avatar/' . $data['img_profil'] .'">';
                        echo '</div>';
                    }
                
                    echo '<div class="psdVendeur">';
                    echo '<p>' . $pseudoVendeur .'</p>';
                    echo '</div>';
                ?>
            </div>
        </div>
    </div>
    <div class="detail-item">
        <div class="top">
            <?php
                echo '<div class="left"><img src="../../images/Items/' . $photoItem . '" alt=""></div>';
                echo '<div class="right">';
                echo '<h1>' . $categorieItem . '</h1>';
                echo '<p>' . $descriptionItem . '</p>'
                echo '</div>';
            ?>
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