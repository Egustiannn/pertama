<?php
function tampil($nama, $angka){
    
    echo "HUT $nama KE $angka";
    return $angka;
}

function kabisat($tahun){
    if($tahun % 4 == 0){
        echo " Kabisat";
    }else{
        echo " bukan tahun kabisat";
    }
}

kabisat(tampil("Indo", 220));
?>

