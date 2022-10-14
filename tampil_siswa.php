<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Siswa</title>
    <link href="table.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a type="button" href="form_input_siswa.php"> Tambah Data </a>
    <center><h2>TAMPIL DATA SISWA</h2></center>
    <table border="1" id="customers">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>ALAMAT</th>
            <th>FOTO</th>
            <th>AKSI</th>
        </tr>
    <?php
    $no=1;
    //querry menanpilkan data siswa

    $tampil ="SELECT * FROM tbl_siswa ORDER BY id_siswa";
    $result=array();
    $hasil=mysqli_query($koneksi,$tampil);
    $total=mysqli_num_rows($hasil);          
    while ($data=mysqli_fetch_array($hasil)){
        $result[]=$data;
    }
        //result array di setiap foreach
    foreach($result as $value){
    ?>
        <tr>
            <td><?= $no?></td>
            <td><?= $value['nis']?></td>
            <td><?= $value['nama_siswa']?></td>
            <td><?= $value['alamat']?></td>
            <td><img src="gambar/<?= $value['foto']?>" width="60px" height="60px"></td>
            <td><a href="edit_siswa.php?id=<?= $value['id_siswa'];?>"> EDIT</a> ||
                <a href="hapus_siswa.php?id=<?= $value['id_siswa'];?>"> HAPUS</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </table>
    <br>
    <strong>JUMLAH DATA SISWA <?php echo $total ?></strong>
</body>
</html>


