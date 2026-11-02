<?php
include "process.php";

if(cek_data_get("status") == "salah"){
   echo "
   <script> alert('USER ATAU PASS SALAH!!!') </script>>
   ";
}elseif(cek_data_get("status") == "no_akun"){
   echo "
   <script> alert('BIKIN AKUN DULU!!!') </script>
   ";
}elseif(cek_data_get("status") == "kelar"){
   echo "
   <script> alert('SEE U AGAIN') </script>
   ";
}
?>
     <html>
     <head>
        <title>Login - Resepkku</title>
     </head>
     <body>
        <h1>Login</h1>
        <form action="" method="post">
            <label>username</label>
            <input type="text" name="username">
            <br>
            <label>password</label>
            <input type="password" name="password">
            <br>
            <input type="submit" name="dor" value="log in">
        </form>
        </body>
     </html>