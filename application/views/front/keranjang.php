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

            <!-- pengiriman -->
            <div class="form-group">
                <label style="color: #222">Pengiriman: </label>
                <select class="form-control" name="paket">
                    <option>-Pilih Pengiriman-</option>
                    <option>Diantar</option>
                    <option>Diambil</option>
                    <option>Go Send</option>
                </select>
            </div>

            <!-- packing -->
            <div class="form-group">
                <label style="color: #222">Packing: </label>
                <select class="form-control" name="paket">
                    <option>-Pilih Packing-</option>
                    <option>Kardus</option>
                    <option>Karung Semen</option>
                </select>
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