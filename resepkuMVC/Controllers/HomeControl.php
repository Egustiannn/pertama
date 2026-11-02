<?php
require_once __DIR__ . '/../Models/HomeModel.php';

class HomeControl {
    public function index() {
        $homeModel = new HomeModel();
        $dataResep = $homeModel->getAllResep();

        // Panggil View untuk menampilkan data
        require_once __DIR__ . '/../Views/HomeView.php';
    }
}
?>