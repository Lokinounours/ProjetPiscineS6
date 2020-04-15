<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : ""; // Le prix de base
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    $video = isset($_POST["video"])? $_POST["video"] : "";
    $etat = isset($_POST["etat"])? $_POST["etat"] : ""; // Le type de vente
    
    $database = "piscine";
    
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    
    if (!empty($_REQUEST["hiddenCategorie"]))$categorie = $_REQUEST["hiddenCategorie"];
    else $categorie = "empty";

    if (!empty($_REQUEST["hiddenEnchere"]))$enchere = $_REQUEST["hiddenEnchere"];
    else $enchere = "empty";

    if (isset($_POST["btnInscription"])) {
        // echo $categorie . "<br>"; // les echos font disparaître les catégories ?
        // echo $enchere;
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
    <div class="container">
        <div class="section colorSync">
            <h1>Selectionner la catégorie de votre item</h1>
        </div>
        <form action="" method="POST">

            <input type="hidden" id="hiddenCategorie" name="hiddenCategorie" />
            <input type="hidden" id="hiddenEnchere" name="hiddenEnchere" />

            <ul class="categorie">
                <li id="tresor" class="catBtn"><img id="tresor" src="../../images/Menu/categories//trésor.png" alt="Tresor"></li>
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
                        <td><input maxlength="30" class="btn colorSync" type="text" placeholder="titre"></td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Description</h1>
                        </td>
                        <td><textarea maxlength="255" class="btn colorSync" type="text" placeholder="Description"
                                rows="10" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Prix</h1>
                        </td>
                        <td><input
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="11" class="btn colorSync" type="number" placeholder="Prix"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" name="file" id="file" class="inputfile"
                                data-multiple-caption="{count} files selected" multiple />
                            <label class="btn colorSync" for="file">Photo</label></td>

                        <td><input type="file" name="file" id="file" class="inputfile"
                                data-multiple-caption="{count} files selected" multiple />
                            <label class="btn colorSync" for="file">Video</label></td>
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