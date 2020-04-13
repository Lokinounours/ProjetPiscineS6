<?php

?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Login</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='SignUpVendeur.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST" class="loginForm">
                    <h2>Bienvenue sur ECE-Bay</h2>
                    <input type="text" name="prénom" placeholder="Prénom" class="txtInpt">
                    <input type="text" name="nom" placeholder="Nom" class="txtInpt">
                    <input type="text" name="pseudo" placeholder="Pseudo" class="txtInpt">
                    <input type="email" name="email" placeholder="Email" class="txtInpt">
                    <div class="choseFiles">
                        <div class="avatar">
                            <label>Photo</label>
                            <input type="file" name="avatar" accept="image/png, image/jpeg" class="inptFile">
                        </div>
                        <div class="fond">
                            <label>Fond</label>
                            <input type="file" name="fond" accept="image/png, image/jpeg" class="inptFile">
                        </div>
                    </div>
                    <input type="submit" name="btnInscription" value="S'inscrire" class="txtInpt">
                </form>
            </div>
        </div>
    </body>
</html>