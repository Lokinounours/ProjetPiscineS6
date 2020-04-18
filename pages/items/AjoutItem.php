<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : ""; // Le prix de base
    $etat = isset($_POST["etat"])? $_POST["etat"] : ""; // Le type de vente
    $dateExpiration = isset($_POST["DateExpiration"])? $_POST["DateExpiration"] : ""; // Date de l'enchère
    $heureExpiration = isset($_POST["HeureExpiration"])? $_POST["HeureExpiration"] : "";
    $prixEnchere = isset($_POST["prixEnchere"])? $_POST["prixEnchere"] : "";
    $prixOffre = isset($_POST["prixOffre"])? $_POST["prixOffre"] : "";
    $checkPhoto = false;
    $checkVideo = false;
    
    $database = "piscine";
    $finalString = "";
    $goodOrNot = true;

    session_start();

    $admin = $_SESSION['admin'];
    $vendeur = $_SESSION['vendeur'];
    $acheteur = $_SESSION['acheteur'];
    
    if (!empty($_REQUEST["hiddenCategorie"]))$categorie = $_REQUEST["hiddenCategorie"];
    else $categorie = "";

    if (!empty($_REQUEST["hiddenEnchere"]))$enchere = $_REQUEST["hiddenEnchere"];
    else $enchere = "";

    if (isset($_POST["btnInscription"])) {

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $checkPhoto = is_uploaded_file($_FILES['filePhoto']['tmp_name']);
        $checkVideo = is_uploaded_file($_FILES['fileVideo']['tmp_name']);

        if ($db_found) {
            if($nom==""){
                $finalString .= "Le champ Nom doit être rempli. <br>";
                $goodOrNot = false;
            }
            if($categorie==""){
                $finalString .= "L'objet doit avoir une catégorie. <br>";
                $goodOrNot = false;
            }
            if($enchere==""){
                $finalString .= "L'objet doit avoir au moins un mode de vente. <br>";
                $goodOrNot = false;
            }

            if($checkPhoto && $checkVideo){
                $imgNom1 = $_FILES['filePhoto']['name'];
                $imgNom2 = $_FILES['fileVideo']['name'];
            }elseif($checkPhoto && !$checkVideo){
                $imgNom1 = $_FILES['filePhoto']['name'];
                $imgNom2 = "null.jpg";
            }elseif(!$checkPhoto && $checkVideo){
                $imgNom1 = "null.jpg";
                $imgNom2 = $_FILES['fileVideo']['name'];
            }else{
                $imgNom1 = "null.jpg";
                $imgNom2 = "null.jpg";
            }

            if(strstr($enchere, "E")) {
                if($dateExpiration==""){
                    $finalString .= "Le champ Date de fin d'enchère doit être rempli. <br>";
                    $goodOrNot = false;
                }
                if($prixEnchere==""){
                    $finalString .= "Le champ Prix de début d'enchère doit être rempli. <br>";
                    $goodOrNot = false;
                }
                if($heureExpiration==""){
                    $finalString .= "Le champ Heure de fin d'enchère doit être rempli. <br>";
                    $goodOrNot = false;
                }
            }

            if(strstr($enchere, "I")) {
                if($prix==""){
                    $finalString .= "Le champ Prix de vente immédiate doit être rempli. <br>";
                    $goodOrNot = false;
                }
            }

            if(strstr($enchere, "M")) {
                if($prixOffre==""){
                    $finalString .= "Le champ Prix de meilleure offre doit être rempli. <br>";
                    $goodOrNot = false;
                }
            }

            if($goodOrNot){

                $idProp = $_SESSION['id'];

                // COMME QUE E Ou M il fallait update le prix
                if ($enchere == "E")$prix = $prixEnchere;
                if ($enchere == "M")$prix = $prixOffre;

                $sql = "INSERT INTO item(nom, description, photo, video, prix, categorie, IDprop, etat) 
                        VALUES('$nom', '$description', '$imgNom1', '$imgNom2', '$prix', '$categorie', '$idProp', '$enchere')";
                mysqli_query($db_handle, $sql);
                echo $sql;

                $last_id = mysqli_insert_id($db_handle);
                $idAcheteur = 0;


                // Pour les transactions on a pas l'ID de l'item donc à ajouter DERNIER ITEM + 1
                // Ou on attend la fin de la requette et on demande le last item

                if(strstr($enchere, "E")) {
                    $sql = "INSERT INTO enchere(IDitem, IDvendeur, IDacheteur, prixHaut, dateFin, heureFin) 
                        VALUES('$last_id', '$idProp', '$idAcheteur', '$prixEnchere', '$dateExpiration', '$heureExpiration')";
                    mysqli_query($db_handle, $sql);
                    echo $sql;
                }

                if(strstr($enchere, "M")) {
                    $nbrOffre = 1;
                    $prixAcheteur = -1; 
                    $sql = "INSERT INTO meilleure_offre(IDitem, IDvendeur, IDacheteur, prixVendeur, prixAcheteur, nbreOffre) 
                        VALUES('$last_id', '$idProp', '$idAcheteur', '$prixOffre', '$prixAcheteur', '$nbrOffre')";
                    mysqli_query($db_handle, $sql);
                    echo $sql;
                }

            }
        }
        mysqli_close($db_handle);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="AjoutItem.js"></script>
    <link rel="stylesheet" href="AjoutItem.css">
    <title>Proposition de Vente Item</title>
</head>

<body>

    <div class="nav-barre">
        <ul>
            <a href="../Achat/Achat-menu.php">
                <li>ACHAT</li>
            </a>
            <?php
				if($admin){
					echo '<a href="../profils/MonProfilAdmin.php"><li>Compte</li></a>';
				}elseif($vendeur){
					echo '<a href="../profils/MonProfilVendeur.php"><li>Compte</li></a>';
				}elseif($acheteur){
					echo '<a href="../profils/MonProfilAcheteur.php"><li>Compte</li></a>';
				}else{
					echo '<a href="../connection/SignUpVendeur.php"><li>'."INSCRIPTION".'</li></a>';
				}
			?>
            <a href="../vente/Vendre.php">
                <li>VENTE</li>
            </a>
        </ul>
    </div>
    <div class="container">
        <?php 
            if($finalString != ""){
                echo '<div class="finalString"><p>Veuillez modifier vos données afin d éviter le(s) erreur(s) suivante(s).</p><p>' . $finalString .'</p></div>';
            }
        ?>
        <div class="section colorSync">
            <h1>Selectionner la catégorie de votre item</h1>
        </div>
        <form action="" enctype="multipart/form-data" method="POST">

            <input type="hidden" id="hiddenCategorie" name="hiddenCategorie" />
            <input type="hidden" id="hiddenEnchere" name="hiddenEnchere" />

            <ul class="categorie">
                <li id="tresor" class="catBtn"><img id="tresor" src="../../images/Menu/categories/trésor.png"
                        alt="Tresor"></li>
                <li id="musee" class="catBtn"><img id="musee" src="../../images/Menu/categories/musée.png" alt="Musee">
                </li>
                <li id="accessoire-vip" class="catBtn"><img id="accessoire-vip"
                        src="../../images/Menu/categories/accessoire-vip.png" alt="Accessoire VIP"></li>
            </ul>

            <div class="listForm">
                <table>
                    <tr>
                        <td>
                            <h1>Titre de l'article</h1>
                        </td>
                        <td><input maxlength="30" name="nom" class="btn colorSync" type="text" placeholder="titre"></td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Description</h1>
                        </td>
                        <td><textarea maxlength="100" name="description" class="btn colorSync" type="text"
                                placeholder="Description" rows="4" cols="25"></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Photo:</h1>
                            <input type="file" name="filePhoto" class="custom-file-input colorSync">
                        </td>

                        <td>
                            <h1>Vidéo:</h1>
                            <input type="file" name="fileVideo" class="custom-file-input colorSync">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="enchereTitre">
                <h3>Selectionner un type de vente</h3>
            </div>
            <ul class="enchere">
                <li id="ench1" class="enchBtn"><img class="colorSync" id="Enchere"
                        src="../../images/Logo/logo-enchere.png" alt="Enchere"></li>
                <li id="ench2" class="enchBtn"><img class="colorSync" id="VenteInsta"
                        src="../../images/Logo/logo-achat-imédiat.png" alt="Vente Insta"></li>
                <li id="ench3" class="enchBtn"><img class="colorSync" id="MeilleurProposition"
                        src="../../images/Logo/logo-meilleure-offre.png" alt="Meilleur Proposition"></li>
            </ul>
            <ul class="listEnchere">
                <li>
                    <h3>Enchère</h3>
                </li>
                <li>
                    <h3>Vente instantanée</h3>
                </li>
                <li>
                    <h3>Meilleur proposition</h3>
                </li>
            </ul>


            <div class="date dNone">
                <h1>Date d'expiration de l'enchère </h1>
                <input id="YESS" type="date" name="DateExpiration" placeholder="" class="txtInpt">

                <h1>Heure d'expiration de l'enchère </h1>
                <input id="NOO" type="time" name="HeureExpiration" placeholder="" class="txtInpt">

                <h1>Prix de dépard de l'enchère</h1>
                <input
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="11" name="prixEnchere" class="btn colorSync" type="number" placeholder="Prix Enchère">

            </div>

            <div class="prixIm iNone">

                <h1>Prix de vente</h1>
                <input
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="11" name="prix" class="btn colorSync" type="number" placeholder="Prix">
            </div>


            <div class="offre oNone">

                <h1>Prix de départ de la Meilleur Offre</h1>
                <input
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="11" name="prixOffre" class="btn colorSync" type="number" placeholder="Prix Offre">

            </div>

            <div class="btnFinal"><input type="submit" id="btn" name="btnInscription" value="Soumettre"
                    class="btn colorSync"></div>
        </form>
    </div>

</html>
</body>