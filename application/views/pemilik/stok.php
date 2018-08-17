<?php

    $index = 0;
    $stokKosong = 0;
    $stokRendah = 0;
    $stokAman = 0;

?>

<h1 class="text-center">Stok</h1>
<br><br>

<!-- table -->
<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
                <tr class="info">
                    <th class="text-center">Kode Produk</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hasil as $stok) : ?>
                    <?php
                        if($stok['jumlah_stok'] == 0){
                            $stokKosong += 1;
                        }
                        elseif($stok['jumlah_stok'] < 20 &&
                        $stok['jumlah_stok'] > 0){
                            $stokRendah += 1;
                        }
                        else{
                            $stokAman += 1;
                        }
                    ?>

                    <tr class="<?php
                        if($stok['jumlah_stok'] == 0){
                            echo 'warning';
                        }
                        elseif($stok['jumlah_stok'] < 20 &&
                        $stok['jumlah_stok'] > 0){
                            echo 'info';
                        }
                        else{
                            echo 'success';
                        }
                    ?>">
                        <td><?php echo $stok['kode_produk'] ?></td>
                        <td><?php echo $stok['nama_produk'] ?></td>
                        <td><?php echo number_format($stok['jumlah_stok'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>

    </div>
</div>

<!-- summary -->
<!-- total Stok Aman -->
<h4 class="text-center text-success"><strong>Item dengan Stok Aman: <?php echo $stokAman ?></strong></h4>
<!-- total Stok Rendah -->
<h4 class="text-center text-info"><strong>Item dengan Stok Rendah: <?php echo $stokRendah ?></strong></h4>
<!-- total Stok Kosong -->
<h4 class="text-center text-warning"><strong>Item dengan Stok Kosong: <?php echo $stokKosong ?></strong></h4>
