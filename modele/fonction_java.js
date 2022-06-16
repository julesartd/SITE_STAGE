function listeCompetence(val) {
    $.ajax({
    type: "POST",
    url: "modele/ajaxSousCategorie.php",
    data:'idCompetence='+val,
    success: function(data){
      $("#conteneur").html(data);
      $('#oui').empty();
    }
    });
  }

  function listeSousCompetence(val) {
    $.ajax({
    type: "POST",
    url: "modele/ajaxSousCategorie.php",
    data:'idSousCompetence='+val,
    success: function(data){
      $("#oui").html(data);
    }
    });
  }