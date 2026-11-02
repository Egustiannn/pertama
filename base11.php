<?php
class Calculate{
    public $angka1;
    public $angka2;
    public $hasil;
    
    public function tambah($x, $y){
    $this->angka1 = $x;
    $this->angka2 = $y;
    $this->hasil = $x + $y;
    return $this->hasil;        
    }
    function cek_data_get($jenis){ 
        if (isset($_GET[$jenis])){
            return $_GET[$jenis];
        }else{
            return 0;
        }
    }
}

$cal = new Calculate;
$ready = 0;
if ($cal->cek_data_get("dor") == "Hitung"){
    $ready = $cal->tambah(
        $cal->cek_data_get("pertama"),
        $cal->cek_data_get("kedua"),
        $cal->cek_data_get("dor")

    );
}    
    
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label>Angka 1</label>
        <input type="number" name="pertama">
        <br>
        <label>Angka 2</label>
        <input type="number" name="kedua">
        <br>
        <input type="submit" name="dor" value="Hitung">

    </form>
    <h2>Hasil = <?= $ready; ?>></h2>

</body>
</html> 