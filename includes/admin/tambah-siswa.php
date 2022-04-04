<?php

if (isset($_POST['submit'])) {
    $nisn         = htmlspecialchars($_POST['nisn']);
    $nis          = htmlspecialchars($_POST['nis']);
    $nama          = htmlspecialchars($_POST['nama']);
    $tlp          = htmlspecialchars($_POST['tlp']);
    $alamat        = htmlspecialchars($_POST['alamat']);
    $spp        = htmlspecialchars($_POST['spp']);
    $kelas        = htmlspecialchars($_POST['kelas']);
;

   
        if ($admin->addSiswa($nisn,$nis,$nama,$alamat, $tlp,$spp,$kelas )) {
            echo "<script>alert('sukses')</script>";
            echo "<script>window.location.href='?p=siswa'</script>";
        } else {
            echo "<script>alert('gagal')</script>";
        }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 d-inline">Tambah Siswa</h1>
        <a href="?p=siswa" class="btn btn-sm btn-light text-primary float-right d-inline">
            <i class="fa fa-arrow-left">&nbsp;</i>
            Kembali ke list siswa
        </a>
        <hr>
        
    <!-- form tambah petugas -->
    <form class="user" method="POST" action="">
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="nisn">NISN</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="nis">NIS</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control " id="nisn" placeholder="Masukan nisn" name="nisn">
            </div>
            <div class="col-sm-6">
                <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukan nis">
            </div>
        </div>
        <label for="nama">Nama</label>
        <div class="form-group">
            <input type="text" class="form-control" id="nama" placeholder="nama lengkap" name="nama">
        </div>
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="kelas">Kelas</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="spp">SPP</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select type="text" class="form-control " id="kelas" name="kelas">
                    <option value="" selected disabled>Pilih kelas</option>
                    <?php
                    $data = $admin->getAllKelas();
                    foreach ($data as $kelas ) :
                    ?>
                        <option value="<?=$kelas['id_kelas']?>"><?=$kelas['nama_kelas']?></option>
                    <?php endforeach; 
                    ?>
                </select>
            </div>
            <div class="col-sm-6">
            <select type="text" class="form-control " id="spp" name="spp">
                    <option value="" selected disabled>Pilih tahun</option>
                    <?php
                    $data = $admin->getAllSpp();
                    foreach ($data as $spp ) :
                    ?>
                        <option value="<?=$spp['id_spp']?>"><?=$spp['tahun']?></option>
                    <?php endforeach; 
                    ?>
                </select>
            </div>
        </div>
        <label for="tlp">No telepon</label>
        <div class="form-group">
            <input type="text" class="form-control" id="tlp" placeholder="No telepon" name="tlp">
        </div>
        <label for="alamat">Alamat</label>
        <div class="form-group">
            <textarea name="alamat" id="alamat"  rows="3" class="form-control" placeholder="alamat lengkap"></textarea>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary float-right px-3 mt-3">
            Submit
        </button>

    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->