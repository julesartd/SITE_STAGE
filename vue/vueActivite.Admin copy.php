<head>
    <meta charset="UTF-8">
    <title>Des select liés entre eux en HTML5 et JQuery</title>
    <script src="modele/fonction_javascript.php"></script>
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
        <div>
            <label for="countries" class="required">Séléctionner classe :</label>
            <select id="countries" name="selectoui" content-type="choices" trigger="true" target="department">
                <?php
                foreach ($listeClasse as $uneClasse) {
                ?>
                    <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . $uneClasse["nomDiplome"]; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div>
            <label for="department" class="required">Séléctionner la compétence :</label>
            <select id="department" name="selectCompetence" content-type="choices">
                <?php
                foreach ($listeClasse as $uneClasse) {
                    $listeCompetence = getCompetenceChapeauBydiplome($uneClasse['idDiplome']);
                ?>
                    <optgroup reference=<?php echo $uneClasse['idClasse']; ?> style="display: none;">
                        <?php
                        foreach ($listeCompetence  as $uneCompetence) {
                        ?>
                            <option value=<?php echo $uneCompetence['idCompetence']; ?>><?php echo $uneCompetence['libelleCompetence'] . " " . $uneCompetence['intituleCompetence']; ?></option>
                        <?php
                        }
                        ?>
                    </optgroup>
                <?php
                }
                ?>
            </select>

        </div>

        <br>
        <input type="submit" value="AJOUTER" name="btnAjoutActivite">



       <!-- <select name="selectClasse" onChange='Choix(this.form)'>
            <OPTION value="">-- Choisissez une classe ---</OPTION>
            <?php
            foreach ($listeClasse as $uneClasse) {
            ?>
                <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . $uneClasse["nomDiplome"]; ?></option>
            <?php
            }
            ?>
        </select>

        <SELECT NAME="Page">
            <OPTION>-- Choisissez une page ---</OPTION>
            <OPTION></OPTION>
            <OPTION></OPTION>
            <OPTION></OPTION>
        </SELECT>

        <SELECT NAME="Page1">
            <OPTION>-- Choisissez une page ---</OPTION>
            <OPTION></OPTION>
            <OPTION></OPTION>
            <OPTION></OPTION>
        </SELECT> -->

        <select id="niveauClasse" name="niveauClasse" onchange="souscat();">
            <option value="0"></option>
            <?php
            foreach ($listeClasse as $uneClasse) {
            ?>
                <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . $uneClasse["nomDiplome"]; ?></option>
            <?php
            }
            ?>
        </select>

        <div id= "conteneur">
            
        </div>
    </form>
</body>