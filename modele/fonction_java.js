function competence(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idClasse='+val,
    success: function(data){
      $("#competence1").html(data);
      $("#sousCompetence1").empty();
      $("#sousCompetence2").empty();
      $("#sousCompetence3").empty();
      $("#sousCompetence4").empty();
    }
    });
  }

  function sousCompetence1(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idSousCompetence1='+val,
    success: function(data){
      $("#sousCompetence1").html(data);
    }
    });
  }

  function sousCompetence2(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idSousCompetence2='+val,
    success: function(data){
      $("#sousCompetence2").html(data);
    }
    });
  }

  function sousCompetence3(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idSousCompetence3='+val,
    success: function(data){
      $("#sousCompetence3").html(data);
    }
    });
  }

  function sousCompetence4(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idSousCompetence4='+val,
    success: function(data){
      $("#sousCompetence4").html(data);
    }
    });
  }