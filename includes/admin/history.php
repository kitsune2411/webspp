
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
                <button onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>Siswa</th> -->
                                <th>NISN</th>
                                <th>Tanggal dibayar</th>
                                <th>Bulan dibayar</th>
                                <th>Tahun dibayar</th>
                                <th>Tahun SPP</th>
                                <th>Jumlah bayar</th>
                                <th>Petugas</th>
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
                        $no = 1;
                        $history = $admin->getHistoryPembayaran();
                        
                        while ($row = $history->fetch_assoc()):

                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['nisn']?></td>
                                <td><?=$row['tgl_bayar']?></td>
                                <td><?=$row['bulan_dibayar']?></td>
                                <td><?=$row['tahun_dibayar']?></td>
                                <td><?=$row['id_spp']?></td>
                                <td><?=$row['jumlah_bayar']?></td>
                                <td><?=$row['id_petugas']?></td>
                                
                            </tr>
                            
                        <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    
</div>
<!-- End of Main Content -->

