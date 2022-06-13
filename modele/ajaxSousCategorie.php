<?php
include_once "modele/bd_activite.php";
$IdCategorie = $_POST['IdClasse'];
 
$lsiteClasse = getCompetenceChapeauByDiplomeFromClasse($IdCategorie);
echo "<select name='souscategorie'>";
foreach ($lsiteClasse as $uneClasse){?>
        <option value="<?php echo $data['IdCompetence']; ?>"><?php echo $data['libelleCompetence']; ?></option>
<?php }
echo "</select>";
?>