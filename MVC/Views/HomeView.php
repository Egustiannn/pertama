<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>
<body>
    <h1>Belajar MVC Sederhana</h1>

    <form action="" method="get">
        <label for="bahan">Tambah Bahan</label>
        <input type="text" name="bahan">
        <br>
        <input type="submit" name="dor" value="submit">
    </form>


    <table border="1">
        <tr>
            <th>No.</th>
            <th>Data</th>
            <th colspan="2">Aksi</th>
        </tr>
    <?php

    $nomor = 1;

    foreach($data as $isi){
        ?>
        <tr>
            <td><?= $nomor?></td>
            <td><?= $isi['nama']?></td>
            <td>
                <form action="" method="get" name="form">
                    <a href="EditViews.php?id=<?= $isi['id_bahan'] ?>&dor=update"><button type="button">Edit</button></a>
                    <button type="submit" name="dor" value="hapus">Hapus</button>
                    <input type="hidden" name="id" value="<?= $isi['id_bahan'] ?>">
                </form>
            </td>
        </tr>
        <?php
        $nomor++;
    }

    ?>
</body>
</html>