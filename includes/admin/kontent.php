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
    } elseif ($_GET['p'] == 'kelas') {
        include 'data-kelas.php';
    } elseif ($_GET['p'] == 'tambah-petugas') {
        include 'tambah-petugas.php';
    } elseif ($_GET['p'] == 'tambah-siswa') {
        include 'tambah-siswa.php';
    } elseif ($_GET['p'] == 'tambah-spp') {
        include 'tambah-spp.php';
    } elseif ($_GET['p'] == 'tambah-kelas') {
        include 'tambah-kelas.php';
    } elseif ($_GET['p'] == 'edit-petugas') {
        include 'edit-petugas.php';
    } elseif ($_GET['p'] == 'edit-siswa') {
        include 'edit-siswa.php';
    } elseif ($_GET['p'] == 'edit-spp') {
        include 'edit-spp.php';
    }elseif ($_GET['p'] == 'edit-kelas') {
        include 'edit-kelas.php';
    }  elseif ($_GET['p'] == 'delete-petugas') {
        $id = $_GET['id'];
        $delete = $admin->deletePetugas($id);
        echo "<script>window.location.href='?p=petugas'</script>";
    }  elseif ($_GET['p'] == 'delete-siswa') {
        $id = $_GET['id'];
        $delete = $admin->deleteSiswa($id);
        echo "<script>window.location.href='?p=siswa'</script>";
    } elseif ($_GET['p'] == 'delete-kelas') {
        $id = $_GET['id'];
        $delete = $admin->deleteKelas($id);
        echo "<script>window.location.href='?p=kelas'</script>";
    } elseif ($_GET['p'] == 'delete-spp') {
        $id = $_GET['id'];
        $delete = $admin->deleteSpp($id);
        echo "<script>window.location.href='?p=spp'</script>";
    } elseif ($_GET['p'] == 'bayar') {
        include 'bayar.php';
    } elseif ($_GET['p'] == 'history') {
        include 'history.php';
    }elseif ($_GET['p'] == 'cetak') {
        include 'cetak.php';
    } else {
        include '404.php';
    }
}
?>