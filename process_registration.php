<?php
// Koneksi ke database (pastikan file database.php telah Anda buat)
include("models/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor_hp = $_POST["nomor_hp"];
    $semester = $_POST["semester"];
    $pilihan_beasiswa = $_POST["pilihan_beasiswa"]; // Nilai dari pilihan beasiswa
    $status_ajuan = "Belum di verifikasi"; // Status awal ajuan

    // Mengunggah berkas syarat (asumsikan nama berkas unik)
    $uploadDir = "uploads/"; // Folder tujuan penyimpanan berkas
    $berkas_syarat = $uploadDir . basename($_FILES["berkas_syarat"]["name"]);
    move_uploaded_file($_FILES["berkas_syarat"]["tmp_name"], $berkas_syarat);

    // Masukkan data ke tabel pendaftaran
    $query = "INSERT INTO pendaftaran (nama, email, nomor_hp, semester, pilihan_beasiswa, berkas_syarat, status_ajuan)
              VALUES ('$nama', '$email', '$nomor_hp', $semester, '$pilihan_beasiswa', '$berkas_syarat', '$status_ajuan')";

    if ($conn->query($query) === TRUE) {
        header("Location: result.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
