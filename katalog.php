<?php

    require './function/function.php';

    if(isset($_GET['difficulty'])){

        $dif = $_GET['difficulty'];
        $data = query("SELECT * FROM craft WHERE difficulty = '$dif'");

    } else {
        $data = query("SELECT * FROM craft");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/katalog.css">
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

    <div class="header">
        <h2>Kerajinan Tangan</h2>
        <ul class="category" >
            <li><a class="selected" href="./katalog.php">Semua</a></li>
            <li><a href="./katalog.php?difficulty=3">Sulit</a></li>
            <li><a href="./katalog.php?difficulty=2">Sedang</a></li>
            <li><a href="./katalog.php?difficulty=1">Mudah</a></li>
        </ul>
    </div>

    <div class="catalog">
        <?php foreach($data as $d) :?>
            <div class="card">
                <img src="./image/<?= $d['thumbnail'] ?>" alt="">
                <div class="card-body">
                    <span class="category-pill" >
                        <?= $d['difficulty'] ?? '' ?>
                    </span>
                    <h5><?= $d['title' ?? ''] ?></h5>
                    <p><?= $d['description'] ?? '' ?></p>
                    <a href="./detail.php?id=<?= $d['id'] ?>">Selengkapnya</a>
                    <div class="divide" >
                        <span><?= $d['source'] ?></span>
                        <span><?= $d['estimate'] ?></span>
                    </div>
                </div>
            </div>
        <?php  endforeach;?>
    </div>
    
</body>
</html>