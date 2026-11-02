<?php
session_start();

function connect(){
    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "resepku",
        3306
    );

    if ($conn->connect_errno){
        echo "failed" . $conn->connect_error;
    }else{
        return $conn;
    }
}

function add_resep($judul, $pembuat, $langkah, $bahan, $alert, $location){
    $query = "INSERT INTO resep VALUES(
    NULL,
    '$judul',
    '$langkah'
    '$pembuat'
    '$bahan'
     )";
     ?>
    <script>
        alert("<?= $alert ?>");
        window.href.location = "<?= $location ?>";
    </script>
    <?php
    mysqli_query(connect(),$query);

}

function cek_data_post($jenis){
    if (isset($_POST[$jenis])){
        return $_POST[$jenis];
    }else{
        return 0;
    }
}

function cek_data_get($jenis){
    if (isset($_GET[$jenis])){
        return $_GET[$jenis];
    }else{
        return 0;
    }
}

function register($a, $b, $c, $alert, $location){
    $query = "INSERT INTO pengguna VALUES(
    NULL,'$a','$b','$a','$c',
    'rakyat')";
    ?>
    <script>
        alert("<?= $alert ?>");
        window.href.location = "<?= $location ?>";
    </script>
    <?php
    mysqli_query(connect(),$query);
}

function login($user, $pass){
    $query_user = "SELECT * FROM pengguna WHERE username = '$user'";
    $q_user = mysqli_query(connect(), $query_user);

    $query_pass = "SELECT * FROM pengguna WHERE password = '$pass'";
    $q_pass = mysqli_query(connect(), $query_pass);

    $identity = "SELECT id FROM pengguna WHERE username = '$user' AND password = '$pass'";
    $q_iden = mysqli_query(connect(), $identity);
   
   // logika apakah ada akunnya atau tidak
    if(mysqli_num_rows($q_user) < 1){
        header("Location:login.php?status=no_akun");
    }else{
        $smwa = "SELECT * FROM pengguna";
        $data = mysqli_query(connect(),$smwa);
        foreach ($data as $inside) {
            if ($inside["username"] == $user && $inside["password"] == $pass){
                if($inside["role"] == "rakyat"){
                    $_SESSION["sesi"] = $inside["id"];
                    header("Location:user/index.php?status=login");
                }else{
                    $_SESSION["sesi"] = $inside["id"];
                    header("Location:admin/index.php?status=login");
                }
            }else{
                header("Location:login.php?status=salah");
            }
        }
    }
}
    // echo "-------Database---------";
    // echo "<br>";
    // echo "username = ";
    // var_dump($q_user);
    // echo "<br>";
    // echo "pass = ";
    // var_dump($q_pass);

    // if ($user == $q_user && $pass == $q_pass){
    //     header("Location: user/index.php");
    // }else{
    //     header("Location: login.php?status=no_user");
    // }
    // jika input user sama dengan data user dan
    // input pass sama dengan input pass, maka
    // arahkan ke dalam user/index.php

if(cek_data_post("dor") == "Log In"){
    login(
        cek_data_post("username"),
        cek_data_post("password")
    );
} elseif (cek_data_post("dor") == "Daftar"){
    register(
        cek_data_post("user"),
        cek_data_post("email"),
        cek_data_post("user"),
        cek_data_post("pass"),
        "Akun telah ditambah!",
        "login.php"
    );
} elseif (cek_data_post("dor") == "Selesai"){
    add_resep(
        cek_data_post("judul"),
        cek_data_post("pembuat"),
        cek_data_post("resep"),
        cek_data_post("semua_bahan"),
        "Resep telah ditambah!",
        "search.php"
    );
}
?>