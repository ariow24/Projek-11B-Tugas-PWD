<?php

function bersihkan($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function validasiNama($nama) {
    if (empty($nama)) return "Nama tidak boleh kosong.";
    if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) return "Nama hanya boleh mengandung huruf dan spasi.";
    return true;
}

function validasiUmur($umur) {
    if (empty($umur)) return "Umur tidak boleh kosong.";
    if (!is_numeric($umur)) return "Umur harus berupa angka.";
    return true;
}

$nim = bersihkan($_POST['nim'] ?? '-');
$nama = bersihkan($_POST['nama'] ?? '-');
$umur = bersihkan($_POST['umur'] ?? '-');
$tempat_lahir = bersihkan($_POST['tempat_lahir'] ?? '-');
$tanggal_lahir = bersihkan($_POST['tanggal_lahir'] ?? '-');
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "-";
$jmlSaudara = bersihkan($_POST['jmlSaudara'] ?? '0');
$no_hp = bersihkan($_POST['no_hp'] ?? '-');
$alamat = bersihkan($_POST['alamat'] ?? '-');
$email = bersihkan($_POST['email'] ?? '-');
$kota = bersihkan($_POST['kota'] ?? '-');
$jk = isset($_POST['jk']) ? bersihkan($_POST['jk']) : "-";
$status = isset($_POST['status']) ? bersihkan($_POST['status']) : "-";

$hobi_list = [];
if (!empty($_POST['hobi'])) {
    foreach ($_POST['hobi'] as $h) {
        $hobi_list[] = bersihkan($h);
    }
    $hobi_output = implode(", ", $hobi_list);
} else {
    $hobi_output = "Tidak ada hobi";
}

$cek_nama = validasiNama($nama);
$cek_umur = validasiUmur($umur);

if ($cek_nama !== true) {
    die("<div style='color:red; text-align:center; padding:50px; font-family:sans-serif;'>
            <h3>Gagal: $cek_nama</h3>
            <a href='F_POST.php'>Kembali ke Form</a>
         </div>");
}

if ($cek_umur !== true) {
    die("<div style='color:red; text-align:center; padding:50px; font-family:sans-serif;'>
            <h3>Gagal: $cek_umur</h3>
            <a href='F_POST.php'>Kembali ke Form</a>
         </div>");
}

include 'koneksi.php';

$sql = "INSERT INTO table_mhs (nim, nama, tempatLahir, tanggaLahir, alamat, kota, jenisKelamin, email, noHP, umur, status, hobi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $nim, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $kota, $jk, $email, $no_hp, $umur, $status, $hobi_output);

if ($stmt->execute()) {
} else {
    die("<div style='color:red; text-align:center; padding:50px; font-family:sans-serif;'>
            <h3>Gagal menyimpan data: " . $stmt->error . "</h3>
            <a href='F_POST.php'>Kembali ke Form</a>
         </div>");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tersimpan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .receipt-card {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        .icon-success {
            font-size: 48px;
            margin-bottom: 10px;
            display: block;
        }

        h2 {
            margin: 0 0 5px 0;
            color: #0f172a;
        }

        p.status {
            color: #16a34a;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 30px;
            background: #dcfce7;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .details-table {
            width: 100%;
            text-align: left;
            margin-bottom: 30px;
            border-top: 1px dashed #cbd5e1;
            border-bottom: 1px dashed #cbd5e1;
            padding: 20px 0;
        }

        .details-table tr td {
            padding: 8px 0;
            font-size: 14px;
            color: #334155;
        }

        .details-table tr td:first-child {
            color: #64748b;
            width: 40%;
        }

        .details-table tr td:last-child {
            font-weight: 500;
            text-align: right;
        }

        .btn-back {
            display: block;
            width: 100%;
            text-decoration: none;
            background-color: #0f172a;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .btn-back:hover {
            opacity: 0.9;
        }
        
        .identity {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="receipt-card">
    <span class="icon-success">🎉</span>
    <h2>Data Berhasil Disimpan</h2>
    <p class="status">Successfully Saved</p>
    
    <table class="details-table">
        <tr><td>NIM</td><td><?= $nim ?></td></tr>
        <tr><td>Nama</td><td><?= $nama ?></td></tr>
        <tr><td>Umur</td><td><?= $umur ?> Tahun</td></tr>
        <tr><td>Jml Saudara</td><td><?= $jmlSaudara ?></td></tr>
        <tr><td>Kota</td><td><?= $kota ?></td></tr>
        <tr><td>Email</td><td><?= $email ?></td></tr>
    </table>

    <a href="tambahDataMhs.php" class="btn-back">Tambah Data Baru</a>
    <br>
    <a href="tampilDataMhs.php" style="color: #4f46e5; text-decoration: none; font-size: 14px;">Lihat Semua Data &rarr;</a>

    <div class="identity">
        Created by Saint Khafid Islami
    </div>
</div>

</body>
</html>