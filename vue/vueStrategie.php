<form method="POST" class="lb mb-3" action="?action=strategie">

    <select aria-label="Default select example" name="classe" onChange="submit()">
        <?php

        if (isset($_POST['classe'])) {
        ?>
            <option value="<?php echo $uneClasseId['idClasse']; ?>" selected><?php echo $uneClasseId['niveauClasse'] . ' ' . $uneClasseId['nomDiplome'] ?></OPTION>
        <?php
        }else {?>
        
        <option selected>-- Choisissez une Classe --</OPTION>
        <?php

        }
        ?>
        

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }


        ?>
    </select>


</form>