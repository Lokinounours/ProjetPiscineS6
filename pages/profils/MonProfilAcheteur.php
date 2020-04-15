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

        $sql = "SELECT * FROM acheteur WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $adresse = $data['adresse_1'];
            $ville = $data['ville'];
            $codePostal = $data['code_postal'];
            $pays = $data['pays'];
            $numTelephone = $data['numero_tel'];
        }
    }
    mysqli_close($db_handle);
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='MonProfilAcheteur.css'>
    <title>Mon Compte Acheteur</title>
</head>

<body>
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
        <div class="nomPrenom">
            <h2>Nom: <?php echo $nom; ?></h2>
            <h2>Prenom: <?php echo $prenom ?></h2>
        </div>
    </div>
</body>

</html>