<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
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
        form {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: none;
            padding: 0;
        }
        p {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        textarea {
            resize: none;
            height: 100px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>
    
    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <p>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required />
            </p>
            <p>
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" placeholder="Alamat lengkap" required></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" required /> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" required /> Perempuan</label>
            </p>
            <p>
                <label for="agama">Agama:</label>
                <select name="agama" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Atheis">Atheis</option>
                </select>
            </p>
            <p>
                <label for="sekolah_asal">Sekolah Asal:</label>
                <input type="text" name="sekolah_asal" placeholder="Nama sekolah" required />
            </p>

            <!-- Dropdown untuk memilih Pegawai -->
            <p>
                <label for="id_pegawai">Pilih Pegawai:</label>
                <select name="id_pegawai" required>
                    <option value="">Pilih Pegawai</option>
                    <?php
                    include("config.php");

                    // Ambil data pegawai dari database
                    $sql = "SELECT id, nama FROM pegawai";
                    $result = mysqli_query($db, $sql);

                    // Menampilkan opsi pegawai di dropdown
                    while ($pegawai = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $pegawai['id'] . "'>" . $pegawai['nama'] . "</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="foto">Upload Foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*" required />
            </p>
            <p>
                <input type="submit" value="Daftar" name="daftar" />
            </p>
        </fieldset>
    </form>
</body>
</html>
