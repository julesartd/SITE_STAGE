<form  method="POST" class="lb mb-3">
        <h1 id="lstA">Créer une compétence</h1>
        </br>
       
   
      
       
        <input type="text" name='txtNomCompetence' placeholder='Nom de la compétence'>


        <select name="txtIDBLOC">
            <option selected>Sélectionnez un bloc</option>
            <?php

            foreach ($listeBloc as $unBloc) {

            ?>
                <option value=<?php echo $unBloc['IDBLOC']; ?>><?php echo $unBloc['NOMDUBLOC']; ?></option>
            <?php
            }
            ?>
        </select>

        </br>
        <input type="submit" value="AJOUTER"  name="btnAjout">
        <input type="submit" value="ANNULER"  name="btnCancel">

      
     
    </form>