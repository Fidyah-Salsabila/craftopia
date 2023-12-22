<?php 

    $db = mysqli_connect('localhost', 'root', '', 'craftopia_db');

    function query($query){

        global $db;

        $data = [];

        $result = mysqli_query($db, $query);

        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }

        return $data;

    }

    function addNewItem($data){ 

        global $db;

        $gambar_loc = $_FILES['thumbnail']['tmp_name'];
        $gambar = $_FILES['thumbnail']['name'];
        $gambar = str_replace(" ", "-", $gambar);
        
        move_uploaded_file($gambar_loc, '../image/'.$gambar);

        $title = $_POST['title'];
        $source = $_POST['source'];
        $estimate = $_POST['estimate'];
        $difficulty = $_POST['difficulty'];
        $description = $_POST['description'];
        $steps = $_POST['steps'];
        $video = $_POST['video'];

        $query = "
            INSERT INTO 
                craft 
            (`title`, `difficulty`, `description`, `steps`, `video`, `thumbnail`, `estimate`, `source`)
                VALUES 
            ( '$title', '$difficulty', '$description', '$steps', '$video', '$gambar', '$estimate', '$source')
        ";

        mysqli_query($db, $query);

        $files = $_FILES['tools'];
        $file_count = count($files['name']);

        $latest_data = query("SELECT * FROM craft ORDER BY id DESC")[0];
        $latest_data_id = $latest_data['id'];

        for ($i=0; $i < $file_count; $i++) { 
            print 'File Name: ' . $files['name'][$i];
            print 'File Type: ' . $files['type'][$i];
            print 'File Size: ' . $files['size'][$i];
            print 'File tmp : ' . $files['tmp_name'][$i];
            print '<br>';

            $gambar_loc = $files['tmp_name'][$i];
            $gambar = $files['name'][$i];
            $gambar = str_replace(" ", "-", $gambar);

            move_uploaded_file($gambar_loc, '../image/'.$gambar);

            $query = "
                INSERT INTO 
                    tools
                (`craft_id`, `image`)
                VALUES
                ('$latest_data_id', '$gambar')
            ";

            mysqli_query($db, $query);
        }


        return mysqli_affected_rows($db);

    }

    function update(){

        global $db;

        // $files = $_FILES['tools'];
        // $file_count = count($files['name']);

        // for ($i=0; $i < $file_count; $i++) { 
        //     print 'File Name: ' . $files['name'][$i];
        //     print 'File Type: ' . $files['type'][$i];
        //     print 'File Size: ' . $files['size'][$i];
        //     print 'File tmp : ' . $files['tmp_name'][$i];
        //     print '<br>';

        //     $gambar_loc = $files['tmp_name'][$i];
        //     $gambar = $files['name'][$i];
        //     $gambar = str_replace(" ", "-", $gambar);

        //     move_uploaded_file($gambar_loc, '../image/'.$gambar);
        // }
        
        // $gambar_loc = $_FILES['thumbnail']['tmp_name'];
        $gambar = $_FILES['thumbnail']['name'];
        // $gambar = str_replace(" ", "-", $gambar);
        
        // move_uploaded_file($gambar_loc, '../image/'.$gambar);
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $source = $_POST['source'];
        $estimate = $_POST['estimate'];
        $difficulty = $_POST['difficulty'];
        $description = $_POST['description'];
        // $steps = $_POST['steps'];
        $video = $_POST['video'];

        $query = "
            UPDATE
                craft 
            SET title = '$title', difficulty =  '$difficulty', description = '$description', video = '$video', thumbnail = '$gambar', estimate = '$estimate', source =  '$source'
            WHERE id = '$id'
        ";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function deleteItem(){
        global $db;

        $id = $_GET['delete'];

        $query = "DELETE FROM craft WHERE id = '$id'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function addContact(){
        global $db;
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $description = $_POST['description'];

        $query = "
        INSERT INTO 
        contact 
        (`name`, `email`, `description`)
        VALUES
        ('$name', '$email', '$description')
        ";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);

    }

    function deleteContact(){
        global $db;

        $id = $_GET['delete'];

        $query = "DELETE FROM contact WHERE id = '$id'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

?>