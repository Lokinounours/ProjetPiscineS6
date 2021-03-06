<?php
	session_start();

    $admin = $_SESSION['admin'];
    $vendeur = $_SESSION['vendeur'];
    $acheteur = $_SESSION['acheteur'];

	$search = isset($_POST["research"])? $_POST["research"] : "";
	
	$database = "piscine";

	$today=date("Y-m-d");

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if (!empty($_REQUEST["hiddenEtat"]))$etat = $_REQUEST["hiddenEtat"];
	else $etat = "";
	
	if (!empty($_REQUEST["hiddenRecherche"]))$rechercher = $_REQUEST["hiddenRecherche"];
	else $rechercher = "";
	
	if (!empty($_REQUEST["hiddenID"]))$idProduit = $_REQUEST["hiddenID"];
	else $idProduit = -1;
	if($idProduit!=-1){
		if($acheteur){
			$_SESSION['idProduit'] = $idProduit;
			header('Location: ./detailAchat.php');
		}else{
			header('Location: ../connection/Login.php');
		}	
	}
	
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
				// AJOUTER CONDI POUR PAS DANS ENCHERE FINI OU MEILLEUR OFFRE FINI
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM achat_immediat)";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today')";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
				$tmpRequest .= " ) ORDER BY prix ASC";
				break;
			case 2:
				$tmpRequest .= " AND categorie like '%";
				$tmpRequest .= sortLettre($rechercher);
				$tmpRequest .= "%'";
				// AJOUTER CONDI POUR PAS DANS ENCHERE FINI OU MEILLEUR OFFRE FINI
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM achat_immediat)";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today')";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
				$tmpRequest .= " ) ORDER BY prix DESC";
			break;
			case 3:
				$tmpRequest .= " AND categorie like '%";
				$tmpRequest .= sortLettre(substr($rechercher , 0, strlen($rechercher) -1));
				$tmpRequest .= "%'";
				// AJOUTER CONDI POUR PAS DANS ENCHERE FINI OU MEILLEUR OFFRE FINI
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM achat_immediat)";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today')";
				$tmpRequest .= " AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
				$tmpRequest .= " ) ORDER BY prix ASC"; 
				break;
		}
		if(isset($_POST["researchBtn"])){
			if(!empty($search)){
				// AJOUTER CONDI POUR PAS DANS ENCHERE FINI OU MEILLEUR OFFRE FINI
				$sql = "SELECT * FROM item WHERE (nom like '%$search%' OR categorie like '%$search%' OR etat like '%$search%') AND ID NOT IN (SELECT IDitem FROM achat_immediat) AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today') AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
				$result = mysqli_query($db_handle, $sql);
			} else {

				$sql = "SELECT * FROM item WHERE (etat like '%$etat%'";

				if($tmpRequest != "") {
					$sql .= $tmpRequest;
				}
				else {
					$sql .= ")";
					// AJOUTER CONDI POUR PAS DANS ENCHERE FINI OU MEILLEUR OFFRE FINI
					$sql .= " AND ID NOT IN (SELECT IDitem FROM achat_immediat)";
					$sql .= " AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today')";
					$sql .= " AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
				}
				$result = mysqli_query($db_handle, $sql);
			}
		}
		else{
            $sql = "SELECT * FROM item WHERE ID NOT IN (SELECT IDitem FROM achat_immediat) AND ID NOT IN (SELECT IDitem FROM enchere WHERE dateFin < '$today') AND ID NOT IN (SELECT IDitem FROM `meilleure_offre` WHERE dernier = 'X')";
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
	<title>Achat</title>
</head>

<body>

	<div class="nav-barre">
		<ul>
			<li class="actif">ACHAT</li>
			<?php
				if($admin){
					echo '<a href="../profils/MonProfilAdmin.php"><li>COMPTE</li></a>';
					echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}elseif($acheteur){
					echo '<a href="../profils/MonProfilAcheteur.php"><li>COMPTE</li></a>';
					echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}elseif($vendeur){
					echo '<a href="../profils/MonProfilVendeur.php"><li>COMPTE</li></a>';
					echo '<a href="../connection/deconnection.php"><li>DECONNEXION</li></a>';
				}else{
					echo '<a href="../connection/SignUpAcheteur.php"><li>'."INSCRIPTION".'</li></a>';
				}
			?>
			<a href="../vente/Vendre.php"><li>VENTE</li></a>
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
			<input type="text" name="research" class="inptTxt" placeholder="Rechercher"/>
			<input type="submit" name="researchBtn" class="inptBtn"/>
			<input type="hidden" id="hiddenEtat" name="hiddenEtat" />
			<input type="hidden" id="hiddenRecherche" name="hiddenRecherche" />
			<input type="hidden" id="hiddenID" name="hiddenID" />
		</form>
		<div class="listItems">
			<?php
				while ($data = mysqli_fetch_assoc($result)){
					echo '<div class="item" id=' . $data["ID"] . '>';
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