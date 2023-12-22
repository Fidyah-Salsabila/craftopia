<?php

    require './function.php';

    if(update() > 0){
        echo "
            <script>
                alert('item berhasil diubah')
                window.location.href = '../admin/index.php'
            </script>
        ";
    } else {
        $id = $_POST['id'];
        echo "
            <script>
                alert('item gagal diubah')
                window.location.href = '../admin/add-craft.php?id='$id
            </script>
        ";
    }


?>