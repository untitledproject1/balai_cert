<div class="col-lg-3 col-md">
    <div class="wrap_content font-tahap">
        <h4 class="mb-3">Tahap Sertifikasi</h4>
        

        
        <?php $__currentLoopData = $tahap_sert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($tahap->kode_tahap !== 10): ?>
                <?php if(( $kode_tahap == 10 && $tahap->kode_tahap == 10 ) || ( $tahap->kode_tahap == $kode_tahap + 1 )): ?>
                <label class="container_checkbox_display on_process"><?php echo e($tahap->tahapan); ?>

                    <img class="img_process" style="width: 25px;" src="<?php echo e(asset('images/process.svg')); ?>" data-toggle="tooltip" data-placement="top" title="Sedang Berjalan" alt="">
                </label>
                <?php else: ?>
                <label class="container_checkbox_display"><?php echo e($tahap->tahapan); ?>

                    <div style="margin-right: 10px;">
                        <input class="font-tahap-icon" type="checkbox" <?php echo e($tahap->kode_tahap <= $kode_tahap ? 'checked' : ''); ?> disabled>
                        <span class="checkmark_display"></span>
                    </div>
                </label>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        


</div>
</div>

<!-- Tooltip -->
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php /**PATH /var/www/html/balai-cert/resources/views/tahap_sert.blade.php ENDPATH**/ ?>