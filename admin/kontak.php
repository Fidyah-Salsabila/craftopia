<?php

    require '../function/function.php';

    session_start();

    if(!$_SESSION['isAdmin']){
        header('Location: ./login.php');
    }

    if(isset($_GET['delete'])){
        deleteContact();
    }

    $data = query("SELECT * FROM contact");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h1>C<span style="color: var(--primary);" >r</span>a<span style="color: var(--primary);" >f</span>topia.id</h1>
        </div>
        <ul>
            <li><a href="./index.php">Kerajinan Tangan</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
        <a href="./login.php?logout=1" class="logout-btn" >
            Keluar
        </a>
    </nav>

    <div class="container">

        <div class="header">
            <p>Kontak</p>
        </div>

        <table cellpadding="0" cellspacing="0" >
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach($data as $i => $d): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $d['name'] ?></td>
                    <td><?= $d['email'] ?></td>
                    <td>
                        <a href="./detail-kontak.php?id=<?= $d['id'] ?>">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" href="./kontak.php?delete=<?= $d['id'] ?>">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</body>
</html>