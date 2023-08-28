<?php
// Koneksi ke database (pastikan file database.php telah Anda buat)
include("models/database.php");

// Ambil data terakhir yang diinsert
$query = "SELECT * FROM pendaftaran ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["nama"];
    $email = $row["email"];
    $phone = $row["nomor_hp"];
    $semester = $row["semester"];
    $status = $row["status_ajuan"];
} else {
    echo "Tidak ada data ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Pendaftaran Beasiswa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Beasiswa</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beasiswa">Pilihan Beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="result.php">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="hasil" class="container mt-5">
        <h2 class="text-center mb-4">Hasil Pendaftaran</h2>
        <div class="result-container">
            <p><strong>Nama:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Nomor HP:</strong> <?php echo $phone; ?></p>
            <p><strong>Semester:</strong> <?php echo $semester; ?></p>
            <p><strong>Status Ajuan:</strong> <?php echo $status; ?></p>
        </div>
        </section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
