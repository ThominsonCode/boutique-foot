$(document).ready(function () {

    var $inscription_prenom = $('#inscription_prenom'),
        $inscription_nom = $('#inscription_nom'),
        $inscription_email = $('#inscription_email'),
        $inscription_mdp = $('#inscription_mdp'),
        $inscription_confirmation_mdp = $('#inscription_confirmation_mdp'),
        $inscription_code_postal = $('#inscription_code_postal'),
        $inscription_ville = $('#inscription_ville'),
        $inscription_telephone = $('#inscription_telephone'),
        $envoi = $('#envoi'),
        $reset = $('#reset'),
        $erreur = $('#erreur'),
        $bravo = $('#bravo');
    $validite = true; //Je déclare une variable qui restera vrai sans aucune
    //erreur mais elle passera à faux dès la première erreur

    function valide($validation) { //J'ai créé une fonction qui est appelée lorsque que la réponse correspond aux attentes.
        $validation.css({
            borderColor: 'green',
            color: 'green'
        });
        $validation.next().css("display", "none");
    }

    function pas_valide($non_validation) { //J'ai créé une fonction qui est appelée lorsque que la réponse ne correspond pas aux attentes.
        $non_validation.css({
            borderColor: 'red',
            color: 'red'
        });
        $non_validation.next().css("display", "block");
    }

    $inscription_prenom.keyup(function () {
        if (/^[a-zA-Z]+$/.test($inscription_prenom.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_nom.keyup(function () {
        if (/^[a-zA-Z]+$/.test($inscription_nom.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_email.keyup(function () {
        if (/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($inscription_email.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_mdp.keyup(function () {
        if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,16}$/.test($inscription_mdp.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_confirmation_mdp.keyup(function () {
        if ($(this).val() == $inscription_mdp.val())
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_code_postal.keyup(function () {
        if (/^[0-9-()+]{5,5}$/.test($inscription_code_postal.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_ville.keyup(function () {
        if (/^[a-zA-Z]+$/.test($inscription_ville.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    $inscription_telephone.keyup(function () {
        if (/^[0-9-()+]{10,10}$/.test($inscription_telephone.val()))
            valide($(this));
        else {
            $validite = false;
            pas_valide($(this));
        }
    });

    function verifier(champ) {
        if (champ.val() == "") {
            $validite = false;
            pas_valide($(this));
        }
    }

    $envoi.click(function (e) {
        e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi

        verifier($inscription_prenom);
        verifier($inscription_nom);
        verifier($inscription_email);
        verifier($inscription_mdp);
        verifier($inscription_confirmation_mdp);
        verifier($inscription_code_postal);
        verifier($inscription_ville);
        verifier($inscription_telephone);
        if ($validite == true) {
            $erreur.css('display', 'none');
            $bravo.css('display', 'block');
        }
        else
            $erreur.css('display', 'block');

    });

    $reset.click(function () {
        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor: 'grey',
            color: '#555'
        });
        $erreur.css('display', 'none');
        $bravo.css('display', 'none');
    });
});
