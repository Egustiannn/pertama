<?php
include 'resepku/process.php';

function lesgo($namafile){
    $x = fopen($namafile, "r");
    if ($x) {
        while(($data = fgets($x)) !== false) {
            $data = trim($data);
            if($data !== ''){
                $query = "INSERT INTO bahan VALUES (NULL, '$data')";
                mysqli_query(connect(), $query);
            }
        }
        fclose($x);
    }
}

if(cek_data_get("dor") == "Kirim"){
    lesgo("bumbu.md");
}
?>
<html>
    <head>
        <title>Kirim Data</title>
    </head>
    <body>
        <form action="" method="get">
            <input type="submit" name="dor" value="Kirim">
        </form>
    </body>
</html>