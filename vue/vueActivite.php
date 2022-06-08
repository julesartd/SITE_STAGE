<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une activité</h1>
    </br>



    
    <input type="text" name='txtNom' placeholder="Nom de l'activité">

    <select  aria-label="Default select example" name="diplome">

        <option selected>Sélectionnez un diplome</option>

        <?php
        foreach ($listeDiplome as $unDiplome) {

        ?>

            <option value=<?php echo $unDiplome['idDiplome']; ?>><?php echo $unDiplome['nomDiplome']; ?></option>
        <?php
        }


        ?>
    </select>

    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutActivite">
   
</form>

<br>
<br>
