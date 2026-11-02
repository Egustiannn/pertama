<?php
require_once 'Models/HomeModel.php';
class homeController {
    public function cek_data_get($jenis){ //cek data apakah data sudah di set atau belum
        if (isset($_GET[$jenis])){
            return $_GET[$jenis];
        }else{
            return 0;
        }
    }

    public function index(){
        //instansiasi atau jembatan ke home model
        $model = new homeModel;
        $data = $model->getData();
        
        if ($this->cek_data_get("dor")=="Tambah"){
        $model->addData($this->cek_data_get("tambah_bahan"));
      ?>
      <script>
      alert("Data Telah Dtambahkan");
      window.location.href = "index.php";
      </script>
      <?php
        }
        elseif ($this->cek_data_get("id") != 0) {
            $id = $this->cek_data_get("id");
            $model->deletedata($id);
            ?>
            <script>
            alert("Data Telah Dihapus!");
            window.location.href ="index.php";
            </script>
            <?php
        }
        //tambahkan ke view
        require 'Views/HomeView.php';
    }  

    public function update($id, $nama_baru){
        $model = new homeModel;
        $data = $model->getData();
        if ($this->cek_data_get("dor")=="Update"){
        $model->updateData($id, $nama_baru);
        ?>
            <script>
            alert("Data Telah Diupdate!");
            window.location.href ="index.php";
            </script>
            <?php
        }


        }
    }

?>