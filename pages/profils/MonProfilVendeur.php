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

        $sql = "SELECT * FROM vendeur WHERE ID = $id";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            $nomAvatar = "../../images/" . $data['img_profil'];
            $nomFond = "../../images/" . $data['img_fond'];
        }
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
        <!-- <script src='main.js'></script> -->
    </head>
    <body>
        <div class="imgFond">
            <img src="<?php echo $nomFond;?>">
        </div>
        <div class="imgProfil">
            <img src="<?php echo $nomAvatar;?>">
        </div>
        <div class="pseudo">
            <p class="rose"><?php echo $pseudo;?></p>
        </div>
        <div class="nomPrenomEmail">
            <p class="vert">Prénom :</p><p class="blanc"><?php echo $prenom;?></p>
            <p class="vert">Nom :</p><p class="blanc"><?php echo $nom;?></p>
            <p class="vert">Email :</p><p class="blanc"><?php echo $email;?></p>
        </div>
        <div class="container">
            
        </div>
    </body>  
</html>