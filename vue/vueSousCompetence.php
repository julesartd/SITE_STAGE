<form  method="POST" class="lb mb-3">
        <h1 id="lstA">Créer une sous-compétence</h1>
        </br>
       
        <input required type="text" name='txtLibelleSousCompetence' placeholder='Libellé de la sous-compétence'>

        <input required type="text" name='txtIntituleSousCompetence' placeholder='Intitulé de la sous-compétence'>


        <select name="txtCompetence">
            <option selected>Sélectionnez une compétence chapeau</option>
            <?php

            foreach ($listeCompetence as $uneCompetence) {

            ?>
                <option value=<?php echo $uneCompetence['idCompetence']; ?>><?php echo $uneCompetence['libelleCompetence'] . $uneCompetence['intituleCompetence'] ; ?></option>
            <?php
            }
            ?>
        </select>

        </br>
        <input type="submit" value="AJOUTER"  name="btnAjoutSousCompetence">
        <input type="submit" value="ANNULER"  name="btnCancel">

      
     
    </form>