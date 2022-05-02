<?php
$css_sheet = "adminstyle";
$css_sheet2 = "logstyle";
require('common/header.php');
require("common/navbar.php");
?>

<div id="container">
    <form method="post">
        <h1>Inscription</h1>

        <div class="form-group">
            <label for="inscription_nom"><b>Nom</b></label>
            <input type="text" class="form-control champ" id="inscription_nom" name="inscription_nom" placeholder="Entrer votre nom" required>
            <span class="help-block" style="display: none;">Merci de n'entrer que des lettres</span>
        </div>

        <div class="form-group">
            <label for="inscription_nom"><b>Prénom</b></label>
            <input type="text" class="form-control champ" id="inscription_prenom" name="inscription_prenom" placeholder="Entrer votre prénom" required>
            <span class="help-block" style="display: none;">Merci de n'entrer que des lettres</span>
        </div>

        <div class="form-group">
            <label for="inscription_email"><b>Email</b></label>
            <input type="text" class="form-control champ" id="inscription_email" name="inscription_email" placeholder="Entrer votre adresse email" required>
            <span class="help-block" style="display: none;">Adresse email non valide</span>
        </div>

        <div class="form-group">
            <label for="inscription_mdp"><b>Mot de passe</b></label>
            <input type="password" class="form-control champ" id="inscription_mdp" name="inscription_mdp" placeholder="Entrer votre mot de passe" required>
            <span class="help-block" style="display: none;">Le mot de passe doit respecter des exigences (majuscule, minuscule, chiffre, caractère spécial) entre 8 et 16 caractères</span>
        </div>

        <div class="form-group">
            <label for="inscription_confirmation_mdp"><b>Entrer le mot de passe à nouveau</b></label>
            <input type="password" class="form-control champ" id="inscription_confirmation_mdp" name="inscription_confirmation_mdp" placeholder="Entrer à nouveau votre mot de passe" required>
            <span class="help-block" style="display: none;">Les mots de passe doivent être identiques !</span>
        </div>

        <div class="form-group">
            <label for="inscription_adresse"><b>Adresse</b></label>
            <input type="text" class="form-control champ" id="inscription_adresse" name="inscription_adresse" placeholder="Entrer votre adresse" required>
        </div>

        <div class="form-group">
            <label for="inscription_code_postal"><b>Code postal</b></label>
            <input type="text" class="form-control champ" id="inscription_code_postal" name="inscription_code_postal" placeholder="Entrer votre code postal" required>
            <span class="help-block" style="display: none;">Code postal non valide</span>
        </div>

        <div class="form-group">
            <label for="inscription_ville"><b>Ville</b></label>
            <input type="text" class="form-control champ" id="inscription_ville" name="inscription_ville" placeholder="Entrer votre ville" required>
            <span class="help-block" style="display: none;">Nom de ville non valide</span>
        </div>

        <div class="form-group">
            <label for="inscription_telephone"><b>Téléphone</b></label>
            <input type="text" class="form-control champ" id="inscription_telephone" name="inscription_telephone" placeholder="Entrer votre numero de téléphone" required>
            <span class="help-block" style="display: none;">Numéro de téléphone non valide</span>
        </div>

        <p></p>

        <label><b>Vous avez déjà un compte : <b><a style="color:#9D0208;" href="connexion.php">Veuillez vous connecter</a></label>
        <p></p>
        <input type="submit" id='inscription_send' name='inscription_send' value='INSCRIPTION'/>
    </form>
</div>

<?php

if (isset($_POST['inscription_send'])) {
    extract($_POST);

    if (!empty($inscription_nom) && !empty($inscription_prenom) && !empty($inscription_mdp) && !empty($inscription_email) && !empty($inscription_confirmation_mdp) && !empty($inscription_adresse) && !empty($inscription_code_postal) && !empty($inscription_ville) && !empty($inscription_telephone)) {
        if ($inscription_mdp == $inscription_confirmation_mdp) {
            $options = [
                'cost' => 12,
            ];
            $hashpwd = password_hash($inscription_mdp, PASSWORD_BCRYPT, $options);


            $statement = $db->prepare("SELECT mail FROM utilisateur WHERE mail = :email");
            $statement->execute(['email' => $inscription_email]);

            $result = $statement->rowCount();

            if ($result == 0) {
                $statement = $db->prepare("INSERT INTO utilisateur(nom, prenom, mail, mot_de_passe, adresse, code_postal, ville, telephone) VALUES(:nom, :prenom, :mail, :mot_de_passe, :adresse, :code_postal, :ville, :telephone)");
                $statement->execute([
                    'nom' => $inscription_nom,
                    'prenom' => $inscription_prenom,
                    'mail' => $inscription_email,
                    'mot_de_passe' => $hashpwd,
                    'adresse' => $inscription_adresse,
                    'code_postal' => $inscription_code_postal,
                    'ville' => $inscription_ville,
                    'telephone' => $inscription_telephone,
                ]);
                echo '<script>alert("Le compte a été créé");</script>';
            } else
                echo '<script>alert("Un erreur a eu lieu lors de l\'inscription");</script>';
        }
    } else {
        echo "Les champs ne sont pas tous bien remplies";
    }
}
?>

</body>