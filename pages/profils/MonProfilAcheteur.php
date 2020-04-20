<?php
    session_start();

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $pseudo = $_SESSION['pseudo'];

    $hiddenValue = isset($_POST["hiddenString"])? $_POST["hiddenString"] : "";

    if ($db_found) {

        if($hiddenValue != ""){
            if($hiddenValue[0]=='A'){

                $idItemUpdate = substr($hiddenValue,1);

                for($p=0; $p < strlen($idItemUpdate); $p++){
                    if($idItemUpdate[$p]=='/'){
                        $marqueA = $p;
                    }
                }

                $acheteurId = "";

                for($q=0; $q < $marqueA; $q++){
                    $acheteurId .= $idItemUpdate[$q];
                }

                $acheteurId = intval($acheteurId);
                $realItemId = intval(substr($idItemUpdate,$marqueA+1));

                $sql = "SELECT * FROM `meilleure_offre` WHERE `meilleure_offre`.`IDitem` = $realItemId AND `meilleure_offre`.`IDacheteur` = $acheteurId";
                $result7 = mysqli_query($db_handle, $sql);
                while ($data7 = mysqli_fetch_assoc($result7)){
                    $prixPayeFinal = $data7['prixVendeur'];
                }

                $sql = "UPDATE `info_paiement` SET `solde` = `solde` - '$prixPayeFinal'
                        WHERE `info_paiement`.`ID` = $acheteurId";
                mysqli_query($db_handle, $sql);

                $sql = "UPDATE `meilleure_offre` SET `dernier` = 'X' WHERE `meilleure_offre`.`IDitem` = $realItemId AND `meilleure_offre`.`IDacheteur` = $acheteurId";
                mysqli_query($db_handle, $sql);

            }elseif($hiddenValue[0]=='S'){
                $stringReceived = substr($hiddenValue,1);

                for($r=0; $r < strlen($stringReceived); $r++){
                    if($stringReceived[$r]=='/'){
                        $marqueS = $r;
                    }
                }

                $acheteurIdS = "";

                for($s=0; $s < $marqueS; $s++){
                    $acheteurIdS .= $stringReceived[$s];
                }

                $acheteurIdS = intval($acheteurIdS);
                $realItemIdS = intval(substr($stringReceived,$marqueS+1));

                $sql = "DELETE FROM `meilleure_offre` WHERE `meilleure_offre`.`IDitem` = $realItemIdS AND `meilleure_offre`.`IDacheteur` = $acheteurIdS";
                mysqli_query($db_handle, $sql);

            }else{
                for($n=0; $n < strlen($hiddenValue); $n++){
                    if($hiddenValue[$n]=='/'){
                        $marque = $n;
                    }
                }
                $acheteurIdL = "";
                for($o=0; $o < $marque; $o++){
                    $acheteurIdL .= $hiddenValue[$o];
                }

                $acheteurIdL = intval($acheteurIdL);

                $nvPrixVendeur = substr($hiddenValue,$marque+1);

                for($t=0; $t < strlen($nvPrixVendeur); $t++){
                    if($nvPrixVendeur[$t]=='-'){
                        $marque2 = $t;
                    }
                }

                $realItemIdL = "";

                for($u=0; $u < $marque2; $u++){
                    $realItemIdL .= $nvPrixVendeur[$u];
                }

                $realItemIdL = intval($realItemIdL);
                $prixItemL = intval(substr($nvPrixVendeur,$marque2+1));

                $sql = "UPDATE `meilleure_offre` SET `prixAcheteur` = '$prixItemL', `nbreOffre` = `nbreOffre` + 1, `dernier` = 'acheteur' WHERE `meilleure_offre`.`IDitem` = $realItemIdL AND `meilleure_offre`.`IDacheteur` = $acheteurIdL";
                mysqli_query($db_handle, $sql);
            }
        }

        $sql = "SELECT * FROM identification WHERE pseudo LIKE '%$pseudo%'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $id = $data["ID"];
            $email = $data["email"];
            $password = $data["password"];
            $nom = $data["nom"];
            $prenom = $data["prenom"];
        }

        $sql = "SELECT * FROM acheteur WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $adresse = $data['adresse_1'];
            $ville = $data['ville'];
            $codePostal = $data['code_postal'];
            $pays = $data['pays'];
            $numTelephone = $data['numero_tel'];
        }

        $sql = "SELECT * FROM info_paiement WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $typeCarte = $data['type_carte'];
            $numCarte = $data['numero_carte'];
            $nomCarte = $data['nom_carte'];
            $dateExpiration = $data['date_expiration'];
            $code = $data['code'];
            $solde = $data['solde'];
        }

        for ($i = 0; $i < strlen($numCarte) - 4 ; $i++) {
            $numCarte[$i] = '*';
        }

        for ($i = 0; $i < strlen($dateExpiration); $i++) {
            if($dateExpiration[$i]=='-'){
                $dateExpiration[$i] = '/';
            }
        }

        $dateExpiration = strrev($dateExpiration);
        $copy = $dateExpiration;
        $dateExpiration[0]=$copy[1];
        $dateExpiration[1]=$copy[0];
        $dateExpiration[3]=$copy[4];
        $dateExpiration[4]=$copy[3];
        $dateExpiration[6]=$copy[9];
        $dateExpiration[7]=$copy[8];
        $dateExpiration[8]=$copy[7];
        $dateExpiration[9]=$copy[6];

        $dernier = "vendeur";
        $today=date("Y-m-d");
        $sql = "SELECT * FROM item WHERE ID IN (SELECT IDitem FROM achat_immediat WHERE IDacheteur = $id) OR ID IN (SELECT IDitem FROM meilleure_offre WHERE IDacheteur = $id AND dernier = 'X') OR ID IN (SELECT IDitem FROM enchere WHERE IDacheteur = $id AND dateFin < '$today')";
        $ListItem = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM meilleure_offre WHERE IDacheteur = $id AND dernier LIKE '%$dernier%'";
        $result2 = mysqli_query($db_handle, $sql);

    }
    mysqli_close($db_handle);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="MonProfilAcheteur.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='MonProfilAcheteur.css'>
    <title>Mon Profil Acheteur</title>
</head>

<body>

    <input type="hidden" id="hiddenFond" name="hiddenFond" />
    <div class="nav-barre">
		<ul>
			<li><a href="../Achat/Achat-menu.php">ACHAT</a></li>
			<li class="actif"><a href="#">COMPTE</a></li>
            <li><a href="../connection/deconnection.php">DECONNEXION</a></li>
			<li><a href="../vente/Vendre.php">VENTE</a></li>
		</ul>
	</div>
    <div class="container">
        <div class="achat-bottom" style="background-image: url(../../images/Fond/fond-choix2.jpg);">
            <h1>Mon compte</h1>
            <div class="profil">
                <img src="../../images/Avatar/avatar-Compte.png" alt="Avatar compte">
                <h3><?php echo $pseudo; ?></h3>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="center">
            <p class="verte">Offres attendant votre réponse</p>
            <?php
                if ($result2){
                    $row2 = mysqli_num_rows($result2);
                    $i = 0;
                    while ($data = mysqli_fetch_assoc($result2)) {
                        $idItem[$i] = $data['IDitem'];
                        $prixAcheteur[$i] = $data['prixAcheteur'];
                        $idAcheteur[$i] = $data['IDacheteur'];
                        $prixVendeur[$i] = $data['prixVendeur'];
                        $nbrOffre[$i] = $data['nbreOffre'];
                        $i+=1;
                    }
                }
    
                for($j=0; $j<$i; $j++){
    
                    $db_handle = mysqli_connect('localhost', 'root', '');
                    $db_found = mysqli_select_db($db_handle, $database);
    
                    $idItemTmp = $idItem[$j];
                    $sql3 = "SELECT * FROM item WHERE ID = $idItemTmp";
                    $result3 = mysqli_query($db_handle, $sql3);
                    while ($data3 = mysqli_fetch_assoc($result3)) {
                        $nomItem[$j] = $data3["nom"];
                        $photoItem[$j] = $data3['photo'];
                        $categorieItem[$j] = $data3["categorie"];
                        for ($k=0; $k<strlen($data3["etat"]); $k++) {
                            if ($data3["etat"][$k] == "E") $etatItem[$j] = "logo-enchere.png";
                            if ($data3["etat"][$k] == "I") $etatItem[$j] = "logo-achat-imédiat.png";
                            if ($data3["etat"][$k] == "M") $etatItem[$j] = "logo-meilleure-offre.png";
                        }
                    }
                    mysqli_close($db_handle);
                }
    
                for($l=0; $l<$i; $l++){
    
                    $db_handle = mysqli_connect('localhost', 'root', '');
                    $db_found = mysqli_select_db($db_handle, $database);
    
                    $idAcheteurTmp = $idAcheteur[$l];
                    $sql4 = "SELECT * FROM identification WHERE ID = $idAcheteurTmp";
                    $result4 = mysqli_query($db_handle, $sql4);
                    while ($data4 = mysqli_fetch_assoc($result4)) {
                        $pseudoAcheteur[$l] = $data4['pseudo'];
                    }
                    mysqli_close($db_handle);
                }
    
                echo '<div class="listItems">';
                for($m=0; $m<$i; $m++){
                    echo '<div class="item">';
                    echo '<div class="infoItem">';
                    echo '<p class="roseTitre">' . $nomItem[$m] .'</p>';
                    echo '</div>';
                    echo '<div class="imgItem">';
                    echo '<img src="../../images/Items/' . $photoItem[$m] . '">';
                    echo '</div>';
                    echo '<div class="info2">';
                    echo '<p>' . $categorieItem[$m] .'</p>';
                    echo '</div>';
                    echo '<div class="item-bottom">';
                    echo '<img src=' . '"../../images/Logo/' . $etatItem[$m] .'" alt="Enchere">';
                    echo '</div>';
                    echo '<div class="offreP"><p>Le vendeur offre £ </p><p class="udrlg">' . $prixVendeur[$m] . '</p>.</div>';
                    echo '<p>Vous aviez proposé £'. $prixAcheteur[$m] . '.</p>';
                    echo '<div class="propositions">';
                    echo '<div class="accepter"><span name="A'. $idAcheteur[$m] . '/' . $idItem[$m] .'" class="accept">Accepter ' . "l'offre". '</span></div>';
                    if($nbrOffre[$m]<5){
                        echo '<div class="redo"><span name="'. $idAcheteur[$m] . '/' . $idItem[$m] .'" class="refaire">Refaire une offre</span></div>';
                    }else{
                        echo '<div class="redo"><span name="'. $idAcheteur[$m] . '/' . $idItem[$m] .'" class="refaire">Annuler '. "l'offre" . '</span></div>';
                    }
                    echo '</div>';
                    echo '<p> Nombre '. "d'offres" . ' : ' . $nbrOffre[$m] ;
                    echo '</div>';
                }
    
                echo '</div>';
            ?>
            <div class="split">
                <h1>Type de compte:</h1>
                <h1 class="hBlanc">Acheteur</h1>
            </div>
            <div class="nomPrenom">
                <div class="split">
                    <h1>Nom:</h1>
                    <h1><?php echo '<p class="hBlanc">' . $nom . '</p>';?></h1>
                </div>
                <div class="split">
                    <h1>Prenom:</h1>
                    <h1 class="hBlanc"><?php echo $prenom; ?></h1>
                </div>
            </div>
            <div class="adresse">
                <div class="split">
                    <h1>Coordonnées</h1>
                </div>
                <div class="topAdresse">
                    <div class="split">
                        <h1>Adresse:</h1>
                        <h1 class="hBlanc"><?php echo $adresse; ?></h1>
                    </div>
                    <div class="split">
                        <h1>Ville:</h1>
                        <h1 class="hBlanc"><?php echo $ville; ?></h1>
                    </div>
                </div>
                <div class="bottomAdresse">
                    <div class="split">
                        <h1>Code Postal:</h1>
                        <h1 class="hBlanc"><?php echo $codePostal; ?></h1>
                    </div>
                    <div class="split">
                        <h1>Pays:</h1>
                        <h1 class="hBlanc"><?php echo $pays; ?></h1>
                    </div>
                </div>
            </div>
            <div class="adresse">
                <div class="split">
                    <h1>Email:</h1>
                    <h1 class="hBlanc"><?php echo $email; ?></h1>
                </div>
            </div>
            <div class="adresse">
                <div class="split">
                    <h1>Téléphone:</h1>
                    <h1 class="hBlanc">0<?php echo $numTelephone; ?></h1>
                </div>
            </div>
            <div class="adresse">
                <div class="split">
                    <h1>Paiement</h1>
                </div>
                <div class="topAdresse">
                    <div class="split">
                        <h1>N° de carte:</h1>
                        <h1 class="hBlanc"><?php echo $numCarte; ?></h1>
                    </div>
                    <div class="split">
                        <h1>CVV:</h1>
                        <h1 class="hBlanc"><?php echo $code; ?></h1>
                    </div>
                </div>
                <div class="bottomAdresse">
                    <div class="split">
                        <h1>Nom sur la carte:</h1>
                        <h1 class="hBlanc"><?php echo $nomCarte; ?></h1>
                    </div>
                    <div class="split">
                        <h1>Date expiration:</h1>
                        <h1 class="hBlanc"><?php echo $dateExpiration; ?></h1>
                    </div>
                    <div class="split">
                        <h1>Solde Compte:</h1>
                        <h1 class="hBlanc"><?php echo $solde; ?>£</h1>
                    </div>
                </div>
            </div>


            <h1 style="color: var(--jaune);">Vos achats</h1>
            <div class="listItems">
                <?php
                    while ($data = mysqli_fetch_assoc($ListItem)) {
                        echo '<div class="item" id=' . $data["ID"] . '>';
                        echo '<div class="info">';
                        echo '<p class="rose">' . $data["nom"] .'</p>';
                        echo '<p class="prix">' . $data["prix"] .'£</p>';
                        echo '</div>';
                        echo '<div class="imgItem">';
                        echo '<img src="../../images/Items/' . $data['photo'] . '">';
                        echo '</div>';
                        echo '<div class="info2">';
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
                    ?>
            </div>
            <form action="" enctype="multipart/form-data" method="POST" id="hiddenForm">
                <input type="hidden" id="hString" name="hiddenString" />
            </form>
        </div>
    </div>
</body>

</html>