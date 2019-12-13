<?php $__env->startSection('card-header', 'Dasboard'); ?>

<?php $__env->startSection('second-content'); ?>

<div class="col-lg">
    <div class="wrap_content">
       <div class="card mt-3 p-3">
           <div class="card-body">
             <div class="text-center">
                 <img style="width: 250px;" src="<?php echo e(asset('images/empty-superAdmin.png')); ?>" alt="">
                <h3 class="mt-3">Beberapa konten akan ada di sini</h3>
             </div>
           </div>
       </div>
       
        <!-- row area end -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/superAdmin/dashboard-superAdmin.blade.php ENDPATH**/ ?>