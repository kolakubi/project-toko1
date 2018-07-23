<?php

    $index = 0;
    $totalItem = 0;
    $totalHarga = 0;

?>

<!-- judul -->
<div class="row">
    <h1 class="text-center">Keranjang Anda</h1>
</div>
<br>

<!-- table keranjang -->
<div class="row">
    <div class="col-xs-12 ">

        <table class="table table-responsive table-striped table-hover">
            <thead>
                <tr class="info">
                    <th class="text-center">Produk</th>
                    <th class="text-center">Jumlah Item</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['keranjang'] as $produk) : ?>
                    <tr>
                        <td><?php echo $produk['nama_produk'] ?></td>
                        <td><?php echo $produk['jumlah_produk'] ?></td>
                        <td><?php echo 'Rp '.number_format($produk['harga_produk_akumulasi'], 0, ',', '.') ?></td>
                        <td><a href="<?php echo base_url()?>home/hapusItemKeranjang/<?php echo $index ?>"  class="btn btn-danger">-</a></td>
                    </tr>
                    <?php $index++ ?>
                    <?php $totalItem += $produk['jumlah_produk'] ?>
                    <?php $totalHarga += $produk['harga_produk_akumulasi'] ?>
                <?php endforeach ?>
                <tr class="success">
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo $totalItem ?></strong></td>
                    <td><strong><?php echo 'Rp '.number_format($totalHarga, 0, ',', '.') ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- form -->
<div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        
        <?php echo form_open() ?>

            <!-- nama -->
            <div class="form-group">
                <label style="color: #222">Nama Lengkap</label>
                <input name="namalengkap" type="text" class="form-control">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('namalengkap') ?></span>
                </div>
            </div>

            <!-- telepon -->
            <div class="form-group">
                <label style="color: #222">Telepon</label>
                <input name="telepon" type="text" class="form-control">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('telepon') ?></span>
                </div>
            </div>

            <!-- alamat -->
            <div class="form-group">
                <label style="color: #222">Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('alamat') ?></span>
                </div>
            </div>

            <!-- pengiriman -->
            <div class="form-group">
                <label style="color: #222">Pengiriman: </label>
                <select class="form-control" name="pengiriman">
                    <option value="">-Pilih Pengiriman-</option>
                    <option value="Diantar">Diantar</option>
                    <option value="Diambil">Diambil</option>
                    <option value="Go Send">Go Send</option>
                </select>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('pengiriman') ?></span>
                </div>
            </div>

            <!-- packing -->
            <div class="form-group">
                <label style="color: #222">Packing: </label>
                <select class="form-control" name="packing">
                    <option value="">-Pilih Packing-</option>
                    <option value="Kardus">Kardus</option>
                    <option value="semen">Semen</option>
                </select>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('packing') ?></span>
                </div>
            </div>

            <!-- button -->
            <div class="form-group">
                <div class="col-xs-6">
                    <a href="<?php echo base_url() ?>home" class="btn btn-success btn-block">Tambah Produk</a>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-danger btn-block">Pesan</button>
                </div>
            </div>
                    
        <?php echo form_close() ?>

    </div>
</div>