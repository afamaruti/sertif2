<?php 
session_start();
include('koneksi.php');
if(!isset($_SESSION['username']) or $_SESSION['lvl']=='1'){
    header("Location: logout.php");
} else {

    //         if(isset($_GET['npk'])){
    //         $npk=$_GET['npk'];
    //     }
    //     else {
    //        die ("Error!");    
    //    }    
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
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="mainNav" style="--bs-bg-opacity: .2;">
            <div class="container px-4">
                <a class="navbar-brand" href="admin.php">Beasiswa 2022</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href=""></a></li>
                        <li class="nav-item"><a class="nav-link" href=""></a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>        
        <?php
        if(!empty($_GET['alert'])){
        ?>
        <!--ALERTTTT-->
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <?= $_GET['alert'];?>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- Header-->
        <div class="container mt-5 py-3 text-center">
            <h1>Upload Hasil Beasiswa</h1>
        </div>
        <div class="container">
            <form class="row g-3 mt-2" action="import.php" method='POST' enctype="multipart/form-data">
                <!-- <div class="col-12 mb-3" hidden>
                    <label for="npk" class="form-label">Periode</label>
                    <?php
                    $periode=date('Y');
                    ?>
                    <input type="" class="form-control" name='periode' value="<?php echo $periode;?>" required>
                </div> -->
                <div class="row g-3 align-items-center">
                    <div class="mb-3">
                        <label for="upload" class="form-label"></label>
                        <input class="form-control" type="file" name='filesertif' id="upload" required autofocus>
                        <span id="text" class="form-text">
                        Upload dalam format xls
                        </span>
                    </div>
                </div>
                <div class="col-12 my-4">
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" value='simpan' class="btn btn-outline-success">Simpan</button>
                        </div>
                </div>
            </form>
        </div>
        <!-- Footer-->
        <footer class="py-3 mt-4 bg-dark" style="--bs-bg-opacity: .3;">
            <div class="container px-4"><p class="m-0 text-center text-dark" >Copyright &copy; Sistem Beasiswa</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
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