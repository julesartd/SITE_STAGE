<form  method="POST" class="lb mb-3">
        <h1 id="lstA">Créer une compétence</h1>
        </br>
       
        <input type="text" class="form-label" name='txtIDBLOC' placeholder='Code de la compétence chapeau' required>
      
       
        <input type="text"  class="form-label"name='txtNomBloc' placeholder='Nom de la compétence chapeau' required>


        <select name="txtIDBAC">
            <option selected>Sélectionnez un bac</option>
            <?php

            foreach ($listeBac as $unBac) {

            ?>
                <option value=<?php echo $unBac['IDBAC']; ?>><?php echo $unBac['NOMDUBAC']; ?></option>
            <?php
            }
            ?>
        </select>

        </br>
        <input type="submit" value="AJOUTER"  name="btnAjout">  
    </form>