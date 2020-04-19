<?php
    session_start();

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    $pseudo = $_SESSION['pseudo'];

    if ($db_found) {

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
    <title>Mon Compte Acheteur</title>
</head>

<body>

    <input type="hidden" id="hiddenFond" name="hiddenFond" />
    <div class="nav-barre">
		<ul>
			<li><a href="../Achat/Achat-menu.php">ACHAT</a></li>
			<li class="actif"><a href="#">COMPTE</a></li>
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
            <div class="split"><h1>Type de compte:</h1><h1>Acheteur</h1></div>
            <div class="nomPrenom">
                <div class="split"><h1>Nom:</h1><h1><?php echo $nom; ?></h1></div>
                <div class="split"><h1>Prenom:</h1><h1><?php echo $prenom; ?></h1></div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Coordonnées</h1></div>
                <div class="topAdresse">
                    <div class="split"><h1>Adresse:</h1><h1><?php echo $adresse; ?></h1></div>
                    <div class="split"><h1>Ville:</h1><h1><?php echo $ville; ?></h1></div>
                </div>
                <div class="bottomAdresse">
                    <div class="split"><h1>Code Postal:</h1><h1><?php echo $codePostal; ?></h1></div>
                    <div class="split"><h1>Pays:</h1><h1><?php echo $pays; ?></h1></div>
                </div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Email:</h1><h1><?php echo $email; ?></h1></div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Téléphone:</h1><h1><?php echo $numTelephone; ?></h1></div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Paiement</h1></div>
                <div class="topAdresse">
                    <div class="split"><h1>N° de carte:</h1><h1><?php echo $numCarte; ?></h1></div>
                    <div class="split"><h1>CVV:</h1><h1><?php echo $code; ?></h1></div>
                </div>
                <div class="bottomAdresse">
                    <div class="split"><h1>Nom sur la carte:</h1><h1><?php echo $nomCarte; ?></h1></div>
                    <div class="split"><h1>Date expiration:</h1><h1><?php echo $dateExpiration; ?></h1></div>
                </div>
                <div class="bottomAdresse">
                    <div class="split"><h1>Code postal:</h1><h1><?php echo $codePostal; ?></h1></div>
                    <div class="split"><h1>Pays:</h1><h1><?php echo $pays; ?></h1></div>
                </div>
            </div>
        </div>
        <div class="split special"><h1>Image de fond:</h1></div>
        <ul class="categorie">
            <li id="fond-choix1.jpg" class="catBtn"><img id="fond-choix1" src="../../images/Fond/fond-choix1.jpg" alt="fond1"></li>
            <li id="fond-choix2.jpg" class="catBtn"><img id="fond-choix2" src="../../images/Fond/fond-choix2.jpg" alt="fond2"></li>
            <li id="fond-choix3.jpg" class="catBtn"><img id="fond-choix3" src="../../images/Fond/fond-choix3.jpg" alt="fond3"></li>
        </ul>
    </div>
</body>

</html>