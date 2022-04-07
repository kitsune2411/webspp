<?php

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $tahun         = htmlspecialchars($_POST['tahun']);
    $nominal          = htmlspecialchars($_POST['nominal']);
   
        if ($admin->updateSpp($id, $tahun,$nominal)) {
            echo "<script>alert('sukses')</script>";
            echo "<script>window.location.href='?p=spp'</script>";
        } else {
            echo "<script>alert('gagal')</script>";
        }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 d-inline">Tambah Spp</h1>
        <a href="?p=spp" class="btn btn-sm btn-light text-primary float-right d-inline">
            <i class="fa fa-arrow-left">&nbsp;</i>
            Kembali ke list spp
        </a>
        <hr>
        
    <!-- form tambah petugas -->
    <form class="user" method="POST" action="">
        <?php
            foreach($admin->getDataSpp($id) as $spp) :
        ?>
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="tahun">Tahun</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="nominal">Nominal</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="number" class="form-control " id="tahun" placeholder="Masukan tahun" name="tahun" value="<?=$spp['tahun']?>" required>
            </div>
            <div class="col-sm-6">
                <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukan nominal" value="<?=$spp['nominal']?>" required>
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary float-right px-3 mt-3">
            Submit
        </button>
        <?php endforeach ?>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->