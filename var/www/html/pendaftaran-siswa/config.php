<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "pendaftaran_siswa";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

$sql = "SELECT calon_siswa.*, pegawai.nama AS nama_pegawai
        FROM calon_siswa
        LEFT JOIN pegawai ON calon_siswa.id_pegawai = pegawai.id";
$query = mysqli_query($db, $sql)

?>