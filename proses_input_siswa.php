<?php
// MEMANGGIL KONEKSI DATABASE
include "koneksi.php";

//jika tombol simpan belum di klik maka data 

if(isset($_POST['upload'])){

    // MEMISAHKAN VARIABLE DATA GAMBAR

    $namafile=$_FILES['gambar']['name'];
    $ukuranfile=$_FILES['gambar']['size'];
    $error=$_FILES['gambar']['error'];
    $tmpname=$_FILES['gambar']['tmp_name'];

    //MENGAMBIL VARIABEL DARI FORM INPUT SISWA
    // MENGGUNAKAN METHOD POST
        $nis=htmlspecialchars($_POST['nis']);
        $nama=$_POST['nama_siswa'];
        $alamat=$_POST['alamat'];

    $extesigambarvalid =['jpg','jpeg','png'];
    $extensigambar = explode('.',$namafile);
    $extensigambar = strtolower (end($extensigambar));

    if(!in_array($extensigambar,$extesigambarvalid)){
        echo "
        <script>
        alert('Yang anda upload Bukan gambar');
        </script>
        ";
        return false;
    }

// GENERATE NAMA GAMBAR BARU DAN MEMBEDAKAN SETIAP NAMA FILE GAMBAR

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $extensigambar;

    move_uploaded_file($tmpname,'gambar/'.$namafilebaru);
    $input = "INSERT INTO tbl_siswa VALUES ('','$nis','$nama','$alamat','$namafilebaru')";
    $hasil = mysqli_query($koneksi, $input);

    if($hasil){
        echo "
        <script>
        alert('Data Berhasil Di Simpan');
        window.location.href='tampil_siswa.php';
        </script>
        ";

    }

// Cek apakah tidak ada gambar yang di upload

    if($error === 4){
        echo "
        <script>
        alert('Pilih Gambar Terlebih Dahulu');
        </script>
        ";
        return false;

        // Cek jika ukuran gambar terlalu besar

        if($ukuranfile > 1000000){
            echo "
            <script>
            alert('Ukuran Gambar terlalu Besar');
            </script>
            ";
            return false;
        }
    }
}
?>

