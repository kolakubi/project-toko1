<div style="width: 900px; margin: 0 auto; padding:20px; border: 1px solid rgba(0,0,0,0.1)">

    <!-- logo -->
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <img alt="brand" src="<?php echo base_url() ?>asset/image/logo.png" class="img img-responsive">
        </div>
    </div>
    <hr>

    <!-- header -->
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <p style="font-size: 20px">INVOICE #<?php echo $pendaftaran[0]['kode_pendaftaran']?></p>
            <p>Invoice date: <?php echo $pendaftaran[0]['tanggaldaftar'] ?></p>
        </div>
    </div>
    <hr>

    <!-- tujuan & dari -->
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <p><strong>Invoice to:</strong></p>
            <p><?php echo $pendaftaran[0]['nama'] ?></p>
            <p><?php echo $pendaftaran[0]['alamat'] ?></p>
            <p><?php echo $pendaftaran[0]['kelurahan'] ?>, <?php echo $pendaftaran[0]['kecamatan'] ?>, <?php echo $pendaftaran[0]['kabupaten'] ?></p>
            <p><?php echo $pendaftaran[0]['propinsi'] ?></p>
        </div>
        <div class="col-xs-12 col-md-6">
            <p><strong>Pay to:</strong></p>
            <p>Wisnu Haji dan Umroh</p>
            <p>Jalan Tambun</p>
            <p>Bekasi, Gersang, Bekasi</p>
            <p>Bekasi</p>
        </div>
    </div>
    <hr>

    <!-- rincian tagihan -->
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">
                            <strong>Invoice Items</strong>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Description</strong></td>
                        <td><strong>Amount</strong></td>
                    </tr>
                    <tr>
                        <td>Paket <?php echo $pendaftaran[0]['nama_produk'] ?> (<?php echo $pendaftaran[0]['tanggaldaftar'] ?>)</td>
                        <td><?php echo 'Rp'.number_format($pendaftaran[0]['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right"><strong>Sub total</strong></td>
                        <td><?php echo 'Rp'.number_format($pendaftaran[0]['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right"><strong>Tax</strong></td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td style="text-align: right"><strong>Total</strong></td>
                        <td><?php echo 'Rp'.number_format($pendaftaran[0]['harga'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <!-- info rekening -->
    <div class="row">
        <p class="text-center">Pembayaran dapat dilakukan dengan transfer ke:</p>

        <!-- mandiri -->
        <div class="col-xs-12 col-md-4">
            <p class="text-center">
                <img class="img img-responsive" src="<?php echo base_url() ?>asset/image/logo-bank-mandiri.jpg" alt="logo-bank-mandiri">
            </p>
            <p>Bank Mandiri</p>
            <p>123135354313513</p>
            <p>a/n: Wisnu Tampan</p>
        </div>

        <!-- bca -->
        <div class="col-xs-12 col-md-4">
            <p class="text-center">
                <img class="img img-responsive" src="<?php echo base_url() ?>asset/image/logo-bank-bca.jpg" alt="logo-bank-mandiri">
            </p>
            <p>BCA</p>
            <p>123135354313513</p>
            <p>a/n: Wisnu Tampan</p>
        </div>

        <!-- permata -->
        <div class="col-xs-12 col-md-4">
            <p class="text-center">
                <img class="img img-responsive" src="<?php echo base_url() ?>asset/image/logo-bank-permata.jpg" alt="logo-bank-mandiri">
            </p>
            <p>Permata</p>
            <p>123135354313513</p>
            <p>a/n: Wisnu Tampan</p>
        </div>
    </div>

</div> <!-- end of container -->
<br>
<br>

<p class="text-center">
    <a href="<?php echo base_url() ?>jamaah/uploadpembayaran/<?php echo $pendaftaran[0]['kode_pendaftaran'] ?>" class="btn btn-info">Upload Bukti Pembayaran</a>
</p>

