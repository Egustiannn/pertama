<?php // egrupoffangsion

function  salam ($jenis){ //cek data apakah data ud disave apa blm
    if(isset($_GET[$jenis])){
        return $_GET[$jenis];
    }else{
        return 0;
    }
}

function cal($symbol,$a,$b){
    if($symbol == "Tambah"){
        return $a+$b;

        }else if ($symbol == "Kurang"){
        return $a-$b;

        }else if ($symbol == "Kali"){
        return $a*$b;
        
        }else if ($symbol == "Modulus"){
        return $a%$b;

        }else if ($symbol == "Bagi"){
            if ($b !=0){
                return $a/$b;
            }else{
                return "Angka tidak bisa dibagi 0";
            }
    }


}

?>
<html>
<head>
    <title>Document</title>
</head>
        <body>
    <form action="" method="get">
        <label>Masukan Angka Pertama : </label>
        <input type="number" name="angka1">

        <label>Masukan Angka Kedua : </label>
        <input type="number" name="angka2">
        <br>
        <input type="submit" name="dor" value="Tambah">
        <input type="submit" name="dor" value="Kurang">
        <input type="submit" name="dor" value="Kali">
        <input type="submit" name="dor" value="Modulus">
        <input type="submit" name="dor" value="Bagi">

        <hr>
    </form>

 <?php // just output 
    echo " Angka Pertama : ".salam("angka1");
    echo "<br>";
    echo " Angka Kedua : ".salam("angka2");
    ?>
    <hr>
    <h1>Hasil :</h1>
    <?php
    echo cal(
        salam("dor"),
        salam("angka1"),
        salam("angka2"),

    )
    ?>
</body>
</html>