<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');

        :root {
            --primary: #4f46e5; /* Modern Indigo */
            --primary-hover: #4338ca;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #334155;
            --text-light: #64748b;
            --border: #e2e8f0;
            --radius: 8px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        /* Identitas Diri (Sesuai Instruksi) */
        .identity-badge {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: var(--text-light);
            background: #e0e7ff;
            color: #3730a3;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
        }

        .container {
            background: var(--card);
            padding: 40px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 600px;
            border: 1px solid var(--border);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-weight: 700;
            color: #1e293b;
            font-size: 24px;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: 500;
            font-size: 14px;
            color: #1e293b;
            margin-bottom: 6px;
            display: block;
        }

        input[type=text], input[type=number], input[type=date], input[type=email], input[type=password], textarea, select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.2s;
            background: #fff;
            color: #334155;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        textarea { resize: vertical; min-height: 100px; }

        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
            background: #f1f5f9;
            border-radius: var(--radius);
        }

        .radio-group label, .checkbox-group label {
            display: flex;
            align-items: center;
            font-weight: 400;
            cursor: pointer;
            margin: 0;
            font-size: 13px;
        }

        input[type=radio], input[type=checkbox] {
            margin-right: 8px;
            accent-color: var(--primary);
            width: 16px;
            height: 16px;
        }

        input[type=submit] {
            background: var(--primary);
            color: white;
            padding: 14px;
            border: none;
            border-radius: var(--radius);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }

        input[type=submit]:hover {
            background: var(--primary-hover);
        }

        @media (max-width: 600px) {
            .container { padding: 25px; }
        }
    </style>
</head>
<body>
    
    <div class="identity-badge">
        Nama: Saint Khafid Islami | NIM: A11.202X.XXXXX
    </div>

    <div class="container">
        <h2>Input Data Mahasiswa</h2>
        <p class="subtitle">Silakan lengkapi formulir di bawah ini dengan data yang valid.</p>

        <form action="simpanDataMhs.php" method="POST">
            
            <div>
                <label>NIM</label>
                <input type="text" name="nim" maxlength="14" placeholder="Contoh: A11.2023.12345" onblur="cekNim()" required>
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama sesuai KTM" onblur="cekNama()" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Umur</label>
                    <input type="number" id="umur" name="umur" placeholder="20" onblur="cekUmur()" required>
                </div>
                <div>
                    <label>Jumlah Saudara</label>
                    <input type="number" name="jmlSaudara" placeholder="0" required>
                </div>
            </div>

            <div>
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" placeholder="Kota Kelahiran" onblur="cekTempatLahir()" required>
            </div>

            <div>
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" onblur="cekTanggalLahir()" required>
            </div>

            <div>
                <label>No HP</label>
                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx" onblur="cekNoHp()" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="nama@email.com" onblur="cekEmail()">
            </div>

            <div>
                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="3" placeholder="Jalan, RT/RW, Kelurahan..." required></textarea>
            </div>

            <div>
                <label>Kota</label>
                <select name="kota" required>
                    <option value="">-- Pilih Kota --</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                    </select>
            </div>

            <div>
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label><input type="radio" name="jk" value="Laki - Laki" required> Laki - Laki</label>
                    <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
                </div>
            </div>

            <div>
                <label>Status Keluarga</label>
                <div class="radio-group">
                    <label><input type="radio" name="status" value="Kawin" required> Kawin</label>
                    <label><input type="radio" name="status" value="Belum Kawin"> Belum Kawin</label>
                </div>
            </div>

            <div>
                <label>Hobi</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
                    <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
                    <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
                    <label><input type="checkbox" name="hobi[]" value="Coding"> Coding</label>
                    <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
                    <label><input type="checkbox" name="hobi[]" value="Game"> Game</label>
                </div>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Buat kata sandi..." required>
            </div>

            <input type="submit" value="Simpan Data">
        </form>
    </div>

    <script>
        function cekNama() {
            var nama = document.getElementById("nama").value;
            if (nama !== "" && !/^[a-zA-Z\s]+$/.test(nama)) {
                alert("Nama hanya boleh huruf!");
                document.getElementById("nama").value = ""; 
            }
        }

        function cekUmur() {
            var umur = document.getElementById("umur").value;
            if (umur !== "") {
                confirm("Apakah umur anda benar " + umur + " tahun?");
            }
        }

        function cekNim() {
            var nim = document.getElementById("nim").value;
            if (nim !== "") {
                var regex = /^[0-9]+$/;
                if (!regex.test(nim) || nim.length !== 12) {
                    alert("NIM harus berupa angka dan panjang 12 digit!");
                    document.getElementById("nim").value = "";
                } else {
                    confirm("Apakah NIM '" + nim + "' sudah benar?");
                }
            }
        }

        function cekTempatLahir() {
            var tempatLahir = document.getElementById("tempat_lahir").value;
            if (tempatLahir !== "") {
                var regex = /^[a-zA-Z\s]+$/;
                if (!regex.test(tempatLahir)) {
                    alert("Tempat Lahir hanya boleh huruf!");
                    document.getElementById("tempat_lahir").value = "";
                } else {
                    confirm("Apakah tempat lahir '" + tempatLahir + "' sudah benar?");
                }
            }
        }

        function cekTanggalLahir() {
            var tanggalLahir = document.getElementById("tanggal_lahir").value;
            if (tanggalLahir !== "") {
                var today = new Date();
                var birthDate = new Date(tanggalLahir);
                if (birthDate > today) {
                    alert("Tanggal Lahir tidak boleh di masa depan!");
                    document.getElementById("tanggal_lahir").value = "";
                } else {
                    confirm("Apakah tanggal lahir '" + tanggalLahir + "' sudah benar?");
                }
            }
        }

        function cekNoHp() {
            var noHp = document.getElementById("no_hp").value;
            if (noHp !== "") {
                var regex = /^08[0-9]+$/;
                if (!regex.test(noHp) || noHp.length < 10 || noHp.length > 13) {
                    alert("No HP harus dimulai dengan 08 dan berupa angka dengan panjang 10-13 digit!");
                } else {
                    confirm("Apakah no HP '" + noHp + "' sudah benar?");
                }
            }
        }

        function cekEmail() {
            var email = document.querySelector("input[name='email']").value;
            if (email !== "") {
                var regex = /^[^\s@]+@[^\s@]+\.com$/;
                if (!regex.test(email)) {
                    alert("Email tidak valid! Email harus berakhiran .com (contoh: nama@domain.com)");
                    document.querySelector("input[name='email']").value = "";
                } else {
                    confirm("Apakah email '" + email + "' sudah benar?");
                }
            }
        }
    </script>

</body>
</html>