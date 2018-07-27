<?php

    $index = 0;

?>

<h1 class="text-center">Produk</h1>
<br><br>

<!-- tambah produk -->
<div class="row">
    <div class="col-xs-12">
        <a href="" class="btn btn-info">Tambah Produk +</a>
    </div>
</div>
<br><br>

<!-- table -->
<div class="row">
    <div class="col-xs-12">

        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
                <tr class="info">
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Produk</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hasil as $produk) : ?>
                    <?php $index++ ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $produk['kode_produk'] ?></td>
                        <td><?php echo $produk['kode_kategory'] ?></td>
                        <td><?php echo $produk['nama_produk'] ?></td>
                        <td><?php echo 'Rp '.number_format($produk['harga_produk'], 0, ',', '.') ?></td>
                        <td><?php echo $produk['deskripsi_produk'] ?></td>
                        <td><?php echo $produk['satuan_produk'] ?></td>
                        <td>
                            <img src="<?php echo base_url().'asset/image/produk/'.$produk['gambar_produk'] ?>" alt="" class="img img-responsive" style="max-width: 50px">
                        </td>
                        <td><a href="" class="btn btn-danger">Ubah</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>

    </div>
</div>