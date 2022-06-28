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

function apresChoix1(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'choix1=' + val,
    success: function (data) {
      $("#choix1").html(data);
    }
  });
}

function apresChoix2(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'choix2=' + val,
    success: function (data) {
      $("#choix2").html(data);
    }
  });
}

function apresChoix3(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'choix3=' + val,
    success: function (data) {
      $("#choix3").html(data);
    }
  });
}

function apresChoix4(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data: 'choix4=' + val,
    success: function (data) {
      $("#choix4").html(data);
    }
  });
}
function profDroit(val) {
  $.ajax({
    type: "POST",
    url: "../vue/vueProfMatiere.php",
    data: 'idProf=' + val,
    success: function (data) {
      $("#prof").html(data);
    }
  });
}

function validateForm() {
  var test = false;
  var m = "Les compétences chapeaux ne peuvent pas être identique!";
  var C1 = document.forms["envoie"]["competence1"].value;
  var C2 = document.forms["envoie"]["competence2"].value;
  var C3 = document.forms["envoie"]["competence3"].value;
  var C4 = document.forms["envoie"]["competence4"].value;

  var SC1 = document.forms["envoie"]["sous_competence1"].value;
  var SC11 = document.forms["envoie"]["sous_competence11"].value;
  var SC2 = document.forms["envoie"]["sous_competence2"].value;
  var SC22 = document.forms["envoie"]["sous_competence22"].value;
  var SC3 = document.forms["envoie"]["sous_competence3"].value;
  var SC33 = document.forms["envoie"]["sous_competence33"].value;
  var SC4 = document.forms["envoie"]["sous_competence4"].value;
  var SC44 = document.forms["envoie"]["sous_competence44"].value;
  if (C1 != "") {
    if (C2 != "") {
      if (C1 != C2) {
        if (C3 != "") {
          if (C3 != C2 && C3 != C1) {
            if (C4 != "") {
              if (C4 != C1 && C4 != C2 && C4 != C3) {
                test = true;
              }
              else {
                alert(m);
                test = false;
              }
            }
            else {
              test = true;
            }
          }
          else {
            alert(m);
            test = false;
          }
        }
        else if (C4 != "") {
          if (C4 != C2 && C4 != C1) {
            test = true;
          }
          else {
            alert(m);
            test = false;
          }
        }
        else {
          test = true;
        }
      }
      else {
        alert(m);
        test = false;
      }
    }
    else if (C3 != "") {
      if (C1 != C3) {
        if (C4 != "") {
          if (C4 != C3 && C4 != C1) {
            test = true;
          }
          else {
            alert(m);
            test = false;
          }
        }
        else {
          test = true;
        }
      }
      else {
        alert(m);
        test = false;
      }
    }
    else if (C4 != "") {
      if (C1 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false;
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
            test = false;
          }
        }
        else {
          test = true;
        }
      }
      else {
        alert(m);
        test = false;
      }
    }
    else if (C4 != "") {
      if (C2 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false;
      }
    }
    else {
      test = true;
    }
  }
  else if (C3 != "") {
    if (C4 != "") {
      if (C3 != C4) {
        test = true;
      }
      else {
        alert(m);
        test = false;
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

function matiere(val,prof) {
  $.ajax({
    type: "POST",
    url: "../vue/vueTableauStrategieByProfGeneral.php",
    data: {'idClasse'  :val,'idProfesseur'  :prof},
    success: function (data) {
      $("#matiere1").html(data);

    }
  });
}