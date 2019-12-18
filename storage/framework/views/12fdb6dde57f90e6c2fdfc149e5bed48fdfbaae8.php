<?php $__env->startSection('card-header', 'Riwayat Sertifikasi Produk'); ?>

<?php $__env->startSection('content'); ?>

<!-- Toast -->
<?php if(isset($flashInfo) && !empty($flashInfo)): ?>
    <?php $__currentLoopData = $flashInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!is_null($data)): ?>
        <div class="toast position-fixed mt-3 mr-3" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
          <div class="toast-header py-2">
            <img src="<?php echo e(asset('images/icon/info-button.png')); ?>" alt="...">
            <strong class="mr-auto ml-2">Info</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
              <p><b><?php echo e($data); ?></b>
              <br><br>
              <br><br>
              <button type="button" class="btn-footer" data-dismiss="toast" aria-label="Close">Mengerti</button></p>
          </div>
        </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<div class="dashboard_wrapper">
    

    
    <div class="wrap_content">
        <?php if(!$produk->isEmpty()): ?>
        <h3>List Sertifikasi Produk Yang Sudah Selesai</h3>
        <br>
        
        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="27%">Produk</th>
                    <th width="25%">Kategori</th>
                    <th width="30%">Tahap Sertifikasi</th>
                    <th width="10%">Lihat Produk</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php echo e($key = 0); ?> -->
                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="table_data">
                    <td><?php echo e($key+=1); ?></td>
                    <td><h6><?php echo e($data->produk); ?></h6></td>
                    <td><?php echo e($data->jenis_produk); ?></td>
                    <td>
                        
                        
                        <div class="tahap_sert_on">
                        
                        <?php if(!is_null($data->kode_tahap) && intval($data->kode_tahap) !== 10): ?>
                            <?php if(intval($data->kode_tahap) === 23): ?>
                                <?php $__currentLoopData = $tahap_sert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( intval($data->kode_tahap) == intval($tahap->kode_tahap) ): ?>
                                    <?php echo e($tahap->tahapan); ?><br><small>(Menunggu penerimaan sertifikat oleh client)</small>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php elseif(intval($data->kode_tahap) === 24): ?>
                                &nbsp;Sertifikat telah diterima
                            <?php else: ?>
                                <?php $__currentLoopData = $tahap_sert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( intval($data->kode_tahap)+1 == intval($tahap->kode_tahap) ): ?>
                                    <?php echo e($tahap->tahapan); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10): ?>
                            <?php $__currentLoopData = $tahap_sert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(intval($data->kode_tahap) == intval($tahap->kode_tahap)): ?>
                                <?php echo e($tahap->tahapan); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        Tidak ada sertifikasi produk yang berjalan
                        <?php endif; ?>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <a class="view_produk" href="<?php echo e(url('/verify_terimaSert/'.$data->id)); ?>">Tinjau</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php else: ?>
        <h4>Belum ada sertifikasi yang sudah selesai</h4>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/dashboard/history.blade.php ENDPATH**/ ?>