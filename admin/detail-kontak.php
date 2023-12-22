<?php 

    require '../function/function.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = query("SELECT * FROM contact WHERE id = '$id'")[0];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin/form.css">
</head>
<body>

    <nav>
        <div class="logo">
            <h1>C<span style="color: var(--primary);" >r</span>a<span style="color: var(--primary);" >f</span>topia.id</h1>
        </div>
        <ul>
            <li><a href="">Kerajinan Tangan</a></li>
            <li><a href="">Kontak</a></li>
        </ul>
        <a href="./login.php?logout=1" class="logout-btn" >
            Keluar
        </a>
    </nav>

    <div class="container">

        <div class="header">
            <p>Detail Kontak</p>
            <a href="./kontak.php">
                Kembali
            </a>
        </div>

        <div class="wrapper">
            <form action="">
                <label for="">
                    <span>Nama </span>
                    <input readonly value="<?= $data['name'] ?>" type="text" name="" id="">
                </label>
                <label for="">
                    <span>Email </span>
                    <input readonly value="<?= $data['email'] ?>" type="text" name="" id="">
                </label>
                <label for="">
                    <span>desckripsi </span>
                    <textarea readonly name="" id="" cols="30" rows="10"><?= $data['description'] ?></textarea>
                </label>

            </form>
        </div>

    </div>
    
</body>
</html>