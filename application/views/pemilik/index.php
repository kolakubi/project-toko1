<?php 
    $totalNonimalPembayaran = 0;
    $totalYangSudahDibayar = 0;
    $totalTagihanLunas = 0;
    $totalTagihanBelumLunas = 0;
    $index = 0;
?>

<h1 class="text-center">Laporan Pembayaran</h1>

<div class="row">
  <div class="col-xs-12 col-md-4 col-md-offset-4">
  <h5 class="text-center text-">Berdasarkan Tanggal Pembayaran</h5>
    <?php echo form_open() ?>
      <div class="form-group">
        <label>Dari: </label>
        <input type="date" name="tanggaldari" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggaldari') ?></span>
      </div>
      <div class="form-group">
        <label>Sampai: </label>
        <input type="date" name="tanggalsampai" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>

  </div>
</div>
<br><br>

<!-- info tanggal pencarian -->
<?php if(!empty($tanggal)) : ?>
  <div class="well" style="margin-bottom: -20px;">
    <p class="text-center"><strong>Menampilkan pencarian tanggal</strong></p>
    <p style="font-size: 18px; margin-top: -10px;" class="text-center text-success"><strong><?php echo $tanggal['dari']?> <span style="color: #555555">s/d</span> <?php echo $tanggal['sampai']?></strong></p>
  </div>
<?php endif ?>
<br><br>

<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="datatablepembelian">
  <thead>
    <tr class="info">
      <th>Kode Pembelian</th>
      <th>Tanggal Pembelian</th>
      <th>Jumlah tagihan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($hasil as $bayar) : ?>
        <?php $index++; ?>
      <!-- total yang sudah dibayar -->
      <?php if($bayar['status']){$totalYangSudahDibayar+=$bayar['total_harga_pembayaran'];} ?>
      <!-- total nominal pembayaran -->
      <?php $totalNonimalPembayaran+=$bayar['total_harga_pembayaran']; ?>
      <!-- total tagihan lunas -->
      <?php if($bayar['status']){$totalTagihanLunas++;}else{$totalTagihanBelumLunas++;} ?>
      <tr>
        <td><?php echo $bayar['kode_pembelian']?></td>
        <td><?php echo $bayar['tanggal_pembelian'] ?></td>
        <td><?php echo 'Rp'.number_format($bayar['total_harga_pembayaran'], 0, ',', '.') ?></td>
        <td><?php if($bayar['status']){echo 'lunas';}else{echo 'belum lunas';} ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<br>

<!-- summary -->
<h4 class="text-center text-uppercase text-danger"><strong>Total Tagihan: <?php echo $index ?></strong></h4>
<!-- total tagihan lunas -->
<h4 class="text-center text-success"><strong>Total Tagihan Lunas: <?php echo $totalTagihanLunas ?></strong></h4>
<!-- total tagihan belum lunas -->
<h4 class="text-center text-success"><strong>Total Tagihan Belum Lunas: <?php echo $totalTagihanBelumLunas ?></strong></h4>
<!-- total nominal pembayaran -->
<h4 class="text-center text-info"><strong>Total Jumlah Tagihan: <?php echo 'Rp'.number_format($totalNonimalPembayaran, 0, ',', '.') ?></strong></h4>
<!-- total tagihan sudah dibayar pembayaran -->
<h4 class="text-center text-info"><strong>Total Jumlah Tagihan yang sudah dibayar: <?php echo 'Rp'.number_format($totalYangSudahDibayar, 0, ',', '.') ?></strong></h4>


