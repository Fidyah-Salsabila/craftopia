<?php

error_reporting(E_ERROR | E_PARSE);

session_start();

if($_GET['logout']){
    $_SESSION['isAdmin'] = false;
}

if(isset($_POST['submit'])){

    if($_POST['username'] == 'admin'){

        if($_POST['password'] == '151023'){
            
            
            $_SESSION['isAdmin'] = true;

            echo"
                <script>
                    alert('login berhasil')
                    window.location.href = './index.php'
                </script>
            ";


        } else {

            echo"
                <script>
                    alert('login gagal')
                    window.location.href = './index.php'
                </script>
            ";
        }


    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin/login.css">
</head>
<body>
    <div style="overflow: hidden;" class="container" >
        <img class="satu" src="../pictures/login1.svg" alt="">
        <h3>C<span style="color: var(--primary);">r</span>a<span style="color: var(--primary);">f</span>topia.<span style="color: var(--primary);">id</span></h3>
        <form action="" method="post" >
            <label for="username">Username</label>
            <input name="username" type="text" id="username" required>
            <label for="password">Kata Sandi</label>
            <input name="password" type="password" id="password" required>
            <button type="submit" name="submit" >Masuk</button>
        </form>
        <img class="dua" src="../pictures/login2.svg" alt="">
    </div>
</body>
</html>