<?php
$status = $_GET['status'] ?? '';
if($status == "salah"){
   echo "<script> alert('USER ATAU PASS SALAH!!!') </script>";
}elseif($status == "no_akun"){
   echo "<script> alert('BIKIN AKUN DULU!!!') </script>";
}elseif($status == "kelar"){
   echo "<script> alert('SEE U AGAIN') </script>";
}elseif($status == "ditambah"){
   echo "<script> alert('Akun telah ditambah!') </script>";
}
?>
<html>
<head>
   <title>Login - Resepkku</title>
</head>
<body>
   <h1>Login</h1>
   <form action="index.php?action=process_login" method="post">
       <label>username</label>
       <input type="text" name="username">
       <br>
       <label>password</label>
       <input type="password" name="password">
       <br>
       <input type="submit" name="dor" value="log in">
   </form>
   <br>
   <a href="index.php?action=signup">Belum punya akun? Daftar</a>
</body>
</html>