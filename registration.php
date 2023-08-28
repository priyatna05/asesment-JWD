<?php
// Koneksi ke database (pastikan file database.php telah Anda buat)
include("models/database.php");

// Deklarasikan variabel
$name = $email = $phone = $semester = $type = "";
$nameErr = $emailErr = $phoneErr = $semesterErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan sanitasi data yang masuk
    $type = $_POST["type"]; // academic atau non-academic
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $semester = htmlspecialchars($_POST["semester"]);

    // Validasi input
    if (empty($name)) {
        $nameErr = "Nama diperlukan";
    }

    if (empty($email)) {
        $emailErr = "Email diperlukan";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid";
    }

    if (empty($phone)) {
        $phoneErr = "Nomor HP diperlukan";
    }

    if (empty($semester)) {
        $semesterErr = "Semester diperlukan";
    } elseif (!is_numeric($semester) || $semester < 1 || $semester > 8) {
        $semesterErr = "Semester harus antara 1 sampai 8";
    }

    // Jika tidak ada error, masukkan data ke database
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($semesterErr)) {
        $ipk = ($type === "academic") ? 3.4 : 2.9; // Asumsi nilai IPK

        // Masukkan data ke tabel pendaftaran
        $query = "INSERT INTO pendaftaran (nama, email, nomor_hp, semester, ipk, status_ajuan)
                  VALUES ('$name', '$email', '$phone', $semester, $ipk, 'Belum di verifikasi')";

        if ($conn->query($query) === TRUE) {
            header("Location: result.php");
            exit;
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Include your custom CSS file -->
    <title>Pendaftaran Beasiswa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Beasiswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Pilihan Beasiswa</a>
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

    <section id="registrasi" class="container mt-5">
    <h2 class="text-center mb-4">Daftar Beasiswa</h2>
    <h3>Registrasi Beasiswa</h3>
    <form action="process_registration.php" method="post">
        <div class="form-group">
            <label for="nama">Masukkan Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Masukkan Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="nomor_hp">Masukkan Nomor HP:</label>
            <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" required>
        </div>
        <div class="form-group">
            <label for="semester">Pilih Semester Saat Ini:</label>
            <select class="form-control" id="semester" name="semester" required>
                <option value="">Pilih Semester</option>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
        <!-- ... Form fields for registration ... -->
        <?php
        $ipk = 3.5; // IPK yang diasumsikan
        if ($ipk >= 3) {
            echo '
            <div class="form-group">
                <label for="ipk">IPK:</label>
                <input type="text" class="form-control" id="ipk" name="ipk" value="' . $ipk . '" readonly>
            </div>
            <div class="form-group">
                <label for="pilihan_beasiswa">Pilih Jenis Beasiswa:</label>
                <select class="form-control" id="pilihan_beasiswa" name="pilihan_beasiswa" required>
                    <option value="">Pilih Jenis Beasiswa</option>
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non-Akademik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="berkas_syarat">Upload Berkas Syarat:</label>
                <input type="file" class="form-control-file" id="berkas_syarat" name="berkas_syarat">
            </div>';
        } else {
            echo '<p class="text-danger">Maaf, Anda tidak memenuhi syarat untuk pendaftaran beasiswa.</p>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Daftar</button>
        <a href="#" class="btn btn-secondary">Batal</a>
    </form>
</section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
