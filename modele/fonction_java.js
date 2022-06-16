function souscat(val) {
    $.ajax({
    type: "POST",
    url: "modele/ajaxSousCategorie.php",
    data:'idCompetence='+val,
    success: function(data){
      $("#conteneur").html(data);
    }
    });
  }