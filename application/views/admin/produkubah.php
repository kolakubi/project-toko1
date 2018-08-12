<h1 class="text-center">Tambah Produk</h1>

<br><br>
<div class="row"> 
    <div class="col-xs-12 col-md-6 col-md-offset-3">

        <?php echo form_open_multipart('admin/produkubah/'.$produk['kode_produk']) ?>

            <div class="form-group">
                <label style="color: #222">Kode Produk</label>
                <input type="text" class="form-control" name="kodeproduk" value="<?php echo $produk['kode_produk'] ?>" readonly>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('kodeproduk') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Nama Produk</label>
                <input type="text" class="form-control" name="namaproduk" value="<?php echo $produk['nama_produk'] ?>">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('namaproduk') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="">-pilih kategori-</option>
                    <?php foreach($kategori as $kat) : ?>
                        <option value="<?php echo $kat['kode_kategori'] ?>" <?php if($produk['kode_kategory'] == $kat['kode_kategori']){echo 'selected';} ?>><?php echo $kat['nama_kategori'] ?></option>
                    <?php endforeach ?>
                </select>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('kategori') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Harga</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $produk['harga_produk'] ?>">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('harga') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?php echo $produk['deskripsi_produk'] ?></textarea>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('deskripsi') ?></span>
                </div>
            </div>

             <div class="form-group">
                <label style="color: #222">Satuan</label>
                <select name="satuan" class="form-control">
                    <option value="">-pilih satuan-</option>
                    <option value="pak" <?php if($produk['satuan_produk'] == 'pak'){echo 'selected';} ?>>Pak</option>
                    <option value="renceng" <?php if($produk['satuan_produk'] == 'renceng'){echo 'selected';} ?>>Renceng</option>
                    <option value="roll" <?php if($produk['satuan_produk'] == 'roll'){echo 'selected';} ?>>Roll</option>
                    <option value="dus" <?php if($produk['satuan_produk'] == 'dus'){echo 'selected';} ?>>Dus</option>
                    <option value="karung" <?php if($produk['satuan_produk'] == 'karung'){echo 'selected';} ?>>Karung</option>
                </select>
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('satuan') ?></span>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #222">Gambar Produk: </label>
                <img src="<?php echo base_url().'asset/image/produk/'.$produk['gambar_produk'] ?>" alt="" class="img img-responsive" style="margin:0 auto">
                <input type="file" name="gambar" class="form-control">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('gambar') ?></span>
                </div>
            </div>

            <!-- notif -->
            <p class="text-danger">* Type file: jpg,png,gif</p>
            <p class="text-danger">* Ukuran file maksimal 500KB</p>

            <!-- button -->
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-info btn-block" type="submit">Simpan</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo base_url() ?>admin/produk" class="btn btn-danger btn-block" type="submit">kembali</a>
                </div>
            </div>

        <?php echo form_close() ?>

    </div>
</div>