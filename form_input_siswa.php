<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM INPUT SISWA</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h2>FORM INPUT SISWA</h2>
    <div class="container">
        <form action="proses_input_siswa.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
              <label for="ns">NIS Siswa</label>
            </div>
            <div class="col-75">
                <input type="text" id="ns" name="nis" placeholder="Masukan Nis..." required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nm">Nama Siswa</label>
            </div>
            <div class="col-75">
                <input type="text" id="nm" name="nama_siswa" placeholder="Masukan Nama..." required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="almt">Alamat</label>
            </div>
            <div class="col-75">
                <textarea id="almt" name="alamat" placeholder="Masukan Alamat..." style="height:200px;" required></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-25">
                <label for="ft">Foto</label>
            </div>
            <div class="col-75">
                <input type="file" id="ft" name="gambar">
                <p style="color:red">Extensi yang diperbolehkan .png | .jpg | .jpeg |.gif</p>
            </div>
        </div>

        <div class="row">
            <button type="submit" name="upload" value="submit">SIMPAN</button>
            <button type="reset" name="batal" value="batal">BATAL SIMPAN</button>
        </div>
        </form>
    </div>
</body>
</html>


