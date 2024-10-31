<?php
    require_once 'function.php';

    // jika ada id
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (hapus_data($id) > 0) {
            echo "<script>alert('Data berhasil di Hapus !')</script>"; 
            echo "<script>window.location.href='stock_obat.php'</script>"; 
        } else {
            echo "<script> alert('Data gagal di hapus !')</script>";
            echo "<script>window.location.href ='stock_obat.php';</script>"; 
        }
    }
?>