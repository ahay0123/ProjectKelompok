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

            <?php
            // jika ada tombol simpan
            if (isset($_POST['simpan'])) {
                if (tambah_stock($_POST) > 0) {

            ?>
                    <div class="alert alert-succes" role="alert">
                        Data Berhasil disimpan !
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Data gagal disimpan !
                    </div>
            <?php
                }
            }
            ?>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#tambahModal">
                                <i class="material-icons">add</i>
                                <span>STOCK OBAT</span>
                            </button>
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
                                    foreach ($stock_obat as $stock) :
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
                                                <button type="button" class="btn btn-danger waves-effect">Hapus</button>
                                            </td>
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
    <!-- Modal -->
    <?php
    // mengambil data barang dari tabel dengan kode terbesar 
    $query = mysqli_query($koneksi, "SELECT max(id_obat) as kodeTerbesar FROM stock_obat");
    $data = mysqli_fetch_array($query);
    $kodeTamu = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeTamu, 2, 3);

    $urutan++;

    // membuat kode barang baru
    // string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter

    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya zt
    $huruf = "zt";
    $kodeTamu = $huruf . sprintf("%03s", $urutan);
    ?>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="tambahModal Label">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="body">
                            <input type="hidden" name="id_obat" id="id_obat" value="<?= $kodeTamu ?>">
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="expired_date" id="expired_date" placeholder="Expired Date" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="penyimpanan" id="penyimpanan" placeholder="Penyimpanan" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="banyak_stock" id="banyak_stock" placeholder="Banyak Stock" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" class="form-control" name="banyak_stock" id="banyak_stock" placeholder="Kategori" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_pemasok" id="nama_pemasok" placeholder="Nama Pemasok" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
</section>