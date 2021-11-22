<?php
include "koneksi.php";
if(isset($_POST['upload'])){
  $direktori="storage/";
  $file_name=$_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],$direktori.$file_name);
  $nama_kegiatan=$_POST['kegiatan'];
  $lokasi=$_POST['lokasi'];
  $waktu=$_POST['waktu'];
  $sql="insert into tb_kegiatan (nama_kegiatan) values ('$nama_kegiatan')";
  $squeri="insert into tb_lokasi(lokasi_kegiatan) values ('$lokasi')";
  $sqli="insert into tb_laporan(nama_file, waktu) values ('$file_name','$waktu')";
  $hasil=mysqli_query($koneksi,$sql);
  $hasil2=mysqli_query($koneksi,$squeri);
  $hasil3=mysqli_query($koneksi,$sqli);
  echo "<script>
  alert('data berhasil di upload ');
  document.location.href = 'upload.php';
  </script>
  ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISGUN</title>
    <!-- CSS only -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
	}
	?>
    <!-- navbar -->
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php">SISDEGUN</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="data.php">Data</a>
                  </li>
                  <div class="dropdown">
                    <badge class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                    </badge>
                    <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Nama Perangkat</a></li>
                      <li><a class="dropdown-item" href="#">Login</a></li>
                    </ul>
                  </div>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <!-- corousel -->
      <div class="container mt-5">
        <form  action="" method="post" enctype="multipart/form-data"">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" id="exampleInputEmail1" placeholder="Nama Kegiatan" aria-describedby="emailHelp">
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lokasi Kegiatan</label>
            <input type="text" name="lokasi" class="form-control" id="exampleInputPassword1" placeholder="Lokasi Kegiatan" >
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Waktu Pengerjaan</label>
            <select name="waktu" class="form-control" id="exampleInputPassword1">
                        <option value="">--Pilih Waktu--</option>
                        <option value="1 jam">1 jam</option>
                        <option value="2 jam" selected>2 jam </option>
                        <option value="3 jam">3 jam</option>
                        <option value="4 jam">4 jam</option>
                        <option value="5 jam">5 jam</option>
                        <option value="6 jam">6 jam</option>
                        </select> 
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Laporan</label>
            <input type="file" name="file" class="form-control" id="exampleInputPassword1" >
          </div>
          <input type="submit" class="btn btn-primary" name="upload" value="Submit">
            </form>
                            
      </div>   
</body>
</html>