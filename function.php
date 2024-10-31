<?php
// panggil file koneksi.php
require_once('koneksi.php');

// membuat query ke / dari database
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data
function tambah_stock($data)
{
    global $koneksi;

    $kode                   = htmlspecialchars($data["id_obat"]);
    $nama_obat              = htmlspecialchars($data["nama_obat"]);
    $expired_date           = date("Y-m-d", strtotime($data['expired_date']));
    $penyimpanan            = htmlspecialchars($data["penyimpanan"]);
    $banyak_stock           = htmlspecialchars($data["banyak_stock"]);
    $unit                   = htmlspecialchars($data["unit"]);
    $kategori               = htmlspecialchars($data["kategori"]);
    $deskripsi              = htmlspecialchars($data["deskripsi"]);
    $harga_beli             = htmlspecialchars($data["harga_beli"]);
    $harga_jual             = htmlspecialchars($data["harga_jual"]);
    $nama_pemasok           = htmlspecialchars($data["nama_pemasok"]);

    $query =  "INSERT INTO stock_obat VALUES ('$kode','$nama_obat','$expired_date','$penyimpanan','$banyak_stock','$unit','$kategori','$deskripsi','$harga_beli','$harga_jual','$nama_pemasok')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// function ubah data obat
function ubah_data($data)
{
    global $koneksi;
    $id                     = htmlspecialchars($data["id_obat"]);
    $nama_obat              = htmlspecialchars($data["nama_obat"]);
    $expired_date           = date("Y-m-d", strtotime($data['expired_date']));
    $penyimpanan            = htmlspecialchars($data["penyimpanan"]);
    $banyak_stock           = htmlspecialchars($data["banyak_stock"]);
    $unit                   = htmlspecialchars($data["unit"]);
    $kategori               = htmlspecialchars($data["kategori"]);
    $deskripsi              = htmlspecialchars($data["deskripsi"]);
    $harga_beli             = htmlspecialchars($data["harga_beli"]);
    $harga_jual             = htmlspecialchars($data["harga_jual"]);
    $nama_pemasok           = htmlspecialchars($data["nama_pemasok"]);

    $query = "UPDATE stock_obat SET
                nama_obat           =  '$nama_obat',    
                expired_date        =  '$expired_date',    
                penyimpanan         =  '$penyimpanan',    
                banyak_stock        =  '$banyak_stock',    
                unit                =  '$unit',    
                kategori            =  '$kategori',    
                deskripsi           =  '$deskripsi',    
                harga_beli          =  '$harga_beli',    
                harga_jual          =  '$harga_jual',    
                nama_pemasok        =  '$nama_pemasok'
                WHERE id_obat       = '$id'    
            ";

            
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

    if (mysqli_query($koneksi, $query)) {
        return mysqli_affected_rows($koneksi);
    } else {
        echo "Error: " . mysqli_error($koneksi);
        return 0; // atau false
    }

}

// Function untuk mengambil data dari tabel dengan kolom ENUM
function ambil_enum_values($stock_obat, $unit)
{
    global $koneksi;

    // Query untuk mendapatkan definisi kolom ENUM dari tabel
    $query = mysqli_query($koneksi, "SHOW COLUMNS FROM `$stock_obat` LIKE '$unit'");
    if (!$query) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Ambil data dan ekstrak nilai-nilai ENUM
    $data = mysqli_fetch_array($query);
    $enumValues = explode("','", rtrim(ltrim($data['Type'], "enum('"), "')"));

    return $enumValues;
}

function ambil_enum_kategori($stock_obat, $kategori)
{
    global $koneksi;

    // Query untuk mendapatkan definisi kolom ENUM dari tabel
    $query = mysqli_query($koneksi, "SHOW COLUMNS FROM `$stock_obat` LIKE '$kategori'");
    if (!$query) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Ambil data dan ekstrak nilai-nilai ENUM
    $data = mysqli_fetch_array($query);
    $enumValues = explode("','", rtrim(ltrim($data['Type'], "enum('"), "')"));

    return $enumValues;
}
