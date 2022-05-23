<form  method="POST" class="lb mb-3">
        <h1 id="lstA">Créer une compétence</h1>
        </br>
       
        <input type="text" name='txtNom' placeholder='Nom de la compétence'></br>
        </br>
       
       
        <select class="form-select" aria-label="Default select example" name="txtBloc">
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


       




        </br>
        <input type="submit" value="AJOUTER" class="btna" name="btnAjout">
        <input type="submit" value="ANNULER" class="btnc" name="btnCancel">
    </form>