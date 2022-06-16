<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="modele/fonction_java.js"></script>
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
        <div id="centre">
            

       
        <?php

        include "$racine/controleur/controleurPrincipal.php";


        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        } else {

            $action = "bac";
        }

        $fichier = controleurPrincipal($action);
        include "$racine/controleur/$fichier";

        ?>
    </div>
</body>

</html>