<?php

	$search = isset($_POST["research"])? $_POST["research"] : "";
	
	$database = "piscine";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if (!empty($_REQUEST["hiddenEtat"]))$etat = $_REQUEST["hiddenEtat"];
	else $etat = "";

	if (!empty($_REQUEST["hiddenRecherche"]))$rechercher = $_REQUEST["hiddenRecherche"];
	else $rechercher = "";
	
	function sortLettre($tmp) {
		switch ($tmp) {
			case "Tr":
				return "tresor";
				break;
			case "Mu": 
				return "musee";
			break;
			case "Ac":
				return "accessoire-vip";
			break;
			case "To":
				return "";
			break;
		}
	}
	
	if ($db_found) {
		
		$tmpRequest = "";
		switch (strlen($rechercher)) {
			case 1:
				$tmpRequest .= ") ORDER BY prix DESC"; // BUG PROBABLE Prix et etat prix: FIXED
				break;
			case 2:
				$tmpRequest .= " AND categorie like '%";
				$tmpRequest .= sortLettre($rechercher);
				$tmpRequest .= "%'";
				$tmpRequest .= ")";
				$tmpRequest .= " ORDER BY prix DESC";
				break;
			case 3:
				// echo "Test";
				// echo "<br>";
				// echo $rechercher;
				// echo "<br>";
				// echo "Fin test";
				// echo "<br>";
				$tmpRequest .= " AND categorie like '%";
				$tmpRequest .= sortLettre(substr(0, strlen($rechercher) -1)); // BUG PROPABLE cat et prix: FIXED
				$tmpRequest .= "%'";
				$tmpRequest .= ")";
				$tmpRequest .= " ORDER BY prix ASC";
				break;
		}
		if(isset($_POST["researchBtn"])){
			
            if(!empty($search)){
				$sql = "SELECT * FROM item WHERE (nom like '%$search%' OR categorie like '%$search%' OR etat like '%$search%')";
            	$result = mysqli_query($db_handle, $sql);
			} else {
				$sql = "SELECT * FROM item WHERE (etat like '%$etat%'";
				if($tmpRequest != ""){
					// $sql .= ")";
					$sql .= $tmpRequest;
				}
				else $sql .= ")";
				echo $tmpRequest;
				echo "<br>";
				echo $sql;
				$result = mysqli_query($db_handle, $sql);
			}
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
			<li id="Tr">
				<h3>TRÉSOR</h3>
			</li>
			<li id="Mu">
				<h3>MUSÉE</h3>
			</li>
			<li id="Ac">
				<h3>ACCESSOIRES VIP</h3>
			</li>
			<li id="To">
				<h3>Tous</h3>
			</li>
			<li id="P">
				<h3>Trier par Prix</h3>
			</li>
		</ul>
	</div>
	<div class="column">
		<form action="" enctype="multipart/form-data" method="POST" id="formSearch">
			<input type="text" name="research" class="inptTxt"/>
			<input type="submit" name="researchBtn" class="inptBtn"/>
			<input type="hidden" id="hiddenEtat" name="hiddenEtat" />
			<input type="hidden" id="hiddenRecherche" name="hiddenRecherche" />
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