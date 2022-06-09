<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une activité</h1>   

    
    <input type="text" name='txtNomActivite' placeholder="Nom de l'activité">

    <select  aria-label="Default select example" name="classe" onChange="submit()" >

  

        

        <?php
        foreach ($listeClasse as $uneClasse) {



        ?>


            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'].' '.$uneClasse['nomDiplome'] ?></option>
        <?php
        }


        ?>
    </select>

    <select  aria-label="Default select example" name="competence">

        <option selected>Sélectionnez une compétence chapeau</option>

        <?php
        foreach ($listeCompetence as $uneCompetence) {

        ?>

            <option value=<?php echo $uneCompetence['idCompetence']; ?>><?php echo $uneCompetence['nomCompetence']; ?></option>
        <?php
        }


        ?>
    </select>

    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutActivite">
   
</form>

<br>
<br>
