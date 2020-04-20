<?php

    session_start();
    $idAcheteur = $_SESSION['id'];
    $idProduit = $_SESSION['idProduit'];

    $admin = $_SESSION['admin'];
    $vendeur = $_SESSION['vendeur'];
    $acheteur = $_SESSION['acheteur'];

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

        if( strstr($etat, 'E')) {
            $sql = "SELECT * FROM enchere WHERE IDitem = $idProduit";
            $result4 = mysqli_query($db_handle, $sql);
            while($data = mysqli_fetch_assoc($result4)){
                $prixHaut = $data['prixHaut'];
                $prixAff = $data['prixAff'];
            }
        }

        if(strstr($etat, 'M')) {
            $sql = "SELECT * FROM meilleure_offre WHERE IDitem = $idProduit AND IDacheteur = 0";
            $result3 = mysqli_query($db_handle, $sql);
            while($data = mysqli_fetch_assoc($result3)){
                $prixMeilleureOffre = $data['prixVendeur'];
            }
        }   
        
        if (substr( $prix , 0 , 1 ) == "I") {
            if (substr( $prix , 1 , 3 ) == "oui") {
                $last_id = mysqli_insert_id($db_handle);
                // $sql = "DELETE FROM `item` WHERE ID = $idProduit";
                // mysqli_query($db_handle, $sql);
                $sql = "INSERT INTO `achat_immediat`(`ID`, `IDitem`, `IDvendeur`, `IDacheteur`, `prix`) 
                VALUES('$last_id', '$idProduit', '$idProp', '$idAcheteur', '$prixItem')";
                mysqli_query($db_handle, $sql);
                header('Location: ./Achat-menu.php');
            }
        }

        if (substr( $prix , 0 , 1 ) == "M") {

            $prixAcheteur = intval(substr($prix,1));
            $nbrOffre = 1;
            $dernier = 'acheteur';

            $sql = "INSERT INTO `meilleure_offre`(`IDitem`, `IDvendeur`, `IDacheteur`, `prixVendeur`, `prixAcheteur`, `nbreOffre`, `dernier`) 
            VALUES('$idProduit', '$idProp', '$idAcheteur', '$prixMeilleureOffre', '$prixAcheteur', '$nbrOffre', '$dernier')";
            
            mysqli_query($db_handle, $sql);

            header('Location: ./Achat-menu.php');

        }

        if (substr( $prix , 0 , 1 ) == "E") {

            $prixAcheteurRecu = intval(substr($prix,1));
            
            if($prixAcheteurRecu > $prixHaut){
                $idAcheteurEnchere = $idAcheteur;
                $prixAfficheEnchere = $prixHaut + 1;
                $prixHautEnchere = $prixAcheteurRecu;

                $sql = "UPDATE `enchere` SET `IDacheteur` = '$idAcheteurEnchere', `prixHaut` = '$prixHautEnchere', `prixAff` = '$prixAfficheEnchere'
                        WHERE `enchere`.`IDitem` = $idProduit";
                mysqli_query($db_handle, $sql);

            }else{
                $prixAfficheEnchere = $prixAcheteurRecu;
                $sql = "UPDATE `enchere` SET `prixAff` = '$prixAfficheEnchere'
                        WHERE `enchere`.`IDitem` = $idProduit";
                mysqli_query($db_handle, $sql);
            }
            
            header('Location: ./Achat-menu.php');
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
    <title>Détail Achat</title>
</head>

<body>

    <form action="" enctype="multipart/form-data" method="POST" id="formSearch">
        <input type="hidden" id="hiddenPrix" name="hiddenPrix" />
    </form>

    <div class="nav-barre">
		<ul>
			<a href="Achat-menu.php"><li>ACHAT</li></a>
			<?php
				if($admin){
					echo '<a href="../profils/MonProfilAdmin.php"><li>COMPTE</li></a>';
                    echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}elseif($acheteur){
					echo '<a href="../profils/MonProfilAcheteur.php"><li>COMPTE</li></a>';
                    echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}elseif($vendeur){
					echo '<a href="../profils/MonProfilVendeur.php"><li>COMPTE</li></a>';
                    echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}else{
					echo '<a href="../connection/SignUpAcheteur.php"><li>'."INSCRIPTION".'</li></a>';
				}
			?>
			<a href="../vente/Vendre.php"><li>VENTE</li></a>
		</ul>
	</div>
    <div class="container">
        <div class="fondVendre" style="background-image: url(../../images/Fond/fond-choix3.jpg);">
            <p class="titrePage">ACHAT</p>
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
                echo '<h1>' . $nomItem . '</h1>';
                echo '<h3>' . $categorieItem . '</h3>';
                echo '<p>' . $descriptionItem . '</p>';
                echo '</div>';
            ?>
        </div>
        <?php
            echo '<div class="bottom">';
                for ($i=0; $i<strlen($etat); $i++) {

                    if ($etat[$i] == "E") echo'<div class="elem" id="E">
                    <div class="left"><img src="../../images/Logo/logo-enchere.png" alt=""></div>
                    <div class="right">
                        <h1>Enchère</h1>
                        <!-- // ON affiche prixAff mais faut update prixHaut -->
                        <p id="E">'. $prixAff .'£</p>
                    </div>
                </div>';
                    if ($etat[$i] == "I") echo '<div class="elem" id="I"> 
                    <div class="left"><img src="../../images/Logo/logo-achat-imédiat.png" alt=""></div>
                    <div class="right">
                        <h1>Achat immédiat</h1>
                        <p id="I">'. $prixItem .'£</p>
                    </div>
                </div>';
                    if ($etat[$i] == "M") echo '<div class="elem" id="M"> 
                    <div class="left"><img src="../../images/Logo/logo-meilleure-offre.png" alt=""></div>
                    <div class="right">
                        <h1>Meilleure offre</h1>
                        <p id="M">'. $prixMeilleureOffre .'£</p>
                    </div>
                </div>';
                }
            echo '</div>';
            ?>
    </div>
</body>

</html>