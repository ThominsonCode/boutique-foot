$(document).ready(function(){
    
    var $prenom = $('#prenom'),
        $nom = $('#nom'),
        $pseudo = $('#pseudo'),
        $mdp = $('#mdp'),
        $confirmation_mdp = $('#confirmation_mdp'),
        $mail = $('#mail'),
        $tel = $('#tel'),
        $envoi = $('#envoi'),
        $reset = $('#reset'),
        $erreur = $('#erreur'),
        $bravo = $('#bravo');
        $validite = true; //Je déclare une variable qui restera vrai sans aucune
                          //erreur mais elle passera à faux dès la première erreur
    
    function valide($validation){ //J'ai créé une fonction qui est appelée lorsque que la réponse correspond aux attentes.
        $validation.css({
            borderColor : 'green',
            color : 'green'
        });
        $validation.next().css("display", "none");
    }

    function pas_valide($non_validation){ //J'ai créé une fonction qui est appelée lorsque que la réponse ne correspond pas aux attentes.
        $non_validation.css({
            borderColor : 'red',
            color : 'red'
        });
        $non_validation.next().css("display", "block");
    }

    $prenom.keyup(function(){  
        if(/[a-zA-Z]+$/.test($prenom.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });

    $nom.keyup(function(){  
        if(/[a-zA-Z]+$/.test($nom.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });
    
    $pseudo.keyup(function(){  
        if(/^[a-z0-9_-]{5,16}$/.test($pseudo.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });
    
    $mdp.keyup(function(){  
        if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,16}$/.test($mdp.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });

    $confirmation_mdp.keyup(function(){
        if($(this).val() == $mdp.val())
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });

    $mail.keyup(function(){  
        if(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($mail.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });

    $tel.keyup(function(){  
        if( /[0-9-()+]{10,10}/.test($tel.val()))
            valide($(this));
        else{
            $validite = false;
            pas_valide($(this));
        }
    });

    function verifier(champ){
        if(champ.val() == ""){
            $validite = false;
            pas_valide($(this));
        }
    }
    
    $envoi.click(function(e){
        e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi

        verifier($pseudo);
        verifier($prenom);
        verifier($nom);
        verifier($tel);
        verifier($mdp);
        verifier($confirmation_mdp);
        
        if($validite == true){
            $erreur.css('display', 'none');
            $bravo.css('display', 'block');
        }
        else
            $erreur.css('display', 'block');
        
    });

    $reset.click(function(){
        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : 'grey',
            color : '#555'
        });
        $erreur.css('display', 'none');
        $bravo.css('display', 'none');
    });
});
