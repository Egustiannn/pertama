<?php include '../process.php'; ?>
<head>
    <style>
        body{
            display: flex;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .searching, .resep{
            width: 50%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .isi{
            border-radius: 20px;
            padding: 15px;
            background-color: beige;
            min-height: 100px;
            margin-bottom: 15px;
        }
        .badge-bahan {
            display: inline-block;
            background: #fff;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .badge-bahan button {
            background: red;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 2px 6px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
<div class="searching">
    <h1>Searching Data</h1>
    <form action="" method="get">
        <input type="text" name="cari" placeholder="Cari bahan...">
        <input type="submit" value="Cari">
    </form>
    <table border="1" cellpadding="10" style="margin-top: 15px; width: 100%;">
    <?php
    $x = cek_data_get("cari");
    if (!empty($x)) {$query = "SELECT * FROM bahan WHERE nama LIKE '%$x%' ";
        $data = mysqli_query(connect(),$query);
        if($data) {
            foreach($data as$fill){
                ?>
                <tr>
                    <td><h4><?= $fill["nama"]; ?></h4></td>
                    <td>
                        <button type="button" onclick="tambahBahan('<?= $isi['nama']; ?>')">Tambah</button>
                    </td>
                </tr>
                <?php
            }
        }
    }
    ?>
    </table>
</div>

<div class="resep">
    <h1>Resepku</h1>
    <hr>
    <h3>Bahan-bahan terpilih:</h3>
    <div class="isi" id="container-bahan">
        <i style="color: #777;">Belum ada bahan dipilih...</i>
    </div>

    <div class="instruction">
        <form action="../process.php" method="POST" onsubmit="siapkanData()">
            <input type="hidden" name="semua_bahan" id="input_semua_bahan">
           <label>Nama Masakan</label>
           <input type="text" name="judul"><br>
           <label>Pembuat Resep</label>
           <input type="text" name="pembuat"><br>
            <label>Langkah-langkah:</label><br>
            <textarea name="    " rows="15" cols="50" placeholder="Tulis langkah pembuatan di sini..."></textarea>
            <br><br>
            <input type="submit" name="dor" value="Selesai">
        </form>
    </div>
</div>

<script>
    function tambahBahan(namaBahan) {
        localStorage.setItem(namaBahan, namaBahan);
        renderResep();
    }
    function hapusBahan(key) {
        localStorage.removeItem(key);
        renderResep();
    }
    function renderResep() {
        const container = document.getElementById('container-bahan');
        container.innerHTML = '';
       
        if (localStorage.length === 0) {
            container.innerHTML = '<i style="color: #777;">Belum ada bahan dipilih...</i>';
            document.getElementById('input_semua_bahan').value = '';
            return;
        }

        let listBahanArray = [];

        for (let i = 0; i < localStorage.length; i++){
            const key = localStorage.key(i);
            const value = localStorage.getItem(key);
            listBahanArray.push(value);
            const badge = document.createElement('div');
            badge.className = 'badge-bahan';
            badge.innerHTML = `${value} <button type="button" onclick="hapusBahan('${key}')">x</button>`;
            container.appendChild(badge);
        }
        document.getElementById('input_semua_bahan').value = JSON.stringify(listBahanArray);
    }
    window.onload = function() {
        renderResep();
    };
    function siapkanData() {
    }
</script>
</body>
</html>