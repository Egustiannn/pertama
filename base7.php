<?php // egrupoffangsion

function  salam ($jenis){ //cek data apakah data ud disave apa blm
    if(isset($_GET[$jenis])){
        return $_GET[$jenis];
    }else{
        return 0;
    }
}

?>
<html>
<head>
    <title>Document</title>
</head>
        <body>
    <form action="" method="get">
        <label>Masukan Nama</label>
        <input type="text" name="nama">

        <label>Masukan Umur</label>
        <input type="number" name="umur">

        <input type="submit" value="Submit">
    </form>

    <?php // just output 
    echo "Nama : ".salam("nama");
    echo " | Umur : ".salam("umur");
    ?>
    <hr>
    <h1>Status :</h1>
    <?php
    if (salam("umur") >= 17 && salam("umur") <= 100){
        echo "Anda bisa buat ktp😁😁";
    }else{
        echo "Anda tidak valid membuat ktp😞😞";
    }
    ?>
</body>
</html>