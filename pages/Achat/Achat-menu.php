<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='achat-style.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="achat-menu.js"></script>
	<title>Achat Menu</title>
</head>

<body>

	<input type="hidden" id="hiddenAchat" name="hiddenAchat" />
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
				<li>
					<img src="../../images/Logo/logo-enchere.png">
					<h3>ENCHERES</h3>
				</li>
				<li>
					<img src="../../images/Logo/logo-panier2.png">
					<h3>ACHAT IMMÉDIAT</h3>
				</li>
				<li>
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
		<ul>
			<li>
				<div class="line">
					<ul>
						<li><img src="../../images/Items/Sneakers/1.png"></li>
						<li><img src="../../images/Items/Sneakers/2.png"></li>
						<li><img src="../../images/Items/Sneakers/3.png"></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="line">
					<ul>
						<li><img src="../../images/Items/Sneakers/4.png"></li>
						<li><img src="../../images/Items/Sneakers/5.png"></li>
						<li><img src="../../images/Items/Sneakers/6.png"></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="line">
					<ul>
						<li><img src="../../images/Items/Sneakers/7.png"></li>
						<li><img src="../../images/Items/Sneakers/8.png"></li>
						<li><img src="../../images/Items/Sneakers/9.png"></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</body>

</html>