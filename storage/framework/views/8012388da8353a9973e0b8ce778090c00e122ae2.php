<?php $__env->startSection('card-header', 'Buat MOU'); ?>

<?php $__env->startSection('second-content'); ?>
<div class="col-lg-9">
    <div class="wrap_content">
        <?php if((!is_null($dok) && $dok->sni == 1 && is_null($mou)) || (!is_null($mou) && $mou->status == null)): ?>
        <center>
            <p class="alert alert-success">Client sudah melengkapi dokumen sertifikasi awal</p>
        </center>
        <h4 class="mb-3">Form pembuatan MOU &nbsp; <span class="generate_form align-middle">GENERATE PDF</span></h4>
        <form id="createMouForm" method="POST" action="<?php echo e(url('/mou_create/'.$idProduk.'/'.$user->id)); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_name" value="<?php echo e($produk->produk); ?>">
            <input type="hidden" name="company_name" value="<?php echo e($user->nama_perusahaan); ?>">
            <div class="row">
                <div class="col-lg-6">
                    <label>Nomor Surat</label><br>
                    <input type="text" class="form-control textI" name="no_mou" required="">
                    <small class="form-text text-muted">Nomor surat wajib diisi</small>
                    <?php if(!is_null($no_surat_mou)): ?>
                    <b><i>Nomor Surat Terakhir:</i> &nbsp;<?php echo e($no_surat_mou->no); ?></b>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <label>Tanggal Pembuatan Kontrak</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="d_kontrak" class="minDate form-control textI" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                    </div>

                    <small class="form-text text-muted">Tanggal pembuatan kontrak wajib diisi</small>
                </div>
            </div>
            <br>
            <label>Biaya Sertifikat Produk untuk Tanda SNI</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input class="form-control bpText" type="text" name="b_sert" min="0" placeholder="0" aria-label="Amount (to the nearest rupiah)">
            </div>
            <i><b>Default Harga : </b> Rp.<?php echo e(number_format($defaultHarga->harga, '0', ',', '.')); ?></i>
            <br>
            
            <div style="background: #E3F2FD; margin: 0 -20px 0 -20px;" class="mt-3 mb-2 p-3">
              <div class="row no-gutters">
                  <div class="col-lg-1">
                      <img style="width: 30px;" src="<?php echo e(asset('images/icon/light-bulb-info.svg')); ?>" data-toggle="tooltip" data-placement="top" title="Bantuan" alt="">
                  </div>
                  <div class="col-lg-11 pl-2 pr-2">
                      <p style="color: #0D47A1;">Jika <b>Biaya Sertifikat Produk untuk Tanda SNI</b> tidak diisi, maka akan memakai <b>Default Harga</b></p>
                  </div>
              </div>
            </div>
            
            <div id="validMsg"></div><br>
            <button type="reset" class="reset_btn mr-3">Reset</button>
            <button type="button" class="submit_btn" onclick="ValidateSize('null', '.textI', '#createMouForm', '#validMsg')">Buat MOU</button>
        </form>
        <?php elseif(!is_null($mou) && $mou->status === 3): ?>
            <center>
                <p class="alert alert-warning">Harap untuk men-upload MOU yang sudah ditandatangani oleh ketua BBK</p>
            </center>
            <div class="text-center">
                <a href="<?php echo e(url('/doc/download/mou/'.$mou->mou)); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download MOU
                    </div>
                </a>
            </div>
            <form id="uploadMouBBK" method="POST" action="<?php echo e(url('/mou_bbk/'.$idProduk)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="company_name" value="<?php echo e($user->nama_perusahaan); ?>">
                <label>Upload MOU</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input uploadMou" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="mou" required="">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                    <small class="form-text text-muted">Format file yang diizinkan <b>.pdf</b> </small>
                    <small class="form-text text-muted">Ukuran maksimal file: <b>5 Mb</b> </small>
                </div><br>
                <div class="validMsg"></div><br>
                <button type="button" class="submit_btn" onclick="ValidateSize('.uploadMou', '', '#uploadMouBBK')">Upload</button>
            </form>
        <?php elseif(!is_null($mou) && $mou->status === 1 && strtotime(date('Y-m-d')) <= strtotime($mou->tgl_exp)): ?>
            <center>
                <p class="alert alert-success">MOU telah dibuat!.<br> 
                    Client harus upload MOU sebelum tanggal <b><?php echo e(date('d-m-Y', strtotime($mou->tgl_exp))); ?></b>.
                    
                </p>
            </center><br>
            <div class="text-center">
                <a href="<?php echo e(url('/doc/download/mou/'.$mou->mou)); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download MOU
                    </div>
                </a>
            </div>
        <?php elseif(!is_null($mou) && strtotime(date('Y-m-d')) > strtotime($mou->tgl_exp) && $mou->status === 1 ): ?>
            <br>
            <center>
                <p class="alert alert-warning">Fitur upload MOU yang sudah ditandatangani client telah dikunci!</p>
            </center>
            <form id="mouUnlockSubmit" method="POST" action="<?php echo e(url('/unlock_mou/'.$produk->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="text-center">
                    <button type="button" class="submit_btn" onclick="ValidateSize('', '', '#mouUnlockSubmit', '')">Buka Fitur MOU</button>
                </div>
            </form>
        <?php elseif(!is_null($mou) && $mou->status == 2): ?>
            <br>
            <center>
                <p class="alert alert-success">Client sudah selesai upload MOU yang sudah ditandatangani!</p>
            </center>
            <div class="text-center">
                <a href="<?php echo e(url('/doc/download/mou/'.$mou->mou)); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download MOU
                    </div>
                </a>
            </div>
        <?php else: ?>
            <center>
                <p class="alert alert-primary">Client belum melengkapi dokumen sertifikasi awal </p>
            </center>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/mou/mou.blade.php ENDPATH**/ ?>