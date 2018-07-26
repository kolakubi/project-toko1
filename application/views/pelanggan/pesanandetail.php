<?php

    $index = 0;
    $totalHargaProduk = 0;
    $grandTotalHargaProduk = 0;
    $grandTotalItemProduk = 0;

?>

<h1 class="text-center">Pesanan Detail</h1>
<br><br>

<!-- table -->
<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-hover table-striped table-bordered">
            <thead>
                <tr class="info">
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga Satuan</th>
                    <th class="text-center">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hasil as $pembelian) : ?>
                    <?php $index++ ?>
                    <?php $totalHargaProduk = $pembelian['jumlah_item_pembelian_detail']*$pembelian['harga_produk'] ?>
                    <?php $grandTotalHargaProduk += $totalHargaProduk ?>
                    <?php $grandTotalItemProduk += $pembelian['jumlah_item_pembelian_detail'] ?>

                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $pembelian['nama_produk'] ?></td>
                        <td><?php echo number_format($pembelian['jumlah_item_pembelian_detail'], 0, ',', '.') ?></td>
                        <td><?php echo 'Rp '.number_format($pembelian['harga_produk'], 0, ',', '.') ?></td>
                        <td><?php echo 'Rp '.number_format($totalHargaProduk, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>

                <!-- total -->
                <tr class="success">
                    <td class="text-right" colspan="2"><strong>Total:</strong></td>
                    <td><strong><?php echo $grandTotalItemProduk ?></strong></td>
                    <td></td>
                    <td><strong><?php echo 'Rp '.number_format($grandTotalHargaProduk, 0, ',', '.') ?></strong></td>
                </tr>

                <!-- packing -->
                <tr class="success">
                    <td class="text-right" colspan="2"><strong>Packing:</strong></td>
                    <td colspan="3"><strong><?php echo $pembelian['metode_packing'] ?></strong></td>
                </tr>

                <!-- pengiriman -->
                <tr class="success">
                    <td class="text-right" colspan="2"><strong>Pengiriman:</strong></td>
                    <td colspan="3"><strong><?php echo $pembelian['metode_pengiriman'] ?></strong></td>
                </tr>

            </tbody>
        </table>

    </div>
</div>

<br><br>
<!-- tombol -->
<div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">

        <div class="col-xs-6">
            <a href="<?php echo base_url() ?>pelanggan/uploadbuktibayar/<?php echo $hasil[0]['kode_pembelian'] ?>" class="btn btn-info btn-block">Bayar</a>
        </div>
        <div class="col-xs-6">
            <a href="<?php echo base_url() ?>pelanggan/pesanan" class="btn btn-danger btn-block">Kembali</a>
        </div>

    </div>
</div>