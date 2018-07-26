<div class="row">
    <div class="col-xs-12">
        <h1 class="text-center">Berkas</h1>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        
        <!-- form upload -->
        <?php echo form_open_multipart('pelanggan/uploadBuktiBayar/'.$kodepembelian) ?>
            <!-- bukti bayar -->
            <div class="form-group">
                <label style="color: #222">Bukti Pembayaran: </label>
                <input type="file" name="buktibayar" class="form-control">
                <div style="background-color: #f44242; text-align: center;">
                    <span style="color: white;"><?php echo form_error('buktibayar') ?></span>
                </div>
            </div>

            <!-- notif -->
            <p class="text-danger">* Type file: jpg,png,gif</p>
            <p class="text-danger">* Ukuran file maksimal 500KB</p>

            <!-- submit -->
            <div class="form-group">
                <button type="submit" value="upload" class="btn btn-info btn-block">Upload</button>
            </div>
        <?php echo form_close() ?>
        
    </div>
</div>