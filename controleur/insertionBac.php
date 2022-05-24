<div>
    <?php

    include "modele/bd_bac.php";

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtNomBac'])){
            insertBac($_POST['txtNomBac']);
        } 
    }

    if(isset($_GET["idSuppr"])){
        $idBac = $_GET["idSuppr"];
        supprBac($idBac);
    }

    $tableauBac = getBac();

    include "vue/vueBac.php"
    ?>
</div>