<?php

$css_sheet = "adminstyle";
require('common/header.php');

unset($_SESSION['uid']);
unset($_SESSION['user']);

header("Location: index.php");


require('common/footer.php');
