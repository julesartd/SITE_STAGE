<div>
    <?php

    include "modele/bd_competence.php";

    if (empty($_SESSION['mailU']) || empty($_SESSION['mdpU'])) {
        header("Location:/?action=");
    }

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtNom'], $_POST['txtBloc'])) {

            InsererCompetence($_POST['txtNom'], NULL, $_POST['txtBloc']);
        } else {
            echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
                Veuillez remplir tous les champs pour ajouter une compétence
              </div>";
        }
    }
    $listeBloc = getBloc();
    
    include "vue/vueInsertCompetence.php"
    ?>
</div>