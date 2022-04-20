<?php
require_once "../../config/koneksi.php";

$db = new DB;

$bulan = ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];

?>
   <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary d-inline">History pembayaran</h5>
                <a href="print.php" target="blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <!-- <th>Siswa</th> -->
                                <th>Siswa</th>
                                <?php
                                    foreach ($bulan as $key => $value) {
                                        print "<th>".$value."</th>";
                                    }
                                ?>
                                
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>level</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
                        <?php
                        $siswa = $db->FetchAll("SELECT * FROM siswa");

                        

                        foreach ($siswa as $key => $s) :
                            $sql = $db->query("SELECT * FROM pembayaran WHERE nisn = '{$s['nisn']}'");
                            $data_bayar = $sql->fetch_all();
                            $jml_telah_bayar = $sql->num_rows;
                        ?>
                            <tr>
                                <td><?=$s['nisn']?> - <?=$s['nama']?></td>
                                <?php
                                foreach ($data_bayar as $key => $by) { ?>
                                    <td>
                                        <span class="text-success"><i class="fas fa-check-circle"></i></span>
                                    </td>
                                    <?php
                                }
                                    
                                if ($jml_telah_bayar <= 12) {
                                    $jml = 12 - $jml_telah_bayar ;

                                    for ($i=1; $i <= $jml; $i++) { 
                                ?>
                                    <td>
                                        <span class="text-danger"><i class="fas fa-times-circle"></i></span>
                                    </td>
                                <?php
                                    }
                                }
                                ?>

                            </tr>
                            
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    
</div>
<!-- End of Main Content -->

<script>
    function cetak() {
        window.print();
    }
</script>

