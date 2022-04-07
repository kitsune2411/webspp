<?php

$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];


if (isset($_POST['submit'])) {
    $nisn         = htmlspecialchars($_POST['nisn']);
    $nis          = htmlspecialchars($_POST['nis']);


    $data = $admin->addSiswa($nisn,$nis,$nama,$alamat, $tlp,$spp,$kelas );

    
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
        <h1 class="h3 mb-2 text-gray-800 d-inline">Entry pembayaran</h1>
    
        <hr>
        
    <!-- form tambah petugas -->
    <form class="user" method="POST" action="">
        <!-- <div class="form-group row mb-0">
            <div class="col-sm-6 mb-sm-0">
                <label for="id_petugas">ID Petugas</label>
            </div>
            <div class="col-sm-6">
            <label for="nama_petugas">Nama Petugas</label>
                
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control" name="id_petugas" id="id_petugas" value="<?=$_SESSION['id_petugas']?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="<?=$_SESSION['username']?>" readonly>
                
            </div>
        </div> -->
        <!-- <hr> -->
        <label for="nisn">NISN Siswa</label>
        <input type="text" name="nisn" id="nisn" class="form-control">
        <hr>
        <label for="bayar">Nominal Bayar</label>
        <select name="bayar" id="bayar" class="form-control">
            <option value="" selected disabled>Berapa kali bayar</option>
        </select>
        
        <button type="submit" name="submit" class="btn btn-primary float-right px-3 mt-3">
            Submit
        </button>

    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
