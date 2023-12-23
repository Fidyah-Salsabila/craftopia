<?php 

    require './function/function.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = query("SELECT * FROM craft WHERE id = '$id'")[0];
        $image_data = query("SELECT image, craft_id FROM tools JOIN craft ON craft.id = tools.craft_id WHERE craft.id = '$id'");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/detail.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h1>C<span style="color: var(--primary);" >r</span>a<span style="color: var(--primary);" >f</span>topia.id</h1>
        </div>
        <ul>
            <li><a href="./index.php">Beranda</a></li>
            <li><a href="./katalog.php">Katalog</a></li>
            <li><a href="./kontak.php">Kontak Kami</a></li>
        </ul>
        <div class="contact">
            <i class="bi bi-tiktok"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-instagram"></i>
        </div>
    </nav>
    <div class="iframe">
        <?= $data['video'] ?>
    </div>
    <div class="container">
        <div class="gambar">
        <?php foreach($image_data as $d) :?>
            <img src="./image/<?= $d['image'] ?>" alt="">
        <?php  endforeach;?>
        </div>
        <div class="judul">
            <h3><?= $data['title'] ?></h3>
            <p><?= $data['description'] ?></p>
            <h3>LANGKAH-LANGKAH</h3>
            <p><?= $data['steps'] ?></p>
        </div>
    </div>
</body>
</html>