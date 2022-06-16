<head>
    <meta charset="UTF-8">
    <title>Des select liés entre eux en HTML5 et JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="modele/fonction_java.js"></script>
</head>


<body>
    <h1 id="lstA">Créer une activité</h1>
    <form method="POST" class="lb mb-3" action="">
        Séléctionner un professeur :
        <select name="professeur">
            <?php
            foreach ($listeProf as $unProf) {
            ?>
                <option value=<?php echo $unProf['idProf']; ?>><?php echo $unProf['prenomProf'] . " " . $unProf['nomProf']; ?></option>
            <?php
            }
            ?>
        </select>
        <br><br>
        nom de l'activité : <input type="text" name='txtNomActivite' placeholder="Nom de l'activité">
        <br><br>

        <select id="niveauClasse" name="niveauClasse" onchange="listeCompetence(this.value);">
            <option value="0">--Choisir Une Classe--</option>
            <?php
            foreach ($listeClasse as $uneClasse) {
            ?>
                <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . $uneClasse["nomDiplome"]; ?></option>
            <?php
            }
            ?>
        </select>
        <br>
        <br>
        <div id="conteneur"></div>
        <br>
        <div id="oui"></div>


    </form>
</body>