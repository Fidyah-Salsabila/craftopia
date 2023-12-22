<?php

    require './function.php';

    if(addContact() > 0){
        echo "
            <script>
                alert('Terima kasih sudah menghubungi kami')
                window.location.href = '../kontak.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('terjadi kesalahan')
                window.location.href = '../kontak.php'
            </script>
        ";
    }

?>