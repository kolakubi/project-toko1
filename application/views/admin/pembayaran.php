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
                </tr>
            </thead>

            <tbody>
                <?php foreach($hasil as $pembelian) : ?>
                    <tr>
                        <td><?php echo $pembelian['kode_pembelian'] ?></td>
                        <td><?php echo 'Rp '.number_format($pembelian['total_harga_pembayaran'], 0, ',', '.') ?></td>
                        <td>
                            <a href="<?php echo base_url().'uploads/buktibayar/'.$pembelian['file_bukti_pembayaran'] ?>" target="_blank">Lihat Berkas</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-success">Valid</a>
                            <a href="#" class="btn btn-danger">Tidak Valid</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>

    </div>
</div>