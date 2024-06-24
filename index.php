<?php
session_start();
include_once("functions.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$title = 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once("layout/sidebar_index.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once("layout/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Siswa (Jumlah) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Siswa (Jumlah)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $datasiswa = getList("SELECT count(nis) as jumlahSiswa FROM siswa");
                                                    foreach ($datasiswa as $row) {
                                                        echo $row['jumlahSiswa'];
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Guru (Jumlah) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Guru (Jumlah)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $dataguru = getList("SELECT count(nip) as jumlahGuru FROM guru");
                                                    foreach ($dataguru as $row) {
                                                        echo $row['jumlahGuru'];
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->
                    </div>

                  <!-- Data Profil Sekolah Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Profil Sekolah</h6>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="<?=base_url('dashboard/save_profil');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">NAMA SEKOLAH</label>
                        <input type="hidden" name="idprofil_sekolah" value="<?=$school_profil->idprofil_sekolah;?>">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?=$school_profil->nama;?>" placeholder="Nama sekolah">
                    </div>
                    <div class="form-group">
                        <label for="npsn">NPSN</label>
                        <input type="text" class="form-control" id="npsn" name="npsn" value="<?=$school_profil->npsn;?>" placeholder="NPSN">
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                </div>
                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?=$school_profil->provinsi;?>" placeholder="Provinsi">
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat pull-right"><i class="fa fa-save"></i> Simpan Profil</button>
            </div>
        </form>
    </div>
</div>

                <!-- End of Main Content -->

                <!-- Footer -->
                <div class="d-flex justify-content-end mb-4 mr-3">
                    <a href="database/backup.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backup">
                        <i class="fas fa-download fa-sm text-white-50"></i> Backup Database
                    </a>
                </div>
                <?php include 'layout/footer.php'; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets/js/demo/chart-area-demo.js"></script>
        <script src="assets/js/demo/chart-pie-demo.js"></script>

        <script src="assets/js/script.js"></script>
    </div>
</body>
</html>
