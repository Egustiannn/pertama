<?php
class bmicalculator {
    public $berat;
    public $tinggi;

    public function __construct($b, $t) {
        $this->berat = $b;
        $this->tinggi = $t;
    }

    public function hitung() {
        $tinggibadan = $this->tinggi / 100; 
        return $this->berat / ($tinggibadan * $tinggibadan);
    }

    public function ambilStatus() {
        $bmi = $this->hitung();
        if ($bmi < 18.5) { return "Kurus"; }
        if ($bmi <= 24.9) { return "Ideal"; }
        if ($bmi <= 29.9) { return "Gendut"; }
        return "Obesitas";
    }
}
?>

<html>
<head>
    <title>Menghitung BMI</title>
</head>
<body>

    <h2>Kalkulator BMI</h2>
    
    <form action="" method="get"> 
        <label>Berat Badan :</label>
        <br>
        <input type="number" name="berat" required>
        <br>

        <label>Tinggi :</label>
        <br>
        <input type="number" name="tinggi" required>
        <br>
    
        <input type="submit" name="dor" value="Hasil"> 
        <input type="reset" value="Reset" onclick="window.location.href=window.location.pathname;">
    </form> 

    <?php 
    $b = $_GET['berat'] ?? 0;
    $t = $_GET['tinggi'] ?? 0;

    if ($b > 0 && $t > 0) {
        $kalkulator = new bmicalculator($b, $t);
        
        echo "<hr>";
        echo "Nilai BMI: " . number_format($kalkulator->hitung(), 1) . "<br>";
        echo "Status: " . $kalkulator->ambilStatus();
    }
    ?>

</body>
</html>
