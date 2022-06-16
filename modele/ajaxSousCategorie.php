<?php
include_once "bd_activite.php";

if(!empty($_POST['idCompetence'])){
        $idClasse = $_POST['idCompetence'];
 
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($idClasse);
        
        ?>
        <select name='souscategorie'>
                <?php
        foreach ($listeCompetence as $uneCompetence){?>
                <option value="<?php echo $uneCompetence['idCompetence']; ?>"><?php echo $uneCompetence['libelleCompetence'].' '. $uneCompetence['intituleCompetence']; ?></option>
        <?php }
        ?>
        </select>
        <?php
}
?>