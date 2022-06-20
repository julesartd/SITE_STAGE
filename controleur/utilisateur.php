<?php
include "vue/vueCompte.php";

if (isset($_POST['submit'])) {

    
    $new_pass = $_POST['new_pass'];
    $pass_old = $_POST['pass_old'];
    $new_pass_conf = $_POST['new_pass_conf'];

    $unProfId = getUtilisateurById($_SESSION['idProfesseur']);

    echo crypt($pass_old, $unProfId['mdpUtilisateur']);
    echo '////'. $unProfId['mdpUtilisateur'];

    if ($unProfId['mdpUtilisateur']== crypt($pass_old, $unProfId['mdpUtilisateur'])) {

        if ($new_pass == $new_pass_conf) {

            $pass = $new_pass;

            updateMdptUtilisateur(password_hash($pass, PASSWORD_DEFAULT), $_SESSION['idProfesseur']);

            echo "Merci, le mot de passe à été changé.";
        } else {
            echo "Mot de passe de confirmation incorrect, recommencez SVP";
        }
    } else {
        echo "Ancien mot de passe non valide";
    }
}


