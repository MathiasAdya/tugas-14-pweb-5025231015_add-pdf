<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h3 {
            margin: 0;
            font-size: 24px;
        }
        nav {
            text-align: center;
            margin: 20px 0;
        }
        nav a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #45a049;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td a {
            color: #4CAF50;
            text-decoration: none;
            padding: 5px;
        }
        td a:hover {
            background-color: #45a049;
            border-radius: 4px;
        }
        p {
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h3>Siswa yang Sudah Mendaftar</h3>
    </header>
    
    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
        <a href="export-pdf.php">[↓] Export PDF</a>
    </nav>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th> <!-- Kolom Foto -->
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>ID Pegawai</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include("config.php");

            // Query untuk mendapatkan data calon siswa beserta nama pegawai dan foto
            $sql = "SELECT calon_siswa.id, calon_siswa.nama, calon_siswa.alamat, calon_siswa.jenis_kelamin, calon_siswa.agama, calon_siswa.sekolah_asal, calon_siswa.foto, pegawai.nama AS nama_pegawai
                    FROM calon_siswa
                    LEFT JOIN pegawai ON calon_siswa.id_pegawai = pegawai.id";

            $query = mysqli_query($db, $sql);

            // Mengecek apakah query berhasil
            if ($query) {
                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $siswa['id'] . "</td>";
                    // Menampilkan foto siswa
                    echo "<td><img src='uploads/" . $siswa['foto'] . "' alt='Foto Siswa' width='50' height='50'></td>";
                    echo "<td>" . $siswa['nama'] . "</td>";
                    echo "<td>" . $siswa['alamat'] . "</td>";
                    echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                    echo "<td>" . $siswa['agama'] . "</td>";
                    echo "<td>" . $siswa['sekolah_asal'] . "</td>";
                    echo "<td>" . ($siswa['nama_pegawai'] ? $siswa['nama_pegawai'] : 'Belum Diatur') . "</td>"; // Menampilkan nama pegawai
                    echo "<td>";
                    echo "<a href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a> | ";
                    echo "<a href='hapus.php?id=" . $siswa['id'] . "'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Query gagal: " . mysqli_error($db);
            }
            ?>
        </tbody>
    </table>
    
    <p>Total: <?php echo mysqli_num_rows($query); ?></p>
</body>
</html>
