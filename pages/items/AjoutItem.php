<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : 0; // Le prix de base
    $etat = isset($_POST["etat"])? $_POST["etat"] : ""; // Le type de vente
    $checkPhoto = false;
    $checkVideo = false;
    
    $database = "piscine";
    $finalString = "";
    $goodOrNot = true;
    
    if (!empty($_REQUEST["hiddenCategorie"]))$categorie = $_REQUEST["hiddenCategorie"];
    else $categorie = "empty";

    if (!empty($_REQUEST["hiddenEnchere"]))$enchere = $_REQUEST["hiddenEnchere"];
    else $enchere = "empty";

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
            if($prix==0){
                $finalString .= "Le champ Prix doit être rempli. <br>";
                $goodOrNot = false;
            }
            if($categorie=="empty"){
                $finalString .= "L'objet doit avoir une catégorie. <br>";
                $goodOrNot = false;
            }
            if($enchere=="empty"){
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

            if($goodOrNot){

                // session_start();
                // $idProp = $_SESSION['id'];

                $idProp = 60;

                $sql = "INSERT INTO item(nom, description, photo, video, prix, categorie, IDprop, etat) 
                        VALUES('$nom', '$description', '$imgNom1', '$imgNom2', '$prix', '$categorie', '$idProp', '$enchere')";
                mysqli_query($db_handle, $sql);
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
			<li>ACHAT</li>
			<li>Compte</li>
			<li>VENTE</li>
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
                <li id="tresor" class="catBtn"><img id="tresor" src="../../images/Menu/categories/trésor.png" alt="Tresor"></li>
                <li id="musee" class="catBtn"><img id="musee" src="../../images/Menu/categories/musée.png" alt="Musee"></li>
                <li id="accessoire-vip" class="catBtn"><img id="accessoire-vip" src="../../images/Menu/categories/accessoire-vip.png"
                        alt="Accessoire VIP"></li>
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
                        <td><textarea maxlength="255" name="description" class="btn colorSync" type="text" placeholder="Description"
                                rows="10" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Prix</h1>
                        </td>
                        <td><input
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="11" name="prix" class="btn colorSync" type="number" placeholder="Prix"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" name="filePhoto" class="inputfile"
                                data-multiple-caption="{count} files selected" multiple />
                            <label class="btn colorSync" for="filePhoto">Photo</label>
                        </td>

                        <td>
                            <input type="file" name="fileVideo" class="inputfile"
                                data-multiple-caption="{count} files selected" multiple />
                            <label class="btn colorSync" for="fileVideo">Video</label>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="enchereTitre"><h3>Selectionner un type de vente</h3></div>
            <ul class="enchere">
                <li id="ench1" class="enchBtn"><img class="colorSync" id="Enchere" src="../../images/Logo/logo-enchere.png" alt="Enchere"></li>
                <li id="ench2" class="enchBtn"><img class="colorSync" id="VenteInsta" src="../../images/Logo/logo-achat-imédiat.png" alt="Vente Insta"></li>
                <li id="ench3" class="enchBtn"><img class="colorSync" id="MeilleurProposition" src="../../images/Logo/logo-meilleure-offre.png"
                        alt="Meilleur Proposition"></li>
            </ul>
            <ul class="listEnchere">
                <li><h3>Enchère</h3></li>
                <li><h3>Vente instantanée</h3></li>
                <li><h3>Meilleur proposition</h3></li>
            </ul>


            <div class="btnFinal"><input type="submit" id="btn" name="btnInscription" value="Soumettre" class="btn colorSync"></div>
        </form>
    </div>

    <div class="test"></div>
</body>

</html>