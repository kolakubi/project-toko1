<h1 class="text-center">Pesanan</h1>
<br><br>

<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Kode Pembelian</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($hasil as $pembelian) : ?>
                    <tr>
                        <td><?php echo $pembelian['kode_pembelian'] ?></td>
                        <td><?php echo $pembelian['namalengkap'] ?></td>
                        <td><?php echo $pembelian['telepon'] ?></td>
                        <td><?php echo $pembelian['tanggal_pembelian'] ?></td>
                        <td>
                            <a href="" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>