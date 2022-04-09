<?php
require_once "../../config/koneksi.php";

$db = new DB;

$nisn ='';
$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

if(isset($_GET['cek'])) {
    
    $kirim_nisn = $_GET['cek_nisn'];
    $nisn_nama = explode('-', $kirim_nisn);
    $nisn_fix = trim($nisn_nama[0]);
    $nisn = $nisn_fix;

    $siswa_bayar = $db->fetchAll("SELECT * FROM data_siswa WHERE nisn='$nisn'");

    // var_dump($siswa_bayar);
    
}



if (isset($_POST['submit']) && !empty($nisn)) {
        $id_petugas = $_SESSION['id_petugas'];
        $nisn = $_POST['nisn_bayar'];
        $tgl_bayar = date('Y-m-d');
        $tahun_dibayar = date('Y');
        $jml_dibayar = $_POST['jml_bayar'];

        $id_spp = $_POST['id_spp'];

        $nominal_bayar = $db->query("SELECT * FROM siswa a LEFT JOIN spp b ON a.id_spp = b.id_spp  WHERE nisn='$nisn'")->fetch_assoc();    


        $query = $db->query("SELECT * FROM pembayaran WHERE nisn='$nisn'");
        $data_bayar = [];
        foreach ($query as $key => $x) {
            $data_bayar[] = $x;
        }

        $bulan_telah_bayar = array_column($data_bayar, "bulan_dibayar");
        $bulan_belum_bayar = array_values(array_diff($bulan, $bulan_telah_bayar));

        $data_lebih_bayar = $jml_dibayar - count($bulan_belum_bayar) ;

        $nominal_bayar_siswa = $nominal_bayar['nominal'];

        if ($data_lebih_bayar > 0) {
            echo "
            <div class='alert alert-warning fade show' role='alert'>
            lebih bayar : Rp.". number_format($data_lebih_bayar *  $nominal_bayar['nominal']) 
            . "</div>";
    
            
            

            $jml_dibayar = count($bulan_belum_bayar);
        }
        
        for ($i=1; $i <= $jml_dibayar; $i++) { 
            $bulan_dibayar = $bulan_belum_bayar[$i - 1];

            $sqli = "INSERT INTO pembayaran( `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES ( '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$nominal_bayar_siswa')";
            $entry_bayar = $petugas->conn->query($sqli);

            $bulan_sukses_bayar[] = $bulan_dibayar;
        }
        if ($entry_bayar) {
            // var_dump($entry_bayar);
            echo "
                <div class='alert alert-success fade show' role='alert'>
                Pembayaran pada bulan "; 
                foreach ($bulan_sukses_bayar as $index => $nilai) {
                    echo $nilai. ", ";
                } 
            echo " telah berhasil
            </div>";
        } else {
            // var_dump($sqli);
            // echo mysqli_error($admin->conn);
        }


        // if ($admin->addSiswa($nisn,$nis,$nama,$alamat, $tlp,$spp,$kelas )) {
        //     echo "<script>alert('sukses')</script>";
        //     echo "<script>window.location.href='?p=siswa'</script>";
        // } else {
        //     echo "<script>alert('gagal')</script>";
        // }

}


?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 d-inline">Entry pembayaran</h1>
    
        <hr>

        <form action="" method="get">
            <label for="nisn">NISN Siswa</label>
            <div class="input-group">
                <input type="hidden" name="p" value="bayar">
                <input type="text" name="cek_nisn" id="nisn" class="form-control mr-3" autocomplete="false" list="nisns">
                <datalist id="nisns">
                    <?php foreach ($petugas->getAllDataSiswa() as $siswa): ?>
                        <option value="<?=$siswa['nisn']?>-<?=$siswa['nama']?>">
                    <?php endforeach ?>
                </datalist>
                <button type="submit" name="cek" class="btn btn-primary float-right d-inline">Cek</button>
            </div>
        </form>
        <hr>
        
<?php if(!empty($nisn)):  
    
    $siswa_bayar = $db->fetchAll("SELECT * FROM data_siswa WHERE nisn='$nisn'");
    $nominal_bayar = $db->query("SELECT * FROM siswa a LEFT JOIN spp b ON a.id_spp = b.id_spp  WHERE nisn='$nisn'")->fetch_assoc();    

    $query = $db->query("SELECT * FROM pembayaran WHERE nisn='$nisn'");
    $data_bayar = [];
    foreach ($query as $key => $x) {
        $data_bayar[] = $x;
    }

    $bulan_telah_bayar = array_column($data_bayar, "bulan_dibayar");
    $bulan_belum_bayar = array_values(array_diff($bulan, $bulan_telah_bayar));
?>
    <!-- form tambah pembayaran -->
        <div class="card shadow mb-4 " >
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary d-inline">Pembayaran Tahun <?=date('Y')?></h5>
            </div>
            <div class="card-body">
                <?php foreach($siswa_bayar as $data_siswa_bayar) :  $id_spp=$data_siswa_bayar['id_spp']?>
    <div class="form-group row mb-0">
        <p class="col-sm-2 col-form-label">NISN </p>
        <div class="col-sm-10 mb-0 mb-sm-0">
            <p>:&nbsp;<?=$data_siswa_bayar['nisn']?></p>
        </div>
    </div>
    <div class="form-group row mb-0">
        <p class="col-sm-2 col-form-label">NIS </p>
        <div class="col-sm-10 mb-0 mb-sm-0">
            <p>:&nbsp;<?=$data_siswa_bayar['nis']?></p>
        </div>
    </div>
    <div class="form-group row mb-0">
        <p class="col-sm-2 col-form-label">Nama Siswa </p>
        <div class="col-sm-10 mb-0 mb-sm-0">
            <p>:&nbsp;<?=$data_siswa_bayar['nama']?></p>
        </div>
    </div>
    <div class="form-group row mb-0">
        <p class="col-sm-2 col-form-label">Kelas </p>
        <div class="col-sm-10 mb-0 mb-sm-0">
            <p>:&nbsp;<?=$data_siswa_bayar['nama_kelas']?></p>
        </div>
    </div>
    <div class="form-group row mb-0">
        <p class="col-sm-2 col-form-label">Kopetensi Keahlian </p>
        <div class="col-sm-10 mb-0 mb-sm-0">
            <p>:&nbsp;<?=$data_siswa_bayar['kopetensi_keahlian']?></p>
        </div>
    </div>
    <?php endforeach; ?>
    <hr>
    <div class="form-group row mb-0">
        <h5 class="ml-2">Bulan</h5>
        <div class="col-sm-12 mb-0 mb-sm-0">
            <?php foreach ($bulan as $key => $value) { ?>
                <text class="badge <?= (!in_array($value, $bulan_telah_bayar)) ? 'badge-danger' : 'badge-success' ?>"><?=$value?></text>
                <?php } ?>
            </div>
            <!-- <div class="col-sm-3 mb-0">
                </div> -->
            </div>
            <div class="mt-2">
                
                <small class="font-weight-bold">KETERANGAN</small> <br>
                <span class="badge badge-success"> &nbsp;&nbsp;&nbsp; </span> <small class="font-weight-bold">: LUNAS</small><br>
                <span class="badge badge-danger"> &nbsp;&nbsp;&nbsp; </span> <small class="font-weight-bold">: BELUM LUNAS</small><br>
            </div>
            
            <hr>
        <form action="" method="post">  
            <input type="hidden" name="nisn_bayar" value="<?=$nisn?>">
            <input type="hidden" name="id_spp" value="<?=$id_spp?>">
            <select name="jml_bayar" id="jml_bayar" class="form-control">
                <option value="" selected disabled>Pilih Nominal</option>
                <?php
                    for ($i=1; $i <= 12; $i++) :
                        $nominal = $nominal_bayar['nominal'] * $i;
                        ?>
                    <option value="<?=$i?>"><?=$i?>x bayar - Rp. <?=number_format($nominal)?></option>
                    <?php endfor; ?>
                </select>
                
                <button type="submit" name="submit" class="btn btn-primary mt-3 float-right">Bayar</button>
            </form>
        </div>
<?php endif ?>
    </div>
    <!-- /.container-fluid -->
    
</div>
<!-- End of Main Content -->
