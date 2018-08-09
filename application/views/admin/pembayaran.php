<h1 class="text-center">Pembayaran</h1>
<br><br>

<!-- table -->
<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-bordered">

            <thead>
                <tr>
                    <th>Kode Pembelian</th>
                    <th>Total Pembelian</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($hasil as $pembelian) : ?>
                    <tr>
                        <td><?php echo $pembelian['kode_pembelian'] ?></td>
                        <td><?php echo 'Rp '.number_format($pembelian['total_harga_pembayaran'], 0, ',', '.') ?></td>
                        <td>
                            <!-- jika ada berkas -->
                            <?php if($pembelian['file_bukti_pembayaran']) : ?>
                                <a href="<?php echo base_url().'uploads/buktibayar/'.$pembelian['file_bukti_pembayaran'] ?>" target="_blank">Lihat Berkas</a>
                            <!-- jika tidak ada berkas -->
                            <?php else : ?>
                                <a>Tidak ada berkas</a>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if($pembelian['status'] == 0){echo "belum diperiksa";}elseif($pembelian['status']==2){echo 'berkas sedang diperiksa';}elseif($pembelian['status']==3){echo 'berkas tidak valid';}else{echo 'Lunas';} ?>
                        </td>
                        <td>
                            <!-- jika ada berkas -->
                            <?php if($pembelian['file_bukti_pembayaran']) : ?>
                                <?php if($pembelian['status'] == 0 || $pembelian['status'] == 2 || $pembelian['status'] == 3) : ?>
                                    <!-- berkas valid -->
                                    <a href="<?php echo base_url() ?>admin/pembayaranvalid/<?php echo $pembelian['kode_pembayaran'] ?>" class="btn btn-success">Valid</a>
                                    <!-- berkas tidak valid -->
                                    <a href="<?php echo base_url() ?>admin/pembayarantidakvalid/<?php echo $pembelian['kode_pembayaran'] ?>" class="btn btn-danger">Tidak Valid</a>
                                <?php else : ?>
                                <a class="btn btn-success">Valid</a>
                                    <?php endif ?>
                            <!-- jika tidak ada berkas -->
                            <?php else : ?>
                            <a class="btn btn-default">Tidak ada berkas</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>

    </div>
</div>