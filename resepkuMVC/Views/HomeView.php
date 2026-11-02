<?php
// Pastikan sesi sudah aktif jika ingin menampilkan nama user yang login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
<head>
    <title>Beranda - Resepku</title>
</head>
<body>
    <h1>Selamat Datang di Resepku!</h1>
    <p>Ini adalah halaman utama (HomeView).</p>
    <a href="index.php?action=logout">Logout</a>

    <hr>
    
    <h2>Daftar Resep Pilihan:</h2>
    <ul>
        <?php 
        // Menampilkan data resep yang dikirim dari Controller
        if (isset($dataResep) && mysqli_num_rows($dataResep) > 0) {
            while ($row = mysqli_fetch_assoc($dataResep)) {
                echo "<li><strong>" . $row['nama_resep'] . "</strong> - " . $row['deskripsi'] . "</li>";
            }
        } else {
            echo "<li>Belum ada resep yang tersedia.</li>";
        }
        ?>
    </ul>
</body>
</html>