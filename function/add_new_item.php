<?php

    require './function.php';

    if(addNewItem($_POST) > 0){
        echo "
            <script>
                alert('item berhasil ditambahkan')
                window.location.href = '../admin/index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('item gagal ditambahkan')
                window.location.href = '../admin/add-craft.php'
            </script>
        ";
    }

?>