<?php
// buat kalkulator luas
// 1. segitiga = 1/2*a*t
// 2. persegi panjang = p*l
// 3. lingkaran = pi*r*r
// 4. jajar genjang = a+t
// 5. trapesium = 1/2(a+b)*t

// $d = 1/2
// $a = alas
// $t = tinggi
// $p = panjang
// $l = lebar
?>



<?php // egrupoffangsion

function  salam ($jenis){ //cek data apakah data ud disave apa blm
    if(isset($_GET[$jenis])){
        return $_GET[$jenis];
    }else{
        return 0;
    }
}

function cal($symbol,$a,$t,$p,$l,$pi,$r,){
    if($symbol == "Segitiga"){
        return 2*$a*$t;

    }else if ($symbol == "Persegi Panjang"){
        return $p*$l;

    }else if ($symbol == "Lingkaran"){
        return $pi*$r*$r;

    }else if ($symbol == "Jajar Genjang"){
        return $a+$t;

    }
}


?>
<html>
<head>
    <title>Document</title>
</head>
        <body>
    <form action="" method="get">
        <label>Alas : </label>
        <input type="number" name="alas">

        <label>Tinggi : </label>
        <input type="number" name="tinggi">

        
        <br>
        
        <label>Panjang : </label>
        <input type="number" name="panjang">
        
        <label>Lebar : </label>
        <input type="number" name="lebar">
        
        <br>
        
        <label>Phi : </label>
        <input type="number" name="phi">
        
        <label>Jari-jari : </label>
        <input type="number" name="jari-jari1">
        
        <label>Jari-jari : </label>
        <input type="number" name="jari-jari2">
        
        <br>

        <label>Alas : </label>
        <input type="number" name="alas">

        <label>Tinggi : </label>
        <input type="number" name="tinggi">
        
        <br>
        


        <input type="submit" name="dor" value="Segitiga">
        <input type="submit" name="dor" value="Persegi Panjang">
        <input type="submit" name="dor" value="Lingkaran">
        <input type="submit" name="dor" value="Jajargenjang">
        

        <hr>
    </form>

 <?php // just output 
    echo " Alas : ".salam("alas");
    echo "<br>";
    echo " Tinggi : ".salam("tinggi");
    echo "<br>";
    echo " Jari-jari : ".salam("jari-jari");
    echo "<br>";
    echo " Panjang : ".salam("panjang");
    echo "<br>";
    echo " Lebar : ".salam("phi");
    echo "<br>";
    ?>
    
    <hr>
    <h1>Hasil :</h1>
    <?php
    echo cal(
        salam("dor"),
        salam("alas"),
        salam("tinggi"),
        salam("jari-jari"),
        salam("panjang"),
        salam("lebar"),
        salam("phi"),

    )
    ?>
</body>
</html>