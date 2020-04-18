<?php

    session_start();

    $admin = $_SESSION['admin'];
    $vendeur = $_SESSION['vendeur'];
    $acheteur = $_SESSION['acheteur'];

    if($vendeur){

        $idVendeur = $_SESSION['id'];

        $database = "piscine";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM item WHERE IDprop = $idVendeur";
            $result = mysqli_query($db_handle, $sql);

            $sql = "SELECT * FROM vendeur WHERE ID = $idVendeur";
            $result2 = mysqli_query($db_handle, $sql);

            $imgProfil = "../../images/Avatar/";
            $imgFond = "../../images/Fond/";
            while ($data2 = mysqli_fetch_assoc($result2)){
                $imgProfil .= $data2["img_profil"];
                $imgFond .= $data2["img_fond"];
            }

            $sql = "SELECT * FROM identification WHERE ID = $idVendeur";
            $result3 = mysqli_query($db_handle, $sql);
            while ($data3 = mysqli_fetch_assoc($result3)){
                $pseudo = $data3["pseudo"];
            }
        }

        mysqli_close($db_handle);
    }
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Vendre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Vendre.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <script src='main.js'></script> -->
</head>

<body>
    <div class="nav-barre">
        <ul>
            <a href="../Achat/Achat-menu.php"><li>ACHAT</li></a>
            <?php
				if($admin){
					echo '<a href="../profils/MonProfilAdmin.php"><li>Compte</li></a>';
				}elseif($vendeur){
					echo '<a href="../profils/MonProfilVendeur.php"><li>Compte</li></a>';
				}elseif($acheteur){
					echo '<a href="../profils/MonProfilAcheteur.php"><li>Compte</li></a>';
				}else{
					echo '<a href="../connection/SignUpVendeur.php"><li>'."INSCRIPTION".'</li></a>';
				}
			?>
            <li class="actif">VENTE</li>
        </ul>
    </div>
    <div class="container">
        <div class="fondVendre" style="background-image: url(../../images/Fond/fond-choix3.jpg);">
            <p>vendre</p>
            <?php
                if($vendeur){
                    echo '<div class="carteVendeur">';
                    echo '<div class="bckgdCarteVendeur" style="background-image: url('.$imgFond.');"></div>';
                    echo '<div class="imgVendeur"><img src="'.$imgProfil.'"></div>';
                    echo '<div class="psdVendeur"><p>'.$pseudo.'</p></div>';
                    echo '</div>';
                }
            ?>
        </div>
        <div class="btnAjouter">
            <?php
                if($vendeur){
                    echo '<a href="../items/AjoutItem.php"><i class="fas fa-plus"></i>';
                    echo '<p>Ajouter un nouvel item</p></a>';
                }elseif($acheteur){
                    echo '<a href="../connection/SignUpVendeurFromAchat.php"><p>Devenir vendeur</p></a>';
                }else{
                    echo '<a href="../connection/SignUpVendeur.php"><p>Devenir vendeur</p></a>';
                }
            ?>
        </div>
        <?php
            if($vendeur) {
                echo '<p class="vert">Objets déjà en vente</p>';
                echo '<div class="listItems">';
                while ($data = mysqli_fetch_assoc($result)) {
                    echo '<div class="item">';
                    echo '<div class="info">';
                    echo '<p class="rose">' . $data["nom"] .'</p>';
                    echo '<p class="prix">' . $data["prix"] .'£</p>';
                    echo '</div>';
                    echo '<div class="imgItem">';
                    echo '<img src="../../images/Items/' . $data['photo'] . '">';
                    echo '</div>';
                    echo '<div class="info2">';
                    echo '<p style="text-align: justify; margin: 0 10px">' . $data["description"] .'</p>';
                    echo '<p>' . $data["categorie"] .'</p>';
                    echo '</div>';
                    echo '<div class="item-bottom">';
                    for ($i=0; $i<strlen($data["etat"]); $i++) {
                        if ($data["etat"][$i] == "E") echo "<img src='../../images/Logo/logo-enchere.png' alt='Enchere'>";
                        if ($data["etat"][$i] == "I") echo "<img src='../../images/Logo/logo-achat-imédiat.png' alt='achat-imédiat'>";
                        if ($data["etat"][$i] == "M") echo "<img src='../../images/Logo/logo-meilleure-offre.png' alt='meilleure-offre'>";
                    }
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>
    </div>
</body>

</html> 