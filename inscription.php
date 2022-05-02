<html>

<head>
    <title>FootClub 2022</title>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--CSS-->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/logstyle.css">


    <!-- ICONES -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    require("navbar.php");
    ?>
    <div id="container">
        <form method="post">
            <h1>Inscription</h1>

            <label for="inscription_nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer votre nom" id="inscription_nom" name="inscription_nom" required>

            <label for="inscription_prenom"><b>Prenom</b></label>
            <input type="text" placeholder="Entrer votre prénom" id="inscription_prenom" name="inscription_prenom" required>

            <label for="inscription_email"><b>Adresse email</b></label>
            <input type="text" placeholder="Entrer votre adresse email" id="inscription_email" name="inscription_email" required>

            <label for="inscription_mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer votre mot de passe" id="inscription_mdp" name="inscription_mdp" required>

            <label for="inscription_confirmation_mdp"><b>Entrer le mot de passe à nouveau</b></label>
            <input type="password" placeholder="Entrer à nouveau votre mot de passe" id="inscription_confirmation_mdp" name="inscription_confirmation_mdp" required>

            <label for="inscription_adresse"><b>Adresse</b></label>
            <input type="text" placeholder="Entrer votre adresse" id="inscription_adresse" name="inscription_adresse" required>

            <label for="inscription_code_postal"><b>Code postal</b></label>
            <input type="text" placeholder="Entrer votre code postal" id="inscription_code_postal" name="inscription_code_postal" required>

            <label for="inscription_ville"><b>Ville</b></label>
            <input type="text" placeholder="Entrer votre ville" id="inscription_ville" name="inscription_ville" required>

            <label for="inscription_telephone"><b>Telephone</b></label>
            <input type="text" placeholder="Entrer votre numero de téléphone" id="inscription_telephone" name="inscription_telephone" required>
            <p></p>

            <label><b>Vous avez déjà un compte : <b><a style="color:#9D0208;" href="connexion.php">Veuillez vous connecter</a></label>
            <p></p>
            <input type="submit" id='inscription_send' name='inscription_send' value='INSCRIPTION'>
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

                require 'database.php';

                $db = Database::connect();

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
                    echo 'alert("Le compte a été créé <br>")';
                    // $mot = $inscription_nom;
                    // $lettre = $mot[0];
                    // echo $lettre;
                    // $_SESSION['lettre'] = $lettre ; 
                } else {
                    echo 'alert("Un email existe déjà")';
                }


                $db = Database::disconnect();
            }
        } else {
            echo "Les champs ne sont pas tous bien remplies";
        }
    }
    ?>
</body>