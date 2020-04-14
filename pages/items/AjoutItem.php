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
    if (isset($_POST["btnInscription"])) {
        // $categorie = $_COOKIE['alt'];
        // echo "Voici le test $categorie";
        echo $categorie;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AjoutItem.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="AjoutItem.js"></script>
    <title>Proposition de Vente Item</title>
</head>

<body>
    <div class="container">
        <h3>Selectionner la catégorie de votre item</h3>
        <form action="" method="POST">
            <ul class="categorie">
                <li id="tresor" class="catBtn"><img id="tresor" src="../../images/trésor.png" alt="Tresor"></li>
                <li id="musee" class="catBtn"><img id="musee" src="../../images/musée.png" alt="Musee"></li>
                <li id="accessoire-vip" class="catBtn"><img id="accessoire-vip" src="../../images/accessoire-vip.png" alt="Accessoire VIP"></li>
            </ul>
            <input type="hidden" id="hiddenCategorie" name="hiddenCategorie"/>
            <input type="submit" id="btn" name="btnInscription" value="S'inscrire" class="txtInpt btn txtInptBtn">
        </form>
    </div>
</body>

</html>