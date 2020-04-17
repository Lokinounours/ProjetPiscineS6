<?php

	$search = isset($_POST["research"])? $_POST["research"] : "";
	
	$database = "piscine";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if (!empty($_REQUEST["hiddenCategorie"]))$categorie = $_REQUEST["hiddenCategorie"];
	else $categorie = "empty";
		
	if (!empty($_REQUEST["hiddenRecherche"]))$categorie = $_REQUEST["hiddenRecherche"];
    else $rechercher = "empty";
	
	if ($db_found) {

		// if(isset($_POST["researchBtn"])){
        //     $sql = "SELECT * FROM item WHERE (nom like '%$search%' OR categorie like '%$search%' OR etat like '%$search%')";
        //     $result = mysqli_query($db_handle, $sql);
		// }
		if(isset($_POST["researchBtn"])){
			$sql = "SELECT * FROM item WHERE categorie like '%$categorie%'";
			$result = mysqli_query($db_handle, $sql);
		}
		else{
            $sql = "SELECT * FROM item";
            $result = mysqli_query($db_handle, $sql);
		}
		
		mysqli_close($db_handle);
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="achat-menu.js"></script>
	<link rel='stylesheet' type='text/css' media='screen' href='achat-style.css'>
	<title>Achat Menu</title>
</head>

<body>

	<input type="hidden" id="hiddenCategorie" name="hiddenCategorie" />
	<input type="hidden" id="hiddenRecherche" name="hiddenRecherche" />

	<div class="nav-barre">
		<ul>
			<li class="actif">ACHAT</li>
			<li>Compte</li>
			<li>VENTE</li>
		</ul>
	</div>
	<div class="container">
		<div class="achat" style="background-image: url(../../images/Fond/fond-choix2.jpg);">
			<h1>ACHAT</h1>
			<ul class="categorie">
				<li id="E">
					<img src="../../images/Logo/logo-enchere.png">
					<h3>ENCHERES</h3>
				</li>
				<li id="I">
					<img src="../../images/Logo/logo-panier2.png">
					<h3>ACHAT IMMÉDIAT</h3>
				</li>
				<li id="M">
					<img src="../../images/Logo/logo-meilleure-offre.png">
					<h3>MEILLEURES OFFRES</h3>
				</li>
			</ul>
		</div>
	</div>
	<div class="categories-barre">
		<ul class="recherche">
			<li id="tresor">
				<h3>TRÉSOR</h3>
			</li>
			<li id="musee">
				<h3>MUSÉE</h3>
			</li>
			<li id="accessoires">
				<h3>ACCESSOIRES VIP</h3>
			</li>
			<li id="tous">
				<h3>Tous</h3>
			</li>
			<li id="prix">
				<h3>Trier par Prix</h3>
			</li>
		</ul>
	</div>
	<div class="column">
		<form action="" enctype="multipart/form-data" method="POST" id="formSearch">
			<input type="text" name="research" class="inptTxt"/>
			<input type="submit" name="researchBtn" class="inptBtn"/>
		</form>
		<div class="listItems">
			<?php
				while ($data = mysqli_fetch_assoc($result)){
					echo '<div class="item">';
                    echo '<div class="info">';
                    echo '<p class="rose">' . $data["nom"] .'</p>';
                    echo '<p class="prix">' . $data["prix"] .'£</p>';
                    echo '</div>';
                    echo '<div class="imgItem">';
                    echo '<img src="../../images/Items/' . $data['photo'] . '">';
                    echo '</div>';
                    echo '<div class="info2">';
                    echo '<p style="text-align: justify; margin: 0 10px">' . $data["description"] .'</p>';
                    echo '<p>' . $data["categorie"] .'</p>';
                    // echo '<p>' . $data["etat"] .'</p>';
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
	</div>
</body>

</html>