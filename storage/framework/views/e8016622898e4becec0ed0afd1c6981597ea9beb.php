<?php $__env->startSection('content'); ?>
    <?php if(isset($user) || $role == 'client'): ?>
    <div class="row justify-content-center mb-1">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-12">
                <div class="wrap_content">
                   <div class="row">
                       <div class="col-lg-8">
                           <div class="text-left">
                               <h4>Perusahaan</h4>
                                <h6>
                                    <?php if(isset($user)): ?>
                                    <?php echo e($user->nama_perusahaan); ?> <span class="<?php echo e($user -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor'); ?>"><?php echo e($user -> negeri == 1 ? 'produsen' : 'importir'); ?></span>
                                    <?php else: ?>
                                    <?php echo e($userAuth->nama_perusahaan); ?> <span class="<?php echo e($userAuth -> negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor'); ?>"><?php echo e($userAuth -> negeri == 1 ? 'produsen' : 'importir'); ?></span>
                                    <?php endif; ?>
                                    <?php if(isset($produk)): ?>
                                    - <?php echo e(is_object($produk) ? $produk->produk : $produk); ?>

                                    <?php endif; ?>
                                </h6>
                           </div>
                       </div>
                       <div class="col-lg-4 align-self-center">
                           <?php if($role != 'client'): ?>
                            <?php echo $__env->make('modal_all_doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="text-right">
                                <button type="button" class="modal_btn" data-toggle="modal" data-target=".modal-all-doc">Lihat Dokumen Pengajuan Sertifikasi</button>
                            </div>
                            <?php endif; ?>       
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<div class="container-fluid">
    <div class="row justify-content-center mb-1">
        <?php echo $__env->yieldContent('tahapan'); ?>
        <?php if( ($role == 'client' && isset($idProduk) && !is_null($idProduk)) || (isset($user) && isset($idProduk) ) ): ?>
        <?php echo $__env->make('tahap_sert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('pesan/add_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('second-content'); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/home.blade.php ENDPATH**/ ?>