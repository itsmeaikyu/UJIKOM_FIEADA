<?php
//PANGGIL KONEKSI DATABASE
include "koneksi.php";
 $id = $_GET['id'];
$edit = "SELECT * FROM tbl_siswa WHERE id_siswa = '$_GET[id]'";
$hasil = mysqli_query($koneksi, $edit);
$data = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM EDIT SISWA</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center><h2>EDIT DATA SISWA</h2></center>
    <div class="container">
        <form action="proses_edit_siswa.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
              <label for="ns">NIS Siswa</label>
            </div>
            <div class="col-75">
                <input type="hidden" name="id" value="<?php echo $data['id_siswa'];?>">
                <input type="text" id="ns" name="nis" value="<?php echo $data['nis'];?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nm">Nama Siswa</label>
            </div>
            <div class="col-75">
                <input type="text" id="nm" name="nama_siswa" value="<?php echo $data['nama_siswa'];?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="almt">Alamat</label>
                </div>
            <div class="col-75">
                <textarea id="almt" name="alamat" style="height:200px;" required><?php echo $data['alamat'];?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-25">
                <label for="ft">Foto</label>
            </div>
            <div class="col-75">
                <img src="gambar/<?php echo $data['foto'];?>" width="70px" height="70px"><br>
                <input type="file" id="ft" name="gambar">
                <p style="color:red">Extensi yang diperbolehkan .png | .jpg | .jpeg |.gif</p>
            </div>
        </div>

        <div class="row">
            <button type="submit" name="update" value="submit">UPDATE</button>
            <button type="reset" name="batal" value="batal">BATAL</button>
        </div>
        </form>
    </div>
</body>
</html>
