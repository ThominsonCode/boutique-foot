<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="container">
        <form method="post">
            <h1>Inscription</h1>

            <label for="inscription_nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer votre nom" id="inscription_nom" name="inscription_nom">

            <label for="inscription_prenom"><b>Prenom</b></label>
            <input type="text" placeholder="Entrer votre prénom" id="inscription_prenom" name="inscription_prenom">

            <label for="inscription_email"><b>Adresse email</b></label>
            <input type="text" placeholder="Entrer votre adresse email" id="inscription_email" name="inscription_email">

            <label for="inscription_mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="inscription_mdp" name="inscription_mdp">

            <label for="inscription_confirmation_mdp"><b>Entrez le mot de passe à nouveau</b></label>
            <input type="password" placeholder="Entrer à nouveau le mot de passe" id="inscription_confirmation_mdp" name="inscription_confirmation_mdp">
            <p></p>
            
            <label for="inscription_adresse"><b>Adresse</b></label>
            <input type="text" placeholder="Entrer votre adresse" id="inscription_adresse" name="inscription_adresse">

            <label for="inscription_code_postal"><b>Mot de passe</b></label>
            <input type="text" placeholder="Entrer votre code postal" id="inscription_code_postal" name="inscription_code_postal">
            
            <label for="inscription_ville"><b>Ville</b></label>
            <input type="text" placeholder="Entrer votre ville" id="inscription_ville" name="inscription_ville">

            <label for="inscription_numero"><b>Mot de passe</b></label>
            <input type="tel" placeholder="Entrer votre numero de téléphone" id="inscription_numero" name="inscription_numero">

            <label><b>Vous avez déjà un compte : <b><a style="color:#9D0208;" href="connexion.php">Veuillez vous connecter</a></label>
            <p></p>
            <input type="submit" id='inscription_send' name='inscription_send' value='INSCRIPTION'>
        </form>
    </div>

    <?php

    if (isset($_POST['inscription_send'])) {
        extract($_POST);

        if (!empty($inscription_mdp) && !empty($inscription_email) && !empty($inscription_confirmation_mdp)) {
            if ($inscription_mdp == $inscription_confirmation_mdp) {
                $options = [
                    'cost' => 12,
                ];
                $hashpwd = password_hash($inscription_mdp, PASSWORD_BCRYPT, $options);

                require 'database.php';

                $db = Database::connect();

                $statement = $db->prepare("SELECT mail FROM utilisateur WHERE mail = :email");
                $statement->execute(['email' => $inscription_email]);

                $result = $statement->rowCount();

                if ($result == 0) {
                    $statement = $db->prepare("INSERT INTO utilisateur(mail, mot_de_passe) VALUES(:mail, :mot_de_passe)");
                    $statement->execute([
                        'mail' => $inscription_email,
                        'mot_de_passe' => $hashpwd
                    ]);
                    echo 'Le compte a été créé';
                } else {
                    echo 'Un email existe déjà';
                }
                $db = Database::disconnect();
            }
        } else {
            echo "Les champs ne sont pas tous bien remplies";
        }
    }
    ?>
</body>