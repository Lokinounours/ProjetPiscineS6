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

        
        function nb_Articles(){
            $total=0;
            for($i = 0; $i < count(IDitem); $i++)
            {
            $total += 1;
            }
        return $total;
        }
         $retour = nb_Articles();

        function prix_Tot(){
            $totalprix=0;
            for($i = 0; $i < count(IDitem); $i++)
            {
            $totalprix += prix;
            }
        return $totalprix;
        }
        $retour2 = prix_Tot();

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
    <div class="typeAchat">
        <ul>
            <li>
                <div class="AchatImmédiat">
            	   <h1>ACHAT IMMÉDIAT :</h1>
                   <div class="article">
                        <ul>
                            <li>
                                <?php
                                    echo $retour;
                                ?>
                                <h4>ARTICLES</h4>
                            </li>
                            <li>
                                <?php
                                    echo $retour2;
                                ?>
                                <h4>€ <br> MONTANT</h4>
                            </li>
                        </ul> 
                   </div>
                   <div class="listItems">
                        <?php  
                            while($data = mysqli_fetch_assoc($result2)){
                
                                $iditem = $data['IDitem'];
                                $sql = "SELECT * FROM item WHERE ID = $iditem";
                                $result3 = mysqli_query($db_handle, $sql);

                                while($data3 = mysqli_fetch_assoc($result3)){
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
                                    echo '</div>';
                                }
                            }
                       ?>
                   </div>
                   <div class="checkbox">
                       <input type="checkbox" id="accepter"name="accepter">
                       <label for="accepter">J'ai lu et j'accepte les conditions générales de vente</label>
                   </div>
            	   <div class="payer">
                       <h1>PAYER</h1>
                   </div>
                </div>
            </li>
            <li>
                <div class="enchères">
                	<h1>ENCHÈRES / MEILLEURES OFFRES</h1>
                	<h1>GAGNÉES :</h1>
                </div>
            </li>
            <li>
                <div class="AchatImmédiat">
                	<h1>ENCHÈRES / MEILLEURES OFFRES</h1>
                	<h1>EN COURS :</h1>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>
