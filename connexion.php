<?php
$css_sheet = "adminstyle";
$css_sheet2 = "logstyle";
require('common/header.php');
// ================ essais libres ==================
$users = [
    [
        'email' => 'admin@admin.fr',
        'nom' => 'administrateur',
        'passwd' => 'admin'
    ],
    [
        'email' => 'toto@toto.fr',
        'nom' => 'toto',
        'passwd' => 'tata'
    ]
];
if (isset($_POST['connexion_send'])) {
    extract($_POST);

    foreach ($users as $user) {
        if ($user['email'] == $connexion_mail && $user['passwd'] == $connexion_mdp) {
            // setcookie('user', $user['nom'], 0, '/', NULL, 0);
            $_SESSION['user'] = $user['nom'];
        }
    }
}
?>

<?php
require("common/navbar.php");
?>
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
// if (isset($_POST['connexion_send'])) {
//     extract($_POST);

//     if (!empty($connexion_mdp) && !empty($connexion_mail)) {

//         require 'database.php';

//         $db = Database::connect();

//         $statement = $db->prepare("SELECT * FROM utilisateur WHERE mail = :email");
//         $statement->execute(['email' => $connexion_mail]);

//         $result =   $statement->fetch();

//         if (password_verify($connexion_mdp, $result['mot_de_passe'])) {
//             echo "Le mot de passe est bon, connection en cours";
//         } else {
//             echo "L'adresse mail portant l'email " . $connexion_mail . " n'existe pas !";
//         }
//         $db = Database::disconnect();
//     } else {
//         echo "Les champs ne sont pas tous bien remplies";
//     }
// }




?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>