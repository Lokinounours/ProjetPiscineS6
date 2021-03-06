<?php

    session_start();

    $_SESSION['admin'] = false;
    $_SESSION['vendeur'] = false;
    $_SESSION['acheteur'] = false;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Home.css'>
    <script src="https://kit.fontawesome.com/c8438c3908.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <div class="container">
        <img src="../images/Menu/boussole.gif" class="bousole"></img>
        <div class="pgDown animateInf"><a href="#categorie"><i class="fas fa-arrow-down"></i></a></div>
        <ul class="animate">
            <a href="./connection/Login.php">
                <li>Se Connecter</li>
            </a>
            <a href="./connection/SignUpChoix.php">
                <li>S'inscrire</li>
            </a>
            <a href="./Achat/Achat-menu.php">
                <li>Nos produits</li>
            </a>
        </ul>
    </div>
    <div class="categorie" id="categorie">
        <div class="content-categorie">
            <div class="content-top">
                <ul>
                    <li>CATEGORIE</li>
                    <li>CATEGORIE</li>
                    <li>CATEGORIE</li>
                </ul>
                <img src="../images/Menu/fusée.gif" alt="Une fusée">
            </div>
            <div class="content-bottom">
                <li>
                    <img src="../images/Menu/categories/trésor.png" alt="trésor">
                    <h3>Trésor</h3>
                </li>
                <li>
                    <img src="../images/Menu/categories/musée.png" alt="statue de la liberté">
                    <h3>Musée</h3>
                </li>
                <li>
                    <img src="../images/Menu/categories/accessoire-vip.png" alt="montre de luxe">
                    <h3>Accésoire VIP</h3>
                </li>
            </div>
        </div>
    </div>
    <div class="presentation">
        <h1>Commander Simplement</h1>
        <ul>
            <li>
                <img src="../images/Menu/CommandeSimplement/quickly.gif" alt="Rapidité">
                <div>
                    <h3>Rapidité</h3>
                    <p>Nos livraisons sont assurées en 48h ouvrées. Nos partenaires vous permettent de profiter de
                        l'ensemble des systèmes de livraisons : à votre domicile, ou dans vos commerces de proximité.

                        <br>* En raison de la pandémie du covid-19 : certaines livraisons non prioritaires peuvent être
                        retardées.
                    </p>
                </div>
            </li>
            <li>
                <div>
                    <h3>Efficacité</h3>
                    <p>Trouvez tous les produits que vous souhaitez grace à notre grande variété de choix. Un conseiller
                        peut vous aider dans la réalisation de votre commande ou pour répondre à vos questions dans le
                        formulaire de contact en bas de page.</p>
                </div>
                <img src="../images/Menu/CommandeSimplement/efficiently.gif" alt="Efficacité">
            </li>
            <li>
                <img src="../images/Menu/CommandeSimplement/safely.gif" alt="Sécurité">
                <div>
                    <h3>Sécurité</h3>
                    <p>Notre processus de paiement est sécurisé. A chaque commande que vous effectuez vous êtes protégé.
                        Vos
                        cartes de crédits ne sont pas enregistrées ainsi personne ne peut usurper votre identité
                        bancaire.
                    </p>
                </div>
            </li>
        </ul>
    <footer>
        <h2>CopyRight ECE-Bay 2020</h2>
        <h5>jules@edu.ece.lestrade.fr.io</h5>
    </footer>
    </div>
</body>

</html>