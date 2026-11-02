<?php

class homeModel{
    public function conn() {
        $server = "localhost";
        $user = "root";
        $pass = "root";
        $db = "resepku";

        try{
            $conn = mysqli_connect($server, $user, $pass, $db);
            return $conn;
        } catch (mysqli_sql_exception $e) {
            echo(error_log("Database erorr: " . $e->getMessage()));
            echo "<br>";
            die("Koneksi database gagal");
        }   
    }

    public function getData(){
        $conn = $this->conn();

        $query = "SELECT * FROM bahan";
        $data = mysqli_query($conn, $query);
        return $data;
    }

    public function addData($isi){
        $query = "INSERT INTO bahan (id_bahan, nama_bahan) VALUES(NULL, '$isi')";
        $datas = mysqli_query($this->conn(), $query);
    }

    public function editData($id, $gantiBahan){
        $query = "UPDATE bahan SET bahan = $gantiBahan where id_bahan = $id";
        $datas = mysqli_query($this->conn(), $query);
    }

    public function deleteData($id){
        $query = "DELETE FROM bahan where id_bahan = $id";
        $datas = mysqli_query($this->conn(), $query);
    }

    public function showData($id){
        $query = "SELECT * FROM bahan WHERE id_bahan = $id";
        $data = mysqli_query($this->conn(), $query);
        $result = mysqli_fetch_assoc($data);
        return $result;
    }
}

?>