<?php
include_once "modele/bd_activite.php";
$idClasse = $_POST['niveauClasse'];
 
$listeClasse = getCompetenceChapeauByDiplomeFromClasse($idClasse);
echo "<select name='souscategorie'>";
foreach ($listeClasse as $uneClasse){?>
        <option value="<?php echo $data['IdCompetence']; ?>"><?php echo $data['libelleCompetence']; ?></option>
<?php }
echo "</select>";
?>
