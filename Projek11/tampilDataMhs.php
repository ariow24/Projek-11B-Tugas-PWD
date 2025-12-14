<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 40px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            color: #0f172a;
            margin: 0;
            font-weight: 700;
        }
        
        .identity-tag {
            font-size: 12px;
            color: #64748b;
            background: #e2e8f0;
            padding: 4px 10px;
            border-radius: 4px;
        }

        .btn-add {
            background-color: #4f46e5;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
            box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2);
        }

        .btn-add:hover { background-color: #4338ca; }

        .table-wrapper {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            overflow: hidden; /* Round corners fix */
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            white-space: nowrap;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }

        tr:last-child td { border-bottom: none; }
        
        tr:hover { background-color: #f8fafc; }

        .no-data {
            text-align: center;
            padding: 50px;
            color: #94a3b8;
        }

        /* Scrollbar Halus */
        .table-wrapper::-webkit-scrollbar { height: 8px; }
        .table-wrapper::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .table-wrapper::-webkit-scrollbar-track { background: transparent; }

    </style>
</head>
<body>

    <div class="header-section">
        <div>
            <h1>Data Mahasiswa</h1>
            <span class="identity-tag">Saint Khafid Islami | A12.2024.07166</span>
        </div>
        <a href="tambahDataMhs.php" class="btn-add">+ Tambah Data</a>
    </div>

    <div class="table-wrapper">
        <?php
        include 'koneksi.php';

        // Pastikan nama tabel sesuai instruksi ('mhs' atau 'table_mhs')
        $sql = "SELECT * FROM table_mhs ORDER BY id DESC"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NIM</th>";
            echo "<th>Nama Lengkap</th>";
            echo "<th>L/P</th>";
            echo "<th>Umur</th>";
            echo "<th>Saudara</th>";
            echo "<th>Tempat, Tgl Lahir</th>";
            echo "<th>Alamat & Kota</th>";
            echo "<th>Kontak</th>"; // Gabungan Email & HP biar rapi
            echo "<th>Status</th>";
            echo "<th>Hobi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td style='font-weight:500; color:#4f46e5'>" . $row["nim"] . "</td>";
                echo "<td style='font-weight:600'>" . $row["nama"] . "</td>";
                echo "<td>" . ($row["jenisKelamin"] == 'Laki - Laki' ? 'L' : 'P') . "</td>";
                echo "<td>" . $row["umur"] . "</td>";
                echo "<td>" . ($row["jmlSaudara"] ?? '-') . "</td>";
                echo "<td>" . $row["tempatLahir"] . ", " . $row["tanggaLahir"] . "</td>";
                echo "<td>" . $row["alamat"] . ", " . $row["kota"] . "</td>";
                echo "<td>" . $row["noHP"] . "<br><span style='font-size:11px; color:#64748b'>" . $row["email"] . "</span></td>";
                echo "<td><span style='background:#f1f5f9; padding:2px 8px; border-radius:10px; font-size:11px'>" . $row["status"] . "</span></td>";
                echo "<td style='max-width: 200px; overflow:hidden; text-overflow:ellipsis;'>" . $row["hobi"] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='no-data'>Belum ada data tersedia.</div>";
        }
        $conn->close();
        ?>
    </div>

</body>
</html>