<br><br>

<div class="row">

    <!-- gambar produk -->
    <div class="col-xs-12 col-md-6">
        <img src="<?php echo base_url() ?>asset/image/produk/<?php echo $produk['gambar_produk'] ?>" class="img img-responsive" style="margin: 0 auto">
    </div>

    <!-- produk detail -->
    <div class="col-xs-12 col-md-4">
        <p>Harga: <span style="font-size: 1.5em" class="text-warning"><?php echo 'Rp '.number_format($produk['harga_produk'], 0, ',', '.') ?></span></p>
        <hr>
        <p>Deskripsi: <span><?php echo $produk['deskripsi_produk'] ?></span></p>
        <hr>
        <p>Stok: <span style="font-size: 1.5em" class="text-warning"><?php echo $produk['jumlah_stok'] ?></span> <?php echo $produk['satuan_produk'] ?></p>
        <hr>
        
        <!-- form -->
        <?php echo form_open('home/beli/'.$produk['kode_produk']) ?>
            <div class="form-group">
                <label>Jumlah Pembelian</label>
                <input name="jumlahpembelian" type="number" class="form-control">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('jumlahpembelian') ?></span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-lg btn-block">Beli</button>
            </div>
        <?php echo form_close() ?>
        
        
    </div>

</div>

<br><br>