<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- <div id="container">
        <form method="post">
            <h1>Connexion</h1>

            <label for="connexion_nom"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="connexion_nom" name="username" required>

            <label for="connexion_mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="connexion_mdp" name="password" required>
            <p></p>
            <label><b>Nouveau chez FootClub : <b><a style="color:#9D0208;" href="connexion.html">Veuillez créer un compte</a></label>
            <p></p>
            <input type="submit" id='submit' value='CONNEXION'>

        </form>
    </div> -->
    <div id="container">
        <form method="post">
            <h1>Inscription</h1>

            <label for="inscription_nom"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="inscription_nom" name="username" required>

            <label for="inscription_email"><b>Adresse email</b></label>
            <input type="text" placeholder="Entrer votre adresse email" id="inscription_email" name="username" required>

            <label for="inscription_mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" id="inscription_mdp" name="password" required>

            <label for="inscription_confirmation_mdp"><b>Entrez le mot de passe à nouveau</b></label>
            <input type="password" placeholder="Entrer à nouveau le mot de passe" id="inscription_confirmation_mdp" name="password" required>
            <p></p>
            <label><b>Vous avez déjà un compte : <b><a style="color:#9D0208;" href="#">Veuillez vous connecter</a></label>
            <p></p>
            <input type="submit" id='inscription_send' name='inscription_send' value='INSCRIPTION'>
        </form>

        <?php
            if (isset($_POST['inscription_send'])){
                $pseudo = $_POST['inscription_pseudo'];
                $age = $_POST['inscription_age'];
                $email = $_POST['inscription_email'];
            }
        ?>
    </div>
</body>

</html>