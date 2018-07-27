<?php

    $index = 0;

?>

<h1 class="text-center">Stok</h1>
<br><br>

<!-- table -->
<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
                <tr class="info">
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Produk</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hasil as $stok) : ?>
                    <?php $index++ ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $stok['kode_produk'] ?></td>
                        <td><?php echo number_format($stok['jumlah_stok'], 0, ',', '.') ?></td>
                        <td><a href="" class="btn btn-danger">Ubah</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>

    </div>
</div>