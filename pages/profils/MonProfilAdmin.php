<?php
    session_start();

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
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
    }
    mysqli_close($db_handle);
?>


<html>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='MonProfilAdmin.css'>
	<title>Mon Compte Admin</title>
</head>
<body>
	<input type="hidden" id="hiddenFond" name="hiddenFond" />

    <div class="container">
        <div class="admin-bottom" style="background-image: url(../../images/Fond/fond-choix1.jpg);">
            <h1>MON COMPTE</h1>
            <div class="profil">
                <img src="../../images/Avatar/avatar-admin.png" alt="Avatar compte">
                <h3><?php echo $pseudo; ?></h3>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="center">
            <div class="split"><h1>Type de compte:</h1><h1>Administrateur</h1></div>
            <div class="nomPrenom">
                <div class="split"><h1>Nom:</h1><h1><?php echo $nom; ?></h1></div>
                <div class="split"><h1>Prenom:</h1><h1><?php echo $prenom; ?></h1></div>
            </div>
            <div class="adresse">
                <div class="split"><h1>Email:</h1><h1><?php echo $email; ?></h1></div>
            </div>
        </div>
        <div class="split special"><h1>Image de fond:</h1></div>
        <ul class="categorie">
            <li id="fond-choix1.jpg" class="catBtn"><img id="fond-choix1" src="../../images/Fond/fond-choix1.jpg" alt="fond1"></li>
            <li id="fond-choix2.jpg" class="catBtn"><img id="fond-choix2" src="../../images/Fond/fond-choix2.jpg" alt="fond2"></li>
            <li id="fond-choix3.jpg" class="catBtn"><img id="fond-choix3" src="../../images/Fond/fond-choix3.jpg" alt="fond3"></li>
        </ul>
    </div>
		
	</div>
</body>
</html>