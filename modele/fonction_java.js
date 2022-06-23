function competence(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'idClasse=' + val,
    success: function (data) {
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
    data: 'idSousCompetence1=' + val,
    success: function (data) {
      $("#sousCompetence1").html(data);
    }
  });
}

function sousCompetence2(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'idSousCompetence2=' + val,
    success: function (data) {
      $("#sousCompetence2").html(data);
    }
  });
}

function sousCompetence3(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'idSousCompetence3=' + val,
    success: function (data) {
      $("#sousCompetence3").html(data);
    }
  });
}

function sousCompetence4(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'idSousCompetence4=' + val,
    success: function (data) {
      $("#sousCompetence4").html(data);
    }
  });
}

function verify(competence1, competence2, competence3, competence4, sous_Competence1, sous_Competence2, sous_Competence3, sous_Competence4) {
  var passed = false;
  // On va donner à la variable passed la valeur false (fausse).

  if (competence1.value != "")
  {

  }
  else if (competence2.value != "")
  {

  }
  else if (competence3.value != "")
  {

  }
  else if (competence4.value != "")
  {
    if(sous_Competence4 != ""){
      passed = true;
    }
    else{
      passed =false;
      document.write("oui");
    }
  }
  else
    passed = false;
  return passed

}

function validateForm()  {
  var test = false;
  var C1 = document.forms["envoie"]["competence1"].value;
  var C2 = document.forms["envoie"]["competence2"].value;
  var C3 = document.forms["envoie"]["competence3"].value;
  var C4 = document.forms["envoie"]["competence4"].value;

  if(C1!= "") {
    
  }
  if(C2!= "") {

  }
  if(C3!= "") {

  }
  if(C4!= "") {

  }


  
  return test;
}