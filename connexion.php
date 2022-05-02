<?php
$css_sheet = "adminstyle";
$css_sheet2 = "logstyle";
require('common/header.php');
// ================ essais libres ==================
$statement = $db->query('SELECT * FROM utilisateur');
$users = $statement->fetchAll();

// if (isset($_POST['connexion_send'])) {
//     extract($_POST);

//     foreach ($users as $user) {
//         if ($user['email'] == $connexion_mail && $user['passwd'] == $connexion_mdp) {
//             // setcookie('user', $user['nom'], 0, '/', NULL, 0);
//             $_SESSION['user'] = $user['nom'];
//         }
//     }
// }

if (isset($_POST['connexion_send'])) {
    extract($_POST);

    if (!empty($connexion_mdp) && !empty($connexion_mail)) {

        $mail_valide = false;
        $statement = $db->prepare("SELECT mail FROM utilisateur");
        $statement->execute(array());
        $mails = $statement->fetchAll();
        // var_dump($mails);
        foreach ($mails as $mail) {
            $mail = $mail[0];
            if ($connexion_mail == $mail) {
                $mail_valide = true;
            }
            // echo $mail_valide ? "oui" : "non" . '<br>';
        }



        $statement = $db->prepare("SELECT * FROM utilisateur WHERE mail = :email");
        $statement->execute(['email' => $connexion_mail]);

        $result =   $statement->fetch();

        if ($mail_valide && password_verify($connexion_mdp, $result['mot_de_passe'])) {
            $_SESSION['user'] = $connexion_mail;
            $_SESSION['uid'] = $result['id'];
            // echo $_SESSION['uid'];
            echo "<script>alert('Le mot de passe est bon, connection en cours');</script>";
        } else {
            echo "<script>alert('L\'adresse mail portant l'email " . $connexion_mail . " n'existe pas !');</script>";
        }
    } else {
        echo "Les champs ne sont pas tous bien remplies";
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>