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

function validateForm() {
  var test = false;
  var m = "Les compétences chapeaux ne peuvent pas étre identique!";
  var C1 = document.forms["envoie"]["competence1"].value;
  var C2 = document.forms["envoie"]["competence2"].value;
  var C3 = document.forms["envoie"]["competence3"].value;
  var C4 = document.forms["envoie"]["competence4"].value;

  if (C1 != "") {
    if (C2 != "") {

    } else if (C3 != "") {

    }
    else if (C4 != "") {
      if (C1 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false
      }
    }
    else {
      test = true;
    }
  }





  
  else if (C2 != "") {
    if (C3 != "") {
      if (C2 != C3) {
        if (C4 != "") {
          if (C4 != C3 && C4 != C2) {
            test = true;
          }
          else {
            alert(m);
            test = false
          }
        }
        else {
          test = true;
        }
      }
      else {
        alert(m);
        test = false
      }
    }
    else if (C4 != "") {
      if (C2 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false
      }
    }
    else {
      test = true;
    }
  }
  else if (C3 != "") {
    if (c4 != "") {
      if (C3 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false
      }
    }
    else {
      test = true;
    }
  }
  else if (C4 != "") {
    test = true;
  }

  return test;
}