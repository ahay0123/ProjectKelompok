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
