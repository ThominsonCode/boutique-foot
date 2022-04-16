<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="container">
        <form method="post">
            <h1>Connexion</h1>

            <label for="connexion_mail"><b>Adresse Mail</b></label>
            <input type="text" placeholder="Entrer l'adresse mail" id="connexion_mail" name="connexion_mail" required>

            <label for="connexion_mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="connexion_mdp" name="connexion_mdp" required>
            <p></p>
            <label><b>Nouveau chez FootClub : <b><a style="color:#9D0208;" href="inscription.php">Veuillez créer un compte</a></label>
            <p></p>
            <input type="submit" id='connexion_send' name='connexion_send' value='CONNEXION'>

        </form>
    </div>

    <?php
    if (isset($_POST['connexion_send'])) {
        extract($_POST);

        if (!empty($connexion_mdp) && !empty($connexion_mail)) {

            require 'database.php';

            $db = Database::connect();

            $statement = $db->prepare("SELECT * FROM utilisateur WHERE mail = :email");
            $statement->execute(['email' => $connexion_mail]);

            $result =   $statement->fetch();

            if (password_verify($connexion_mdp, $result['mot_de_passe'])) {
                echo "Le mot de passe est bon, connection en cours";
            } else {
                echo "L'adresse mail portant l'email " . $connexion_mail . " n'existe pas !";
            }
            $db = Database::disconnect();
        } else {
            echo "Les champs ne sont pas tous bien remplies";
        }
    }
    ?>
</body>

</html>