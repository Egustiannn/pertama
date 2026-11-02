<html>
<head>
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
    <!-- GET = oper data (URL - keliatan) -->

     <label>Angka </label>
     <!-- label = nama untuk input -->

        <input type="number" name="angka_1">
        <!-- type = "number" buat angka -->
        <!-- name = "angka_1" buat namain si input
         biar bisa dipanggil -->

        <input type="submit" value="kirim">
        <!-- type = "submit" buat munculin tombol 
         kirim pada form -->

    </form>    

<?php
    echo $_GET["angka_1"];
    // $_GET = panggil data dari form jenis GET
?>

</body>
</html>



