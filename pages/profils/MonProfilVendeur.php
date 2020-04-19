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
                $idItemUpdate = intval(substr($hiddenValue,1));
                // il faut check aussi idAcheteur
                $sql = "UPDATE `meilleure_offre` SET `dernier` = 'X' WHERE `meilleure_offre`.`IDitem` = $idItemUpdate";
                mysqli_query($db_handle, $sql);
            }elseif($hiddenValue[0]=='S'){
                $idItemUpdateS = intval(substr($hiddenValue,1));
                //delete au lieu d'update avec idAcheteur
                $sql = "UPDATE `meilleure_offre` SET `IDacheteur` = '0', `prixVendeur` = '-1', `nbreOffre` = '0', `dernier` = 'vendeur' WHERE `meilleure_offre`.`IDitem` = $idItemUpdateS";
                mysqli_query($db_handle, $sql);
            }else{
                for($n=0; $n < strlen($hiddenValue); $n++){
                    if($hiddenValue[$n]=='/'){
                        $marque = $n;
                    }
                }
                $idItemUpdateM = "";
                for($o=0; $o < $marque; $o++){
                    $idItemUpdateM .= $hiddenValue[$o];
                }

                $idItemUpdateM = intval($idItemUpdateM);
                $nvPrixVendeur = intval(substr($hiddenValue,$marque+1));

                //check également idAcheteur
                $sql = "UPDATE `meilleure_offre` SET `prixVendeur` = '$nvPrixVendeur', `dernier` = 'vendeur' WHERE `meilleure_offre`.`IDitem` = $idItemUpdateM";
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

        $sql = "SELECT * FROM vendeur WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $nomAvatar = "../../images/Avatar/" . $data['img_profil'];
            $nomFond = "../../images/Fond/" . $data['img_fond'];
        }

        $dernier = "acheteur";

        $sql = "SELECT * FROM meilleure_offre WHERE IDvendeur = $id AND dernier LIKE '%$dernier%'";
        $result2 = mysqli_query($db_handle, $sql);

    }
    mysqli_close($db_handle);
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Sign Up</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='MonProfilVendeur.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="MonProfilVendeur.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="nav-barre">
            <ul>
                <li><a href="../Achat/Achat-menu.php">ACHAT</a></li>
                <li class="actif"><a href="#">COMPTE</a></li>
                <li><a href="../vente/Vendre.php">VENTE</a></li>
            </ul>
        </div>
        <div class="imgFond">
            <img src="<?php echo $nomFond;?>">
            <div class="imgProfil">
                <img src="<?php echo $nomAvatar;?>">
            </div>
        </div>
        <div class="pseudo">
            <p class="rose"><?php echo $pseudo;?></p>
        </div>
        <div class="nomPrenomEmail">
            <p class="vert">Prénom :</p><p class="blanc"><?php echo $prenom;?></p>
            <p class="vert">Nom :</p><p class="blanc"><?php echo $nom;?></p>
            <p class="vert">Email :</p><p class="blanc"><?php echo $email;?></p>
        </div>

        <?php
            echo '<p class="verte">Offres attendant votre réponse</p>';
            
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
                echo '<div class="info">';
                echo '<p class="rose">' . $nomItem[$m] .'</p>';
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
                echo '<div class="offreP"><p>'. $pseudoAcheteur[$m] . ' offre £ </p><p class="udrlg">' . $prixAcheteur[$m] . '</p>.</div>';
                echo '<p>Vous aviez proposé £'. $prixVendeur[$m] . '.</p>';
                echo '<div class="propositions">';
                echo '<div class="accepter"><span name="A'. $idItem[$m] .'" class="accept">Accepter ' . "l'offre". '</span></div>';
                if($nbrOffre[$m]<5){
                    echo '<div class="redo"><span name="'. $idItem[$m] .'" class="refaire">Refaire une offre</span></div>';
                }else{
                    echo '<div class="redo"><span name="'. $idItem[$m] .'" class="refaire">Annuler '. "l'offre" . '</span></div>';
                }
                echo '</div>';
                echo '<p> Nombre '. "d'offres" . ' : ' . $nbrOffre[$m] ;
                echo '</div>';
            }

            echo '</div>';
        ?>
        <form action="" enctype="multipart/form-data" method="POST" id="hiddenForm">
            <input type="hidden" id="hString" name="hiddenString" /> 
        </form>
    </div>
    </body>  
</html>