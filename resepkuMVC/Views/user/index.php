<?php
session_start();
// Check if the session variable 'sesi' is set
if (!isset($_SESSION['sesi'])) {
    header("Location: ../login.php?stat=no_akun");
    exit(); // Always good practice to call exit after a redirect
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cihuyy berhasil login</h1>
    <?php
    echo "HALOO " . $_SESSION['sesi'];
    ?>
    <form action="../logout.php" method="post">
        <input type="submit" value="Log Out!">
    </form>
</body>
</html>