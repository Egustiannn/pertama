<!-- public : bisa dipanggil melalui class
protected :melalui class cuman lebih khusus
private: hanya dalam class itu sendiri-->


<?php
class Mobil{
    public $nama = "mr gio"; //  property a.k.a variable 

    public $umur;

    public function jalan1(){ //methods a.k.a function 
        echo "Jln ke depan";
    }   
    public function jalan2(){
        echo "Jln ke blkng";
    }
    public function tampil($luar){
        $this->umur = $luar;
        // this = kunci memeanggil property
        echo "Nama = ".$this->nama; // this = mengakses properti di dalam class
        echo "<br>";
        echo "Umur = ".$this->umur; 
        
    }
}

// instance (jembatan antara class dengan dunia luar)
$move = new Mobil;
$move->jalan1();
echo "<br>";
$move->jalan2();
echo "<br>";
$move->tampil(39);
?>