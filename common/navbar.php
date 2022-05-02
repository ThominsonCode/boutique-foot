<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "pas-co";
    // echo 'ok!!';
} else {
    // include('index.php');
    // echo $_SESSION['user'];
}
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a href="index.php"> <img style="width: 100px;" href="#" src="Image/Logo_Club.png" alt="Logo_Club"></a>

    <!-- <a class="navbar-brand" href="#">LaBoutique</a> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-homme" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    HOMME
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">sous-cat 1</a>
                    <a class="dropdown-item" href="#">sous-cat 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">sous-cat 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-femme" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FEMME
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">sous-cat 1</a>
                    <a class="dropdown-item" href="#">sous-cat 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">sous-cat 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-enfant" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ENFANT
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">sous-cat 1</a>
                    <a class="dropdown-item" href="#">sous-cat 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">sous-cat 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-accessoires" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACCESSOIRES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">sous-cat 1</a>
                    <a class="dropdown-item" href="#">sous-cat 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">sous-cat 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-nouveautes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    NOUVEAUTES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">sous-cat 1</a>
                    <a class="dropdown-item" href="#">sous-cat 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">sous-cat 3</a>
                </div>
            </li>
        </ul>

    </div>

    <div class="nav-icons">
        <a href="connexion.php"><i class="fas fa-user fa-2x" style="color: black;"></i></a>
        <div class="block">
            <div class="circle">
                <?php
                require("database.php");
                Database::connect();
                echo '<p style="text-transform: uppercase;">' . $_SESSION['user'][0] . '</p>';
                Database::disconnect();
                ?>
            </div>
        </div>
        <a href="panier.php"><i class="fas fa-cart-shopping fa-2x" style="color: black;"></i></a>
    </div>
</nav>