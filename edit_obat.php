<!-- Menu -->
<?php
include_once('templates/header.php');
require_once('function.php');
?>

<?php
include_once('templates/footer.php')
?>

<!-- Jikaa ada id_obat di URL -->
<?php
if (isset($_GET['id'])) {
    $id_obat = $_GET['id'];
    // ambil data obat yang sesuai dengan id_obat
    $data = query("SELECT * FROM stock_obat WHERE id_obat = '$id_obat'")[0];
}

if (isset($_POST['simpan'])) {
    if (ubah_data($_POST) > 0) {
?>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> You successfully read this important alert message.
        </div>
        <?php echo "<script>
                alert('Data berhasil diubah!');
                window.location.href='stock_obat.php';
              </script>";
        ?>
    <?php
    } else {
    ?>
        <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
        </div>
<?php
    }
}
?>

<?php
$enum_values = ambil_enum_values('stock_obat', 'unit');
$enum_values_kategori = ambil_enum_kategori('stock_obat', 'kategori');
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Ubah Data Obat</h1>
            <br>
            <div class="row">
                <div class="col-xs-24 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Data Obat</h2>

                                        </div>
                                        <div class="body">
                                            <form id="form_advanced_validation" method="POST">
                                                <input type="hidden" name="id_obat" value="<?= $id_obat ?>">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="nama_obat" id="nama_obat" value="<?= $data['nama_obat'] ?>">
                                                        <label class="form-label">Nama Obat</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="date" class="form-control" name="expired_date" id="expired_date" value="<?= $data['expired_date'] ?>">
                                                        <label class="form-label">Expired Date</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="penyimpanan" id="penyimpanan" value="<?= $data['penyimpanan'] ?>">
                                                        <label class="form-label">Penyimpanan</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="banyak_stock" id="banyak_stock" value="<?= $data['banyak_stock'] ?>">
                                                        <label class="form-label">Banyak Stock</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <select class="form-control" name="unit" id="unit" value="<?= $data['unit'] ?>">
                                                            <?php foreach ($enum_values as $value) : ?>
                                                                <option value="<?= $value; ?>"><?= $value; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label class="form-label">Unit</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <select class="form-control" name="kategori" id="kategori" value="<?= $data['unit'] ?>">
                                                            <?php foreach ($enum_values_kategori as $value) : ?>
                                                                <option value="<?= $value; ?>"><?= $value; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label class="form-label">Kategori</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $data['deskripsi'] ?>">
                                                        <label class="form-label">Deskripsi</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="harga_beli" id="harga_beli" value="<?= $data['harga_beli'] ?>">
                                                        <label class="form-label">Harga Beli</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="harga_jual" id="harga_jual" value="<?= $data['harga_jual'] ?>">
                                                        <label class="form-label">Harga Jual</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="nama_pemasok" id="nama_pemasok" value="<?= $data['nama_pemasok'] ?>">
                                                        <label class="form-label">Nama Pemasok</label>
                                                    </div>
                                                    <div class="help-info"></div>
                                                </div>
                                                <button class="btn btn-primary waves-effect" name="simpan" type="submit">SUBMIT</button>
                                                <a href="stock_obat.php">
                                                    <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                                                </a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>