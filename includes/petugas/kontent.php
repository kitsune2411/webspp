<?php

if (empty($_GET)) {
    include 'dashboard.php';
}

if (isset($_GET['p'])) {
    if ($_GET['p'] == 'dashboard') {
        include 'dashboard.php';
    } elseif ($_GET['p'] == 'unauthorize') {
        include 'unauthorize.php';
    } elseif ($_GET['p'] == 'bayar') {
        include 'bayar.php';
    } elseif ($_GET['p'] == 'history') {
        include 'history.php';
    } else {
        include '404.php';
    }
}
?>