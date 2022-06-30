<div class="page">
    <nav class="page__menu menu">
        <ul class="menu__list r-list">
            <?php
            session_start();
            if (isset($_SESSION["mailUtilisateur"]) && isset($_SESSION["mdpUtilisateur"])) {
            ?>
                <li class="menu__group"><a href="./?action=event" class="menu__link r-link text-underlined">événement</a></li>
                <li class="menu__group"><a href="./?action=classe" class="menu__link r-link text-underlined">Classe</a></li>
                <li class="menu__group"><a href="./?action=activite" class="menu__link r-link text-underlined">Activité</a></li>
                <li class="menu__group"><a href="./?action=strategie" class="menu__link r-link text-underlined">stratégie</a></li>
                <?php
                if ($_SESSION["idDroitUtilisateur"] == 1) {
                ?>
                    <li class="menu__group"><a href="./?action=matiere" class="menu__link r-link text-underlined">Matière</a></li>
                    <li class="menu__group"><a href="./?action=diplome" class="menu__link r-link text-underlined">Diplome</a></li>
                    <li class="menu__group"><a href="./?action=calendrier" class="menu__link r-link text-underlined">Calendrier</a></li>
                    <li class="menu__group"><a href="./?action=prof" class="menu__link r-link text-underlined">Professeur</a></li>
                    <!-- <li class="menu__group"><a href="./?action=eleve" class="menu__link r-link text-underlined">élève</a></li> -->
                <?php
                }
                if ($_SESSION["idDroitUtilisateur"] == 2) {
                ?>
                    <li class="menu__group"><a href="./?action=diplome" class="menu__link r-link text-underlined">Diplome</a></li>
                <?php
                }
                if ($_SESSION["idDroitUtilisateur"] == 3) {
                ?>
                    <li class="menu__group"><a href="./?action=matiere" class="menu__link r-link text-underlined">Matière</a></li>
                <?php
                }
                ?>
                <li class="menu__group"><a href="./?action=utilisateur" class="menu__link r-link text-underlined">compte</a></li>
                <li class="menu__group"><a href="./?action=deconnexion" class="menu__link r-link text-underlined">Déconnexion</a></li>
            <?php
            } else {
            ?>
                <li class="menu__group"><a href="./?action=connexion" class="menu__link r-link text-underlined">Connexion</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>