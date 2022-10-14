<?php
// MEMANGGIL KONEKSI DATABASE
include "koneksi.php";

    $namafile= $_FILES['gambar']['name'];

    if(empty($namafile)){
        $update = "UPDATE tbl_siswa SET nis='$_POST[nis]',
                    nama_siswa='$_POST[nama_siswa]',
                    alamat='$_POST[alamat]'";
        $update .= "WHERE id_siswa = '$_POST[id]'";
        $hasil = mysqli_query($koneksi, $update);

        if($hasil){
            echo "
            <script>
            alert('Data Berhasil Di Simpan22');
            window.location.href='tampil_siswa.php';
            </script>
            ";

        } else {
            echo "
            <script>
            alert('Data Gagal Di Simpan 30');
            window.location.href='tampil_siswa.php';
            </script>
            ";
        }
    } else {

        //MENGHAPUS GAMBAR YANG LAMA
        $ambil= "SELECT * FROM tbl_siswa WHERE id_siswa ='$_POST[id]'";
        $hapus = mysqli_query($koneksi,$ambil);
        $nama_gambar = mysqli_fetch_array($hapus);
        $lokasi=$nama_gambar['foto'];
        $hapus_gambar="gambar/$lokasi";
        unlink($hapus_gambar);
        // MEMISAHKAN VARIABLE DATA GAMBAR

        $ukuranfile=$_FILES['gambar']['size'];
        $error=$_FILES['gambar']['error'];
        $tmpname=$_FILES['gambar']['tmp_name'];

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
        $update = "UPDATE tbl_siswa SET nis='$_POST[nis]',
                    nama_siswa='$_POST[nama_siswa]',
                    alamat='$_POST[alamat]',
                    foto='$namafilebaru'";
        $update .= "WHERE id_siswa = '$_POST[id]'";
        $hasil = mysqli_query($koneksi, $update);

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

