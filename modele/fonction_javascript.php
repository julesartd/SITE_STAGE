<?php
include_once "bd_connexion.php";
?>
<SCRIPT LANGUAGE="JavaScript" >
  function getVille(val) {
    $.ajax({
      type: "POST",
      url: "get_ville.php",
      data: 'id_pays=' + val,
      success: function(data) {
        $("#list-ville").html(data);
      }
    });
  }

 
   function souscat(){
     var categorie = $("select[name=niveauClasse]").value();
     $.post({
        type : "POST",
        url: 'ajaxSousCategorie.php',              
        data: {idClasse : niveauClasse},         
        success: function(data){
           $('#conteneur').html(data);
        }
     });
   }

</SCRIPT>