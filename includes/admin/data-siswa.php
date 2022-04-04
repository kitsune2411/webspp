

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary d-inline">Data Siswa</h5>
                <a href="?p=tambah-siswa" class="btn btn-primary float-right d-inline">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No telepon</th>
                                <th>Action</th>

                            </tr>
                        </tfoot> -->
                        <tbody>
                        <?php
                        $no = 1;
                        $siswa = $admin->getAllDataSiswa();
                        
                        while ($row = $siswa->fetch_assoc()):

                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['nisn']?></td>
                                <td><?=$row['nis']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$row['nama_kelas']?></td>
                                <td><?=$row['alamat']?></td>
                                <td><?=$row['no_telp']?></td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="?p=delete-siswa&id=<?=$row['nisn']?>" onclick="return confirm('data akan dihapus, yakin?')" class="btn btn-danger">Delete</a>
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
