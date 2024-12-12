<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if (isset($_POST['daftar'])) {
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $id_pegawai = $_POST['id_pegawai']; // Ambil ID pegawai dari form

    // Mengambil informasi file foto yang diupload
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_size = $_FILES['foto']['size'];
    $foto_error = $_FILES['foto']['error'];

    // Tentukan folder untuk menyimpan foto
    $upload_dir = "uploads/";
    $foto_path = $upload_dir . basename($foto);

    // Validasi upload foto (ekstensi dan ukuran)
    $valid_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $foto_ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    if ($foto_error === UPLOAD_ERR_OK) {
        if (in_array($foto_ext, $valid_ext) && $foto_size <= 5000000) { // max size 5MB
            if (move_uploaded_file($foto_tmp, $foto_path)) {
                // Foto berhasil diupload, masukkan data ke database
                $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto, id_pegawai) 
                        VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$foto', '$id_pegawai')";
                $query = mysqli_query($db, $sql);

                // apakah query simpan berhasil?
                if ($query) {
                    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                    header('Location: index.php?status=sukses');
                } else {
                    // kalau gagal alihkan ke halaman index.php dengan status=gagal
                    header('Location: index.php?status=gagal');
                }
            } else {
                echo "Gagal mengupload foto.";
            }
        } else {
            echo "Format foto tidak valid atau ukuran terlalu besar. Max 5MB dan format jpg, jpeg, png, gif.";
        }
    } else {
        echo "Terjadi kesalahan saat mengupload foto.";
    }
} else {
    die("Akses dilarang...");
}

?>
