<form method="POST" class="lb mb-3">
    <h2>Ajouter un élève</h2>

        <input required type="text" name='txtNomEleve' placeholder="Nom de l'élève">

        <input required type="text" name='txtEleveProf' placeholder="Prénom de l'élève">
        

        <input type="submit" name='btnAjoutEleve'>

    </div>
    </br>
</form>

<head>    
        <meta charset="UTF-8">
        <title>Des select liés entre eux en HTML5 et JQuery</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <label for="countries" class="required">Pays :</label>
            <select id="countries" name="countries" content-type="choices" trigger="true" target="department">
                <option value="1">France</option>
                <option value="2">Bénin</option>
            </select>
        </div>
        <div>
            <label for="department" class="required">Départements :</label>
            <select id="department" name="department" content-type="choices">
                <optgroup reference="1" style="display: none;">
                    <option value="1">Côtes d'amor</option>
                    <option value="2">Finistère</option>
                    <option value="3">Île-et-Vilaine</option>
                    <option value="4">Morbihan</option>
                </optgroup>
                <optgroup reference="2" style="display: block;">
                    <option value="5">Littoral</option>
                    <option value="6">Collines</option>
                    <option value="7">Atlantique</option>
                    <option value="8">Zou</option>
                </optgroup>
            </select>
        </div>
        <script>
            /*
              * trigger="true" permet de dire que c'est l'élément le plus haut qui fait varier toutes les autres listes
              * target=[id_cible] permet de spécifier la liste qui doit varier au changement de la sélection
              * reference=[id_reference] est l'id de l'élément parent qui déclenche la mise à jour de la liste
            */
            
            //Fonction qui s'occupe de la mise à jour des listes
            function updateSelectBox(object){
                // Object correspond au input qui déclenche l'action (pays dans notre cas)
                // On récupère le select (département) qui doit être mise à jour suite au changement du parent (pays)
                var target = $("#"+object.attr('target'));
                
                // On récupère tous les optgroup du select cible spécifié avec target (les optgroup du select département)
                var listGroups = target.find("optgroup");
                
                // On récupère le optgroup qui correspond à la valeur courante du select parent (pays)
                var validGroup = target.find("optgroup[reference='"+object.find(':selected').val()+"']");
                
                //On modifie la valeur courante du select cible (département)
                target.val(validGroup.find("option").val());
                
                //On cache tous les optgroup de département
                listGroups.hide();
                
                //On affiche uniquement le optgroup de département qui correspond à la valeur courante de pays
                validGroup.show();
                
                //On vérifie si la cible (département) doit déclencher une mise à jour d'une autre liste
                // Département peut par exemple déclencher la mise à jour des villes, et les villes déclenches celle des quartiers...
                if(target.attr('content-type')=='choices')
	                target.change();
            }
            
            //On associe la fonction updateSelectBox à l'événement onchange des listes qui doivent déclencher des mises à jour d'autres listes
	        $("select[content-type='choices']").on('change',function(){
		        updateSelectBox($(this));
	        });
	        
	        //On fait la première mise à jour des
	        $(document).ready(function(){
        	    updateSelectBox($("select[trigger='true']"));
        	});
        </script>
    

</body>