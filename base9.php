<?php
function kali($x,$y){
    return $x * $y;
}
 
function tampil($x,$y){
    echo "angka pertama = " . $x;
    echo "<br>";
    echo "angka kedua = " . $y;
    echo "<br>";
    echo "hasil = " . kali($x,$y);

}
tampil(2, 4);

?>  