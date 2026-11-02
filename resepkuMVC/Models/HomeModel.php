<?php
require_once __DIR__ . '/UserModel.php';

class HomeModel extends UserModel {
    // Fungsi untuk mengambil semua data resep dari database
    public function getAllResep() {
        $conn = $this->connect();
        $query = "SELECT * FROM resep"; // Sesuaikan 'resep' dengan nama tabel resep di database kamu
        $result = mysqli_query($conn, $query);
        return $result;
    }
}
?>