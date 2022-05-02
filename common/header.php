<?php
//document à compléter
session_start();
require("database.php");
$db = Database::connect();
?>

<!doctype html>
<html lang="en">

<head>
    <title>FootClub 2022</title>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--CSS-->
    <link rel="stylesheet" href="CSS/<?= $css_sheet ?>.css">
    <?php
    if (isset($css_sheet2))
        echo '<link rel="stylesheet" href="CSS/' . $css_sheet2 . '.css">';
    ?>

    <!-- ICONES -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>
</head>

<body>