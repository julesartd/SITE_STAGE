function competence1(val) {
    $.ajax({
    type: "POST",
    url: "modele/ajaxSousCategorie.php",
    data:'idClasse='+val,
    success: function(data){
      $("#competence1").html(data);
      $("#competence2").html(data);
      $("#competence3").html(data);
      $("#competence4").html(data);
      $('#sousCompetence1').empty();
      $('#sousCompetence2').empty();
      $('#sousCompetence3').empty();
      $('#sousCompetence4').empty();
    }
    });
  }

  function sousCompetence1(val) {
    $.ajax({
    type: "POST",
    url: "modele/ajaxSousCategorie.php",
    data:'idSousCompetence='+val,
    success: function(data){
      $("#sousCompetence1").html(data);
    }
    });
  }



  function genererStrategie(val) {
    $.ajax({  
    type: "POST",
    url: "controleur/strategie.php",
    data:'idClasse='+val,
    success: function(data){
      $("#divTableau").html(data);
    }
    });
  }
