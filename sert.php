<?php 
session_start();
include('koneksi.php');
if(!isset($_SESSION['username']) or $_SESSION['lvl']=='1'){
    header("Location: logout.php");
} else {
//echo $_SESSION['lvl'];
$sql=('SELECT * FROM sertif');
//$sql= "SELECT nom,nama,karyawan,jenjang,npk2,hp,email,home,sekolah,raport,kk FROM data_diri INNER JOIN berkas ON npk=npk2";
$ambil=mysqli_query($conn, $sql);
?> 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beasiswa 2022</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <!-- Data Table -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/jquery.dataTables.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <!-- Navigation-->
        <!--<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="mainNav" style="--bs-bg-opacity: .2;">
            <div class="container px-4">
                <a class="navbar-brand" href="admin.php">Beasiswa 2022</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link" href="admin.php"> Verifikasi Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="report.php">Report Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="hasilpengumuman.php">Hasil Pengumuman</a></li>
                        <li class="nav-item"><a class="nav-link" href="sert.php">Sertifikat</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <?php
        if(!empty($_GET['berhasil'])){
        ?>
        <!--ALERTTTT-->
        <div class="container">
            <div class="alert alert-success" role="berhasil">
                <?= $_GET['berhasil']; echo " Data Berhasil Disimpan";?>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- Header-->
        <div class="container mt-3 py-12">
        <a class="btn btn-success btn-sm mb-3" href="uploadsertif.php">Upload Hasil Beasiswa</a>
        <table class="table caption-top table-hover table-bordered border-dark text-center ">
            <caption>Beasiswa</caption>
            <thead class="table-primary border-info">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">NPK</th>
                <th scope="col">Nama</th>
                <th scope="col">Sekolah</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            while ($row = mysqli_fetch_array($ambil)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row["npk"]; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["sekolah"]; ?></td>
                    <td><a href="deletesert.php?npk=<?= $row['npk']; ?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <!-- Footer-->
        <footer class="py-3 mt-4 bg-dark" style="--bs-bg-opacity: .3;">
            <div class="container px-4"><p class="m-0 text-center text-dark">Copyright &copy; Sistem Beasiswa</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/sb-forms-latest.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.data').DataTable();
            });
        </script>
    </body>
</html>
<?php 
} 
?>
<style>
    footer{
        background:#f0f0f0;position:absolute;bottom:0;width:100%;
   text-align:center;color:#808080;
    }
</style>