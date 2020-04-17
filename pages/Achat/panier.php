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

        $sql = "SELECT * FROM achat_immediat INNER JOIN acheteur WHERE achat_immediat.IDacheteur = acheteur.ID ";
        $result2 = mysqli_query($db_handle, $sql);
    }
    mysqli_close($db_handle);
?>


<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='panier.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Panier</title>
</head>
<body>
	<div class="nav-barre">
		<ul>
			<li class="actif">ACHAT</li>
			<li>Compte</li>
			<li>VENTE</li>
		</ul>
	</div>
	<div class="container">
        <div class="achat-bottom" style="background-image: url(../../images/Fond/fond-choix2.jpg);">
            <h1>MON PANIER</h1>
            <div class="profil">
                <img src="../../images/Avatar/avatar-Compte.png" alt="Avatar compte">
                <h3><?php echo $pseudo; ?></h3>
            </div>
        </div>
    </div>
    <div class="AchatImmédiat">
    	<h1>ACHAT IMMÉDIAT :</h1>
    	
    </div>
    <div class="enchères">
    	<h1>ENCHÈRES / MEILLEURES OFFRES</h1>
    	<h1>GAGNÉES :</h1>
    </div>
    <div class="AchatImmédiat">
    	<h1>ENCHÈRES / MEILLEURES OFFRES</h1>
    	<h1>EN COURS :</h1>
    </div>
</body>
</html>
