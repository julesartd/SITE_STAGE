<?php
include_once "modele/bd_activite.php";
include_once "modele/bd_competence.php";

echo"oui";
if(!empty($_POST['idClasse'])){
        $idCompetence = $_POST['idClasse'];
 
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($idCompetence);
        
        ?>
        <select name='souscategorie'onchange='sousCompetence1(this.value);''>
        <option value="">--Choisir Une Compétence--</option>
                <?php
        foreach ($listeCompetence as $uneCompetence){?>
                <option value="<?php echo $uneCompetence['idCompetence']; ?>"><?php echo $uneCompetence['libelleCompetence'].' '. $uneCompetence['intituleCompetence']; ?></option>
        <?php }
        ?>
        </select>
        <?php
}

if(!empty($_POST['idSousCompetence'])){
        $idSousCompetence = $_POST['idSousCompetence'];
 
        $listeSousCompetence = getSousCompetenceById($idSousCompetence);
        
        ?>
        <select name='souscategorie'>
        <option value="">--Choisir Une Sous-Compétence--</option>
                <?php
        foreach ($listeSousCompetence as $uneSousCompetence){?>
                <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'].'.'.$uneSousCompetence['libelleSousCompetence'].' '. $uneSousCompetence['intituleSousCompetence']; ?></option>
        <?php }
        ?>
        </select>
        <?php
}
?>