<?php
include_once "bd_activite.php";
include_once "bd_competence.php";

if(!empty($_POST['idCompetence'])){
        $idCompetence = $_POST['idCompetence'];
 
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($idCompetence);
        
        ?>
        <select name='souscategorie'onchange="listeSousCompetence(this.value);">
        <option value="0">--Choisir Une Compétence--</option>
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
        <option value="0">--Choisir Une Sous-Compétence--</option>
                <?php
        foreach ($listeSousCompetence as $uneSousCompetence){?>
                <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'].' '.$uneSousCompetence['libelleSousCompetence'].' '. $uneSousCompetence['intituleSousCompetence']; ?></option>
        <?php }
        ?>
        </select>
        <?php
}
?>