<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Sign Up</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='SignUpNext.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data" class="loginForm">
                    <h2>Formulaire pour devenir<br>Vendeur</h2>
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
                    <input type="submit" id="btn" name="btnInscription" value="S'inscrire" class="txtInpt txtInptBtn">
                </form>
            </div>
        </div>
    </body>
</html>