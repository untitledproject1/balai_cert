<?php $__env->startSection('card-header', 'Verifikasi Penerimaaan Sertifikat'); ?>

<?php $__env->startSection('second-content'); ?>
<div class="col-lg-9">
    <div class="wrap_content">
        <?php $__env->startComponent('stepper'); ?> client,8,<?php echo e($idProduk); ?>,<?php echo e($kode_tahap); ?> <?php echo $__env->renderComponent(); ?>
        <hr>

        <?php if(\Session::has('msg')): ?>
        <center><p class="alert alert-success"><?php echo e(\Session::get('msg')); ?></p></center>
        <?php endif; ?>

        <?php if(!is_null($produk) && $kode_tahap == 23): ?>
            <?php if($produk->request_sert == 'kirim' && !is_null($produk->resi_pengiriman)): ?>
            <center>
                <p class="alert alert-success">Waktu pengiriman sertifikat: <b><?php echo e(date('d-m-Y', strtotime($produk->tgl_request_sert))); ?></b></p>
            </center>
            <?php else: ?>
            <center>
                <p class="alert alert-success">Request pengambilan/pengiriman sertifikat: <b><?php echo e($produk->request_sert); ?></b></p>
            </center>
            <?php endif; ?>

        <h5>Verifikasi penerimaan sertifikat</h5>
        Apakah sertifikat telah diterima?
        <form id="verTerimaSert" method="POST" action="<?php echo e(url('/verify_terimaSert_post/'.$produk->id)); ?>"> 
            <?php echo csrf_field(); ?>
            <button class="submit_btn mt-3" type="button" onclick="ValidateSize('', '', '#verTerimaSert', '');">Ya</button>
        </form>

        <?php elseif(!is_null($produk) && $kode_tahap == 24): ?>
        <center>
            <center><p class="alert alert-success">Sertifikat telah diterima</p></center>
        </center>
        <h5>Verifikasi penerimaan sertifikat</h5>
        <p>Tanggal diterimanya sertifikat: <b><?php echo e(date('d-m-Y', strtotime($produk->tgl_terima_sert))); ?></b></p>
        <?php else: ?>
        <center>
            <center><p class="alert alert-warning">Penjadawalan Ambil/Kirim Sertifikat belum selesai</p></center>
        </center>
        <?php endif; ?>
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg">
                <a href="<?php echo e(url('/req_sert/'.$idProduk)); ?>" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
        </div>
        
    </div>                
</div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/draftSert/verify_terimaSert.blade.php ENDPATH**/ ?>