<div class="page">
    <input id="retour" type="button" value="Précédent" onclick="history.back();">
    <nav class="page__menu menu">
        <ul class="menu__list r-list">
        <?php
	session_start();
	if(isset($_SESSION["mailUtilisateur"]) && isset($_SESSION["mdpUtilisateur"])){
		?>
            <li class="menu__group"><a href="./?action=calendrier" class="menu__link r-link text-underlined">Calendrier</a></li>
        
            <li class="menu__group"><a href="./?action=diplome" class="menu__link r-link text-underlined">Diplome</a></li> 
            <li class="menu__group"><a href="./?action=event" class="menu__link r-link text-underlined">Event</a></li> 
            <li class="menu__group"><a href="./?action=classe" class="menu__link r-link text-underlined">Classe</a></li>
            <li class="menu__group"><a href="./?action=activite" class="menu__link r-link text-underlined">Activité</a></li>
            <li class="menu__group"><a href="./?action=deconnexion" class="menu__link r-link text-underlined">Déconnexion</a></li>
            <li class="menu__group"><a href="./?action=prof" class="menu__link r-link text-underlined">Professeur</a></li>
            <li class="menu__group"><a href="./?action=eleve" class="menu__link r-link text-underlined">élève</a></li>
            <?php
    }else{
    ?>
            <li class="menu__group"><a href="./?action=connexion" class="menu__link r-link text-underlined">Connexion</a></li>
            <?php
    }
    ?>
        </ul>
    </nav>
</div>


