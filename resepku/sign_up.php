<?php
include 'process.php';
?>

<html>
<head>
    <title>Resepku</title>
    <style>
        .form{
            width: 300px;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-group {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="form">
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="user" required>
            </div>
            
            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <input type="submit" name="dor" value="Daftar">
        </div>
    </form>
</body>
</html>