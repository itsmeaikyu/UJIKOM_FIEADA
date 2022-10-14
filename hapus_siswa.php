<?php
// MEMANGGIL KONEKSI DATABASE
include "koneksi.php";

    $id = $_GET[id];
    $namafile= $_FILES['gambar']['name'];

    //MENGHAPUS GAMBAR
        $ambil= "SELECT * FROM tbl_siswa WHERE id_siswa ='$id'";
        $hapus = mysqli_query($koneksi,$ambil);
        $nama_gambar = mysqli_fetch_array($hapus);
        $lokasi=$nama_gambar['foto'];
        $hapus_gambar="gambar/$lokasi";
        unlink($hapus_gambar);

    //MENGHAPUS DATA SISWA
    $hapus_siswa = mysqli_query($koneksi,"DELETE FROM tbl_siswa WHERE id_siswa ='$id'");
    if($hapus_siswa){
        echo "
        <script>
            alert('Data Berhasil Di Hapus');
            window.location.href='tampil_siswa.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Di Hapus');
            window.location.href='tampil_siswa.php';
            </script>
        ";
    }
?>
