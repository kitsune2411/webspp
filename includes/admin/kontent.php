<?php

if (empty($_GET)) {
    include 'dashboard.php';
}

if (isset($_GET['p'])) {
    if ($_GET['p'] == 'dashboard') {
        include 'dashboard.php';
    } elseif ($_GET['p'] == 'unauthorize') {
        include 'unauthorize.php';
    } elseif ($_GET['p'] == 'petugas') {
        include 'data-petugas.php';
    } elseif ($_GET['p'] == 'siswa') {
        include 'data-siswa.php';
    } elseif ($_GET['p'] == 'spp') {
        include 'data-spp.php';
    } elseif ($_GET['p'] == 'tambah-petugas') {
        include 'tambah-petugas.php';
    } elseif ($_GET['p'] == 'tambah-siswa') {
        include 'tambah-siswa.php';
    } elseif ($_GET['p'] == 'tambah-spp') {
        include 'tambah-spp.php';
    } elseif ($_GET['p'] == 'delete-petugas') {
        $id = $_GET['id'];
        $delete = $admin->deletePetugas($id);
        echo "<script>window.location.href='?p=petugas'</script>";
    }  elseif ($_GET['p'] == 'delete-siswa') {
        $id = $_GET['id'];
        $delete = $admin->deleteSiswa($id);
        echo "<script>window.location.href='?p=siswa'</script>";
    } 
}
?>