<h1 class="text-center">Pesanan</h1>
<br><br>

<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-bordered table-hover">
            <thead>
                <tr class="info">
                    <th>Kode Pembelian</th>
                    <th>Nama</th>
                    <th>Nominal Pembelian</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($hasil as $pembelian) : ?>
                    <tr>
                        <td><?php echo $pembelian['kode_pembelian'] ?></td>
                        <td><?php echo $pembelian['namalengkap'] ?></td>
                        <td><?php echo 'Rp '.number_format($pembelian['total_harga_pembayaran'], 0, ',', '.') ?></td>
                        <td><?php echo $pembelian['tanggal_pembelian'] ?></td>
                        <!-- status pembelian -->
                        <td class="<?php if($pembelian['status']){echo 'success';}else{echo 'warning';} ?>">
                            <?php if($pembelian['status']){echo 'Lunas';}else{echo 'di proses';} ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url() ?>pelanggan/pesanandetail/<?php echo $pembelian['kode_pembelian'] ?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>