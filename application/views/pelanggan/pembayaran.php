<h1 class="text-center">Pembayaran</h1>
<br><br>

<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-bordered table-hover">
            <thead>
                <tr class="info">
                    <th>Kode Pembelian</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Harga Pesanan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($hasil as $pembayaran) : ?>
                    <tr>
                        <td><?php echo $pembayaran['kode_pembelian'] ?></td>
                        <td><?php echo $pembayaran['tanggal_pembelian'] ?></td>
                        <td><?php echo 'Rp '.number_format($pembayaran['total_harga_pembayaran'], 0, ',', '.') ?></td>
                        <td class="<?php if($pembayaran['status'] == 0 || $pembayaran['status'] == 3){echo 'warning';}elseif($pembayaran['status']==2){echo 'info';}else{echo 'success';}?>">
                            <?php if($pembayaran['status'] == 0){echo "belum ada berkas";}elseif($pembayaran['status']==2){echo 'berkas sedang diperikas';}elseif($pembayaran['status']==3){echo 'berkas tidak valid';}else{echo 'Lunas';} ?>
                        </td>
                        <td>
                            <!-- jika lunas -->
                            <?php if($pembayaran['status'] == 1) : ?>
                                <a class="btn btn-success">Lunas</a>
                            <!-- jika belum lunas -->
                            <?php else : ?>
                                <a href="<?php echo base_url() ?>pelanggan/uploadBuktiBayar/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-info">Bayar</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>