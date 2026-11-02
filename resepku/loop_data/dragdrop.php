<?php include '../process.php'; ?> 
<html lang="en">
<head>
    <title>Drag And Drop Method</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Resepku</h1>
    </div>
    <div class="content">
        <div class="kiri">
            <h1>Buah, Bumbu, dan Sayur</h1>
<?php 
// $x = cek_data_get("cari");
// $query = "SELECT * FROM bahan WHERE nama LIKE '%$x%'";
$query = "SELECT * FROM bahan";
$data = mysqli_query(connect(), $query); 
foreach($data as $isi){
?> 
    <button>
        <?= $isi["nama"]; ?>
    </button>
    <?php
    }
    ?>
        </div>
        <div class="kanan"></div>
        
    </div>
</body>
</html>