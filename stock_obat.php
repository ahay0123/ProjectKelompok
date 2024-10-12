<!-- Menu -->
<?php
    include_once('templates/header.php');
    require_once('function.php');
?>

<?php
    include_once('templates/footer.php')
?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>STOCK OBAT</h2>
            <br>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC TABLES
                                <small>Basic example without any additional modification classes</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Expired Date</th>
                                        <th>Penyimpanan</th>
                                        <th>Banyak Stock</th>
                                        <th>Unit</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Beli Rp. </th>
                                        <th>Harga Jual Rp. </th>
                                        <th>Nama Pemasok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        // penomoran auto increament
                                        $no = 1;
                                        // Query untuk memanggil semua data dari tabel stock obat
                                        $stock_obat = query("SELECT * FROM stock_obat");
                                        foreach($stock_obat as $stock) : 
                                    ?>
                                    <tr>
                                        <th scope="row"> <?= $no++; ?> </th>
                                        <td><?= $stock['nama_obat'] ?></td>
                                        <td><?= $stock['expired_date'] ?></td>
                                        <td><?= $stock['penyimpanan']; ?></td>
                                        <td><?= $stock['banyak_stock']; ?></td>
                                        <td><?= $stock['unit']; ?></td>
                                        <td><?= $stock['kategori']; ?></td>
                                        <td><?= $stock['deskripsi']; ?></td>
                                        <td><?= $stock['harga_beli']; ?></td>
                                        <td><?= $stock['harga_jual']; ?></td>
                                        <td><?= $stock['nama_pemasok']; ?></td>
                                        <td><button type="button" class="btn btn-success waves-effect">Ubah</button>
                                        <button type="button" class="btn btn-danger waves-effect">Hapus</button></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

