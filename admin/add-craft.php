<?php 

    error_reporting(E_ERROR | E_PARSE);

    require '../function/function.php';

    session_start();

    if(!$_SESSION['isAdmin']){
        header('Location: ./login.php');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = query("SELECT * FROM craft WHERE id = '$id'")[0];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.tiny.cloud/1/mfwsl4xdczczqoigmfie0vd3tce8jna9eg7g5sq74qglzaz4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
            <p>Kerajinan Tangan</p>
            <a href="./index.php">
                Keluar
            </a>
        </div>

        <div class="wrapper">
            <form 
                <?php if(isset($_GET['id'])): ?>
                action="../function/update.php"
                <?php else : ?>
                action="../function/add_new_item.php"
                <?php endif; ?>
                method="post" 
                enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?= $data['id'] ?>" >
                <label for="">
                    <span>Thumbnail </span>
                    <input type="file" name="thumbnail" id="">
                </label>
                <label for="">
                    <span>Link Video </span>
                    <input type="text" value="<?= $data['video'] ?? '' ?>" name="video" id="">
                </label>
                <label for="">
                    <span>Alat & Bahan </span>
                    <input type="file" multiple name="tools[]" id="">
                </label>
                <label for="">
                    <span>Judul </span>
                    <input type="text" value="<?= $data['title'] ?? '' ?>" name="title" id="">
                </label>
                <label for="">
                    <span>Sumber </span>
                    <input  value="<?= $data['source'] ?? '' ?>" type="text" name="source" id="">
                </label>
                <label for="">
                    <span>Estimasi Pekerjaan </span>
                    <input type="text" value="<?= $data['estimate'] ?? '' ?>" name="estimate" id="">
                </label>
                <label for="">
                    <span>Kesulitan </span>
                    <select name="difficulty" id="">
                        <option value=""></option>
                        <option <?= (isset($data['estimate']) && $data['estimate']) == '3' ? 'selected' : ''  ?> value="3">Sulit</option>
                        <option <?= (isset($data['estimate']) && $data['estimate']) == '1' ? 'selected' : ''  ?> value="1">Mudah</option>
                        <option <?= (isset($data['estimate']) && $data['estimate']) == '2' ? 'selected' : ''  ?> value="2">Sedang</option>
                    </select>
                </label>
                <label for="">
                    <span>Deskripsi </span>
                    <textarea name="description" id="" cols="30" rows="10"><?= $data['description'] ?? '' ?></textarea>
                </label>
                <label for="">
                    <span>Langkah Langkah </span>
                    <textarea id="steps"  cols="30" rows="10"></textarea>
                </label>
                <input value="<?= $data['steps'] ?>" type="hidden" name="steps">

                <div class="submit-btn">
                    <button name="submit" type="submit" >
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>

    <script>
            tinymce.init({
                selector: 'textarea#steps',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent',
                init_instance_callback: function(editor) {
                    editor.on('keyup', function(e) {
                        document.querySelector('input[name=steps]').value = tinymce.activeEditor.getContent()
                        console.log(document.querySelector('input[name=steps]').value)
                    });
                }
            });
    </script>

</body>
</html>