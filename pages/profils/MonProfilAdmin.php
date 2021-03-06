<?php
    session_start();

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $pseudo = $_SESSION['pseudo'];

    if (!empty($_REQUEST["hiddenID"]))$fullID = $_REQUEST["hiddenID"];
    else $fullID = "empty";

    if ($db_found) {

        if($fullID!="empty") {

            $type = $fullID[0];
            $id = intval(substr($fullID,1));

            $doubleType = false;

            $table = "";

            if($type == 'V'){
                $table = "vendeur";

                $sql = "SELECT * FROM acheteur WHERE ID = $id";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $doubleType = true;
                }
            }
            
            if($type == 'A'){
                $table = "acheteur";

                $sql = "SELECT * FROM vendeur WHERE ID = $id";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    $doubleType = true;
                }
            }

            if($type == 'I') {
                $table = "item";
            }

            if($table == "vendeur"){
                $sql = "DELETE FROM vendeur WHERE ID = $id";
                mysqli_query($db_handle, $sql);
                if(!$doubleType){
                    $sql = "DELETE FROM identification WHERE ID = $id";
                    mysqli_query($db_handle, $sql);
                }
            }elseif($table == "acheteur"){
                $sql = "DELETE FROM acheteur WHERE ID = $id";
                mysqli_query($db_handle, $sql);
                if(!$doubleType){
                    $sql = "DELETE FROM identification WHERE ID = $id";
                    mysqli_query($db_handle, $sql);
                }
            }elseif($table == "item"){
                $sql = "DELETE FROM item WHERE ID = $id";
                mysqli_query($db_handle, $sql);

                $sql = "DELETE FROM enchere WHERE IDitem = $id";
                mysqli_query($db_handle, $sql);

                $sql = "DELETE FROM meilleure_offre WHERE IDitem = $id";
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
        
        $sql = "SELECT * FROM identification INNER JOIN vendeur WHERE identification.ID = vendeur.ID ";
        $result2 = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM item";
        $result3 = mysqli_query($db_handle, $sql);

        $sql = "SELECT * FROM identification INNER JOIN acheteur WHERE identification.ID = acheteur.ID ";
        $result4 = mysqli_query($db_handle, $sql);
    }
    mysqli_close($db_handle);
?>


<html>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='MonProfilAdmin.css'>
    <title>Mon Profil Admin</title>
    <script src="MonProfilAdmin.js"></script>
</head>
<body>
    <div class="nav-barre">
		<ul>
			<li><a href="../Achat/Achat-menu.php">ACHAT</a></li>
			<li class="actif"><a href="#">COMPTE</a></li>
            <li><a href="../connection/deconnection.php">DECONNEXION</a></li>
			<li><a href="../vente/Vendre.php">VENTE</a></li>
		</ul>
	</div>
    <div class="container">
        <div class="admin-bottom" style="background-image: url(../../images/Fond/fond-choix1.jpg);">
            <h1>MON COMPTE</h1>
            <div class="profil">
                <img src="../../images/Avatar/avatar-admin.png" alt="Avatar compte">
                <h3 class="hBlanc"><?php echo $pseudo; ?></h3>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="center">
            <div class="split"><h1>Type de compte:</h1><h1 class="hBlanc">Administrateur</h1></div>
            <div class="nomPrenom">
                <div class="split"><h1>Nom:</h1><h1 class="hBlanc"><?php echo $nom; ?></h1></div>
                <div class="split"><h1>Prenom:</h1><h1 class="hBlanc"><?php echo $prenom; ?></h1></div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Email:</h1><h1 class="hBlanc"><?php echo $email; ?></h1></div>
            </div>
        </div>
    </div>
    <div class="Vendeurs-objets">
    	<div class="marchandises">
            <h1>Liste des Marchandises</h1>
            <div class="listMarchandises">
                <?php
                    while ($data = mysqli_fetch_assoc($result3)){
                        echo '<div class="marchandise">';
                        echo '<p> Produit : ' . $data['nom'] . '   ';
                        echo 'Prix : '. $data['prix'] . '   ';
                        echo 'Etat : '. $data['etat'] . '   ';
                        echo 'Categorie : '. $data['categorie'] . '   </p>';
                        echo '<i id="I'. $data['ID'].'" class="fas fa-times"></i>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <div class="vendeurs">
            <h1>Liste des Vendeurs</h1>
            <div class="listVendeurs">
                <?php
                    while ($data = mysqli_fetch_assoc($result2)){
                        echo '<div class="vendeur">';
                        echo '<p> Nom : ' . $data['nom'] . '   ';
                        echo 'Prenom : ' . $data['prenom'] . '   ';
                        echo 'Email : '. $data['email'] . '   ';
                        echo 'Pseudo : '. $data['pseudo'] . '   </p>';
                        echo '<i id="V'. $data['ID'].'" class="fas fa-times"></i>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <div class="acheteurs">
            <h1>Liste des Acheteurs</h1>
            <div class="listAcheteurs">
                <?php
                    while ($data = mysqli_fetch_assoc($result4)){
                        echo '<div class="acheteur">';
                        echo '<p> Nom : ' . $data['nom'] . '   ';
                        echo 'Prenom : ' . $data['prenom'] . '   ';
                        echo 'Email : '. $data['email'] . '   ';
                        echo 'Pseudo : '. $data['pseudo'] . '   </p>';
                        echo '<i id="A'. $data['ID'].'" class="fas fa-times"></i>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="ajouterSupp">
        <form action="" enctype="multipart/form-data" method="POST" id="hiddenForm">
            <input type="hidden" id="hiddenID" name="hiddenID" />
            <!-- <div class="btnFinal"><input type="submit" id="btn" name="btnInscription" value="Supprimer"
                        class="btn colorSync"></div> -->
        </form>
    </div>
</body>
</html>