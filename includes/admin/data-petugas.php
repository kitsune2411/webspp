
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
                <h5 class="m-0 font-weight-bold text-primary d-inline">Data Petugas</h5>
                <a href="?p=tambah-petugas" class="btn btn-primary float-right d-inline">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>level</th>
                                <th>Action</th>
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
                        $petugas = $admin->getAllDataPetugas();
                        
                        while ($row = $petugas->fetch_assoc()):

                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['nama_petugas']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['level']?></td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="?p=delete-petugas&id=<?=$row['id_petugas']?>" onclick="return confirm('data akan dihapus, yakin?')" class="btn btn-danger">Delete</a>
                                </td>
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
