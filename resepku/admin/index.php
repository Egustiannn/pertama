<?php
session_start();
// Check if the session variable 'sesi' is set
if (!isset($_SESSION['sesi'])) {
    header("Location: ../login.php?stat=no_akun");
    exit(); // Always good practice to call exit after a redirect
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <style>
        /* --- Reset & Dasar --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 40px 20px;
            line-height: 1.6;
        }

        /* --- Header Utama --- */
        .main-header {
            text-align: center;
            margin-bottom: 40px;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* --- Layout Grid (Responsif) --- */
        .admin-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* 2 Kolom sama besar */
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* --- Styling Umum Kolom --- */
        .admin-column {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            /* --- ANIMASI AWAL: Transisi untuk efek hover --- */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        /* --- ANIMASI UTAMA: Efek saat kursor masuk (hover) --- */
        .admin-column:hover {
            transform: translateY(-5px); /* Kotak naik sedikit */
            box-shadow: 0 10px 25px rgba(0,0,0,0.15); /* Bayangan lebih tebal */
            border-color: #3498db; /* Sedikit aksen warna */
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        /* --- Styling Form --- */
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #555;
            font-size: 0.95em;
        }

        input[type="text"], 
        textarea, 
        select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            /* Transisi untuk fokus */
            transition: border-color 0.3s ease;
        }

        /* Efek saat input diklik */
        input[type="text"]:focus, 
        textarea:focus, 
        select:focus {
            outline: none;
            border-color: #3498db;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        /* Grup untuk select resep agar sejajar */
        .resep-group {
            display: flex;
            gap: 10px;
        }
        .resep-group > div {
            flex: 1;
        }

        /* --- Styling Tombol --- */
        .btn-submit {
            width: 100%;
            margin-top: 25px;
            background-color: #27ae60; /* Hijau profesional */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            /* Animasi warna tombol */
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: #219150;
        }
        
        /* Efek klik tombol */
        .btn-submit:active {
            transform: scale(0.98);
        }

        /* --- Area Hasil PHP --- */
        .result-box {
            margin-top: 25px;
            padding: 20px;
            background-color: #e8f5e9;
            border-left: 5px solid #27ae60;
            border-radius: 8px;
            color: #1e4620;
            word-wrap: break-word;
        }

        .result-box strong {
            display: block;
            margin-bottom: 5px;
            color: #27ae60;
        }

        /* --- Responsif Mobile --- */
        @media (max-width: 768px) {
            .admin-container {
                grid-template-columns: 1fr; /* Ubah jadi 1 kolom */
            }
            .resep-group {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>

    <header class="main-header">
        <h1>RESEPKU</h1>
    </header>
    
    <div class="admin-container">
        <!-- Kolom Kiri: Pengaturan User -->
        <section class="admin-column">
            <h2><i class="fas fa-users"></i> Pengaturan User</h2>
            <form action="" method="post">
                <label>Nama User</label>
                <input type="text" name="nama_user" placeholder="Cth: Budi Santoso" required>
                
                <label>Email User</label>
                <input type="text" name="email_user" placeholder="Cth: budi@mail.com" required>
                
                <label>Role</label>
                <select name="role">
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                </select>
                
                <button type="submit" name="submit_user" class="btn-submit">Simpan User</button>
            </form>
            
            <?php
            if (isset($_POST['submit_user'])) {
                echo "<div class='result-box'>";
                echo "<strong><i class='fas fa-check-circle'></i> Data User Disimpan:</strong>";
                echo "Nama: " . htmlspecialchars($_POST['nama_user']) . "<br>";
                echo "Email: " . htmlspecialchars($_POST['email_user']) . "<br>";
                echo "Role: " . htmlspecialchars($_POST['role']) . "<br>";
                echo "</div>";
            }
            ?>
        </section>

        <!-- Kolom Kanan: Pengaturan Resep -->
        <section class="admin-column">
            <h2><i class="fas fa-utensils"></i> Masukan Resep</h2>
            <form action="" method="post">
                <label>Nama Resep</label>
                <input type="text" name="Judul" placeholder="Cth: Rendang Padang" required>
                
                <label>Langkah Langkah</label>
                <textarea name="Langkah" placeholder="Tuliskan cara memasak..."></textarea>
                
                <label>Pembuat</label>
                <input type="text" name="Author" placeholder="Nama Chef" required>
                
                <label>Komposisi Resep</label>
                <div class="resep-group">
                    <div>
                        <label>Sayur</label>
                        <select name="sayur">
                            <option value="Bayam">Bayam</option>
                            <option value="Wortel">Wortel</option>
                            <option value="Buncis">Buncis</option>
                        </select>
                    </div>
                    <div>
                        <label>Buah</label>
                        <select name="buah">
                            <option value="Pisang">Pisang</option>
                            <option value="Apel">Apel</option>
                            <option value="Semangka">Semangka</option>
                        </select>
                    </div>
                    <div>
                        <label>Bumbu</label>
                        <select name="bumbu">
                            <option value="MSG">MSG</option>
                            <option value="Jahe">Jahe</option>
                            <option value="Baput">Baput</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="submit_resep" class="btn-submit">Buat Resep</button>
            </form>

            <?php
            if (isset($_POST['submit_resep'])) {
                echo "<div class='result-box'>";
                echo "<strong><i class='fas fa-check-circle'></i> Resep Berhasil Dibuat:</strong>";
                
                // Simulasi fungsi cek_data_post jika process.php tidak ada
                function _p($val) { return htmlspecialchars($_POST[$val]); }

                if (file_exists('../process.php')) {
                    include '../process.php';
                    $bahan = cek_data_post("sayur")." ".cek_data_post("buah")." ".cek_data_post("bumbu");
                    echo "Judul = ". cek_data_post("Judul")."<br>";
                    echo "Langkah = ". cek_data_post("Langkah")."<br>";
                    echo "Pembuat = ". cek_data_post("Author")."<br>";
                    echo "Bahan = ". $bahan."<br>";
                } else {
                    $bahan = _p("sayur")." ". _p("buah")." ". _p("bumbu");
                    echo "Judul = ". _p("Judul")."<br>";
                    echo "Langkah = ". _p("Langkah")."<br>";
                    echo "Pembuat = ". _p("Author")."<br>";
                    echo "Bahan = ". $bahan."<br>";
                }
                echo "</div>";
            }
            ?>
        </section>
    </div>

</body>
</html>