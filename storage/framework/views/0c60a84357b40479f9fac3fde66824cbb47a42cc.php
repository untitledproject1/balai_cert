<?php $__env->startSection('card-header', 'Sukses Register'); ?>

<?php $__env->startSection('content-navbar'); ?>


<div class="container all_center">
    <div class="row">
        <div class=" col-md-6 col-sm-12" style="margin-top: 150px;">
           <img src="<?php echo e(asset('images/sukses-register.png')); ?>" class="sukses_regis_inner img-fluid">
        </div>

        <div class="col-sm-12 col-md-6" style="margin-top: 250px;">
            <div class="text-center align-middle">
                <?php if(session('resent')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(__('Link verifikasi baru telah dikirim ke email anda.')); ?>

                    </div><br>
                <?php endif; ?>
                <h2>Registrasi Berhasil!</h2>
                <h4>Silahkan cek E-mail anda untuk verifikasi</h4>
                <br>
                <p>Tidak menerima E-mail atau link verifikasi tidak bekerja? <a href="<?php echo e(route('verification.resend')); ?>"><b>Kirim Ulang</b></a></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/auth/verify.blade.php ENDPATH**/ ?>