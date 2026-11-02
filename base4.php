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
<?php
if(isset($_GET["nama"])){
    echo $_GET["nama"];
}else{
    echo "Nama belum diatur";
}

echo "<br>";

if (isset($_GET["umur"])){
    if($_GET["umur"] >= 17){
        if($_GET["umur"] <= 100){
            echo "Anjay dapat ktp";
        }else{
        echo "Umur lu ga bisa dapet ktp";
    }
        }else{
            echo "Umur lu ga cukup buat bikin ktp";
        }
        }else{
        echo "Umur belum diatur";
}

?>

</body>
</html>

