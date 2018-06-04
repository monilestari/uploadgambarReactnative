<?php
    
    include 'connect.php';

    $con = mysqli_connect($hostname,$username,$password,$database);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    $Sql = "insert into gambar (gambar) values ('https://putumonilestari.000webhostapp.com/apimobile/uploads/$target_file')";
    $data = mysqli_query($conn,$Sql);
    
    $status = array();
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)) {
        $status['kode']=1;
        $status['deskripsi']='upload berhasil';
    } else {
        $status['kode']=0;
        $status['deskripsi']='upload tidak berhasil';
    }
    echo json_encode($status);
?>