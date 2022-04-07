<?php
if (isset($_POST['submit'])) {
    $name         = htmlspecialchars($_POST['name']);
    $username     = htmlspecialchars($_POST['username']);
    $level        = htmlspecialchars($_POST['level']);
    $pass         = md5($_POST['password']);
    $confirm_pass = md5($_POST['confirm_password']);

    if ($pass == $confirm_pass) {
        if ($admin->addPetugas($name, $username, $pass, $level)) {
            echo "<script>alert('sukses')</script>";
            echo "<script>window.location.href='?p=petugas'</script>";
        } else {
            echo "<script>alert('gagal')</script>";
        }
    } else {
        echo "<script>alert('password tidak sama')</script>";
        $_SESSION['error'] == "invalid";
    }

    
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 d-inline">Edit Petugas</h1>
        <a href="?p=petugas" class="btn btn-sm btn-light text-primary float-right d-inline">
            <i class="fa fa-arrow-left">&nbsp;</i>
            Kembali ke list petugas
        </a>
        <hr>
        
    <!-- form tambah petugas -->
    <form class="user" method="POST" action="">
        <label for="fullname">Nama Lengkap</label>
        <div class="form-group">
            <input type="text" class="form-control " id="fullname" placeholder="Masukan Nama Lengkap" name="name" required>
        </div>
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="username">Username</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="level">Level</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control " id="username" placeholder="Masukan Username" name="username" required>
            </div>
            <div class="col-sm-6">
                <select name="level" id="level" class="form-control" required>
                    <option value="" selected disabled>level petugas</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-sm-6 mb-0 mb-sm-0">
                <label for="password">Password</label>
            </div>
            <div class="col-sm-6 mb-0">
                <label for="confirm_password">Confirm Password</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control " id="password" placeholder="Password" name="password" required>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control " id="confirm_password" placeholder="Repeat Password" name="confirm_password" required>
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