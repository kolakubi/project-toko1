<!-- search keywords -->
<div class="row">
    <div class="col-xs-12">

        <div class="alert alert-primary">
            <?php echo form_open('home/cari')?>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keywords" placeholder="Cari Produk...">
                        <span class="input-group-addon" style="cursor: pointer;" ><i class="glyphicon glyphicon-search"></i></span>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>

    </div>
</div>

<!-- sort dari kategori -->
<div class="row">
    <div class="col-xs-12 col-md-4">

        <?php echo form_open('home', array('class' => 'form-inline')) ?>
            <!-- list -->
            <div class="form-group">
                <label style="color: #222">Kategori: </label>
                <select class="form-control" name="paket">

                    <option>-Pilih Kategori-</option>
                    <!-- <?php foreach($hasil as $dataProduk) : ?>
                        <option value="<?php echo $dataProduk['kode_produk']?>"><?php echo $dataProduk['nama_produk']?></option>
                    <?php endforeach ?> -->

                </select>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('paket') ?></span>
                </div>
            </div>

            <!-- button submit -->
            <button class="btn btn-primary" type="submit">cari</button>

        <?php echo form_close() ?>
    </div>
</div>
<br>
<!-- tampilin produk -->
<div class="row">

    <!-- inisisi variable -->
    <?php $index = 0  ?>

    <?php foreach($hasil as $produk) : ?>

        <?php $index++ ?>
        <?php if($index%4 == 1) : ?>
        <?php echo '</div><div class="row">' ?>
        <?php endif ?>

        <!-- produk   -->
        <div class="col-xs-12 col-md-3" style="background-color: white; padding: 15px">
            <a href="<?php echo base_url() ?>home/produkdetail/<?php echo $produk['kode_produk'] ?>">
                <!-- gambar produk -->
                <img class="img img-responsive" src="<?php echo base_url()?>asset/image/produk/<?php echo $produk['gambar_produk'] ?>" style="max-width: 100%; margin: 0 auto">
                <!-- nama produk -->
                <p style="color: rgba(0,0,0,0.7); font-size: 15px; font-weight: 600"><?php echo $produk['nama_produk'] ?></p>
                <!-- harga produk -->
                <h5 class="text text-warning"><?php echo 'Rp '.number_format($produk['harga_produk'], 0, ',', '.') ?></h5>
            </a>
        </div>
        
    <?php endforeach ?>

</div>
