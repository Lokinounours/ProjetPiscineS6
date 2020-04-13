<?php
    $login = isset($_POST["lgn"])? $_POST["lgn"] : "";
    $password = isset($_POST["pwd"])? $_POST["pwd"] : "";
    $ID = "";

    $database = "piscine";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["btnLogin"])) {
        if ($db_found) {
            $sql = "SELECT * FROM identification WHERE email LIKE '%$login%'";
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "no User found";
            } else {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "ID: " .$data["ID"]. "<br>";
                    echo "Nom: " .$data["nom"]. "<br>";
                    echo "Prenom: " .$data["prenom"]. "<br>";
                    echo "<br>";

                    $ID = $data["ID"];

                    $sqlID = "SELECT * FROM admin WHERE ID=$ID";
                    $testID = mysqli_query($db_handle, $sqlID);
                    if (mysqli_num_rows($testID) != 0)echo "ID: $ID est bien un admin";
                    else echo "Didn't found any admin";
                }
            }
        } else { // Sinon
            echo "Database not found";
        }
    }

    mysqli_close($db_handle);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Login</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='Login.css'>
        <!-- <script src='main.js'></script> -->
    </head>

    <body>
        <div class="container">
            <div class="card">
                <form action="" method="POST" class="loginForm">
                    <h2>Bienvenue sur ECE-Bay</h2>
                    <input type="text" name="lgn" placeholder="Login">
                    <input type="password" name="pwd" placeholder="Password">
                    <input class="btn" type="submit" name="btnLogin" value="Connection">
                </form>
            </div>
        </div>
    </body>

    </html>