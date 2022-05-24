<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <title>Document</title>
</head>

<body>
    <div id="tout">
        <?php
        include "getRacine.php";
        ?>

        <div id="entete">
            <?php
            include "$racine/vue/entete.php";
            ?>
        </div>

        <div id="menu">
            <?php
            include "$racine/vue/menu.php";
            ?>
        </div>
        <?php

        include "$racine/controleur/controleurPrincipal.php";


        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        } else {

            $action = "defaut";
        }

        $fichier = controleurPrincipal($action);
        include "$racine/controleur/$fichier";

        ?>
    </div>
</body>

</html>