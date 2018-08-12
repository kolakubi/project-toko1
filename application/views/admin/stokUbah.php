<h1 class="text-center">Ubah Stok</h1>

<br><br>
<div class="row"> 
    <div class="col-xs-12 col-md-6 col-md-offset-3">

        <?php echo form_open_multipart('admin/stokubah/'.$stok['kode_stok']) ?>

            <div class="form-group">
                <label style="color: #222">Kode Produk</label>
                <input type="text" class="form-control" name="kodestok" value="<?php echo $stok['kode_stok'] ?>" readonly>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('kodestok') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Nama Produk</label>
                <input type="text" class="form-control" name="namaproduk" value="<?php echo $stok['nama_produk'] ?>" readonly>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('namaproduk') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $stok['jumlah_stok'] ?>">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('stok') ?></span>
                </div>
            </div>

            <!-- button -->
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-info btn-block" type="submit">Simpan</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo base_url() ?>admin/produk" class="btn btn-danger btn-block" type="submit">kembali</a>
                </div>
            </div>

        <?php echo form_close() ?>

    </div>
</div>