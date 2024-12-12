<!DOCTYPE html>
<html>
<head>
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
        header h1 {
            margin: 0;
            font-size: 36px;
        }
        header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
        }
        nav {
            margin: 20px 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #45a049;
        }
        h4 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 20px;
            color: #4CAF50;
        }
        p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
        .status-success {
            color: #4CAF50;
            font-weight: bold;
        }
        .status-failure {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h3>Pendaftaran Siswa Baru</h3>
        <h1>SMK Coding</h1>
    </header>

    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="form-daftar.php">Daftar Baru</a></li>
            <li><a href="list-siswa.php">Pendaftar</a></li>
        </ul>
    </nav>

    <?php if(isset($_GET['status'])): ?>
    <p class="<?= $_GET['status'] == 'sukses' ? 'status-success' : 'status-failure' ?>">
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>
</body>
</html>
