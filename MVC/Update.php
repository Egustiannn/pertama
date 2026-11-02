<?php
    require_once 'Controllers/HomeControl.php';

    // instansi /jembatan 
    $controls = new homeController;
    $model = new homeModel;

    // panggil bahan sesuai id
    $data_nama_bahan = $model->showdata($controls->cek_data_get("id"));

    $controls->update($controls->cek_data_get("id"),$controls->cek_data_get("bahan"));
    
    ?>
<form action="" method="get">
    <input type="hidden" name="id" value="<?= $controls->cek_data_get("id") ?>">
    <label for=""> Nama Bahan </label>
    <?php
    foreach($data_nama_bahan as $nama){
      ?>
    <input type="text" name="bahan" placeholder="<?= $nama["nama"] ?>"> 
    <?php 
    }
    ?>
    <br>
    <input type="submit" name="dor" value="Update">
</form>