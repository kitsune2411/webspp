<?php

if (isset($_POST['submit'])) {
    $kelas         = htmlspecialchars($_POST['kelas']);
    $komka          = htmlspecialchars($_POST['komka']);
   
        if ($admin->addKelas($kelas,$komka)) {
            echo "<script>alert('sukses')</script>";
            echo "<script>window.location.href='?p=kelas'</script>";
        } else {
            echo "<script>alert('gagal')</script>";
        }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 d-inline">Tambah Kelas</h1>
        <a href="?p=kelas" class="btn btn-sm btn-light text-primary float-right d-inline">
            <i class="fa fa-arrow-left">&nbsp;</i>
            Kembali ke list kelas
        </a>
        <hr>
        
    <!-- form tambah petugas -->
    <form class="user" method="POST" action="">
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="kelas">Kelas</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="komka">kopentensi keahlian</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control " id="kelas" placeholder="Masukan kelas" name="kelas">
            </div>
            <div class="col-sm-6">
                <input type="text" name="komka" id="komka" class="form-control" placeholder="Masukan kopentensi keahlian">
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary float-right px-3 mt-3">
            Submit
        </button>

    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->