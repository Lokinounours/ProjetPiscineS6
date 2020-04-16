<?php
    //session_start();
    // $idVendeur = $_SESSION['id'];

    $idVendeur = 60;

    $database = "piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $sql = "SELECT * FROM item WHERE IDprop = $idVendeur";
        $result = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM vendeur WHERE ID = $idVendeur";
        $result2 = mysqli_query($db_handle, $sql);

        $imgProfil = "../../images/";
        $imgFond = "../../images/";
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
			<li>ACHAT</li>
			<li>Compte</li>
			<li class="actif">VENTE</li>
		</ul>
	</div>
        <div class="container">
            <div class="fondVendre">
                <p>vendre</p>
                <div class="carteVendeur"> 
                    <div class="bckgdCarteVendeur" style="background-image: url('<?php echo $imgFond; ?>');">
                    </div>
                    <div class="imgVendeur">
                        <img src="<?php echo $imgProfil;?>">
                    </div>
                    <div class="psdVendeur">
                        <p><?php echo $pseudo;?></p>
                    </div>  
                </div>
            </div>
            <div class="btnAjouter">
                <a href="../items/AjoutItem.php"><i class="fas fa-plus"></i><p>Ajouter un nouvel item</p></a>
            </div>
            <p class="vert">Objets déjà en vente</p>
            <div class="listItems">
                <?php
                    while ($data = mysqli_fetch_assoc($result)){
                        echo '<div class="item">';
                        echo '<div class="info">';
                        echo '<p class="rose">' . $data["nom"] .'</p>';
                        echo '<p class="prix">' . $data["prix"] .'£</p>';
                        echo '</div>';
                        echo '<div class="imgItem">';
                        echo '<img src="../../images/' . $data['photo'] . '">';
                        echo '</div>';
                        echo '<div class="info2">';
                        echo '<p>' . $data["description"] .'</p>';
                        echo '<p>' . $data["categorie"] .'</p>';
                        echo '<p>' . $data["etat"] .'</p>';
                        echo '</div></div>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>