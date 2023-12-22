<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/kontak.css">
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
    <div class="box">
        <h2>Kontak Kami</h2>
        <p>Kami sangat menghargai masukan dan pendapat Anda. Jika Anda memiliki saran atau sanggahan terkait website kami, silakan beri tahu kami.</p>
        <form action="./function/add_contact.php" method="post" >
            <label for="nama">Nama Pertama</label>
            <input type="text" name="name" id="nama" placeholder="Your First Name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="you@example.com" required>
            <label for="deskripsi">Apa yang dapat Kami bantu?</label>
            <input type="" id="deskripsi" name="description" placeholder="Description" required >
            <button>Kirim</button>
        </form>
    </div>
    <footer>
        <p class="footer">&copy;  2022 Craftopia.id</p>
        <div class="contact">
            <i class="bi bi-tiktok"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-instagram"></i>
        </div>
    </footer>
</body>
</html>