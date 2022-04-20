<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
</div>
<!-- Content Row -->
<div class="row">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Petugas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$admin->conn->query("SELECT * FROM petugas")->num_rows?> Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Siswa Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Siswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$admin->conn->query("SELECT * FROM siswa")->num_rows?> Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Pembayaran spp</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$admin->conn->query("SELECT * FROM pembayaran")->num_rows?> transaksi</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-table fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pembayaran spp</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=number_format($admin->conn->query("SELECT SUM(jumlah_bayar) FROM pembayaran")->fetch_array()[0])?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="text-center">

    <video autoplay loop muted>
        <source src="../vid/bumi.mp4" type="video/mp4">
    </video>
    
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->