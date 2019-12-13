<?php $__env->startSection('card-header', $card_header); ?>

<?php $__env->startSection('second-content'); ?>

<div class="col">
    <div class="wrap_content">
        
        <?php if(!$client->isEmpty()): ?>
        <div class="row title_list pt-2 pb-2">
            <div class="col-lg">
                <h6 class="mb-4">
                    List Sertifikasi Produk Yang 
                    <?php if($status == 'history'): ?>
                    Sudah Selesai
                    <?php else: ?>
                      <?php if($status == 'all'): ?>
                      Sudah Dikerjakan 
                      <?php else: ?>
                      Sedang Dalam Proses Pengerjaan
                      <?php endif; ?>
                    <?php endif; ?>
                </h6>
                
            </div>
        </div>
        
        
          <table id="example" class="table" style="width:100%">
              <thead>
                  <tr>
                      <th width="5%">No</th>
                      <th width="15%">Produk</th>
                      <th width="15%">Tanggal Apply</th>
                      <th width="20%" style="align-self: center;">Perusahaan</th>
                      <th width="25%">Kontak Perusahaan</th>
                      <th width="28%">Tahap Sertifikasi</th>
                      <th width="10%">Lihat Produk</th>
                  </tr>
              </thead>

              <tbody style="font-size: 15px;">
                <!-- <?php echo e($key = 0); ?> -->
                  <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="table_data">
                      <td ><?php echo e($key+=1); ?></td>
                        <td><h6><?php echo e(ucfirst($data->produk)); ?></h6><?php echo e($data->jenis_produk); ?></td>
                        <td><?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></td>
                      <td ><h6><?php echo e($data->nama_perusahaan); ?> <span style="font-size: 12px;" class="<?php echo e($data->negeri == 1 ? 'info_jenis_dalam' : 'info_jenis_impor'); ?>"><?php echo e($data->negeri == 1 ? 'produsen' : 'importir'); ?></span></h6><span><?php echo e($data->pimpinan_perusahaan); ?></span></td>
                      <td>
                         <div class="row no-gutters">
                             <div class="col-lg-1 col-md-1">
                                 <i class="fas fa-map-marker-alt"></i>
                             </div>
                             <div class="col-lg-11 col-md-11">
                                 <?php echo e($data->provinsi); ?>, <?php echo e($data->kota); ?>, <?php echo e($data->alamat_perusahaan); ?>

                             </div>
                         </div>
                         <div class="row no-gutters">
                             <div class="col-lg-1 col-md-1">
                                 <i class="fas fa-at"></i>
                             </div>
                             <div class="col-lg-11 col-md-11">
                                 <?php echo e($data->email_perusahaan); ?>

                             </div>
                         </div>
                         <div class="row no-gutters">
                             <div class="col-lg-1 col-md-1">
                                 <i class="fas fa-phone"></i>
                             </div>
                             <div class="col-lg-11 col-md-11">
                                 <?php echo e($data->no_telp); ?>

                             </div>
                         </div>
                      </td>
                      <td>
                          <div class="
                                  <?php if(is_null($data->tahapan)): ?>
                                      tahap_sert_off
                                  <?php elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10): ?>
                                      tahap_sert_on
                                  <?php else: ?>
                                      tahap_sert_on
                                  <?php endif; ?>
                              ">
                              <?php if(!is_null($data->kode_tahap) && intval($data->kode_tahap) !== 10): ?>
                                  <?php if(intval($data->kode_tahap === 23)): ?>
                                  <?php echo e($data->tahapan); ?><br><small>(Menunggu penerimaan sertifikat oleh client)</small>
                                  <?php elseif(intval($data->kode_tahap === 24)): ?>
                                  &nbsp;Client sudah menerima sertifikat
                                  <?php else: ?>
                                  	<?php $__currentLoopData = $tahap_sert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  		<?php if( intval($data->kode_tahap)+1 == $tahap->kode_tahap ): ?>
  		                                <?php echo e($tahap->tahapan); ?>

  		                                <?php endif; ?>
  	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                              <?php elseif(!is_null($data->kode_tahap) && intval($data->kode_tahap) === 10): ?>
                              <?php echo e($data->tahapan); ?><br>
                              <?php else: ?>
                              Tidak ada sertifikasi produk yang berjalan
                              <?php endif; ?>
                          </div>
                      </td>
                      <td class="text-center align-middle"><a class="view_produk" href="<?php echo e(url('/'.$page($role, $data->kode_tahap).'/'.$data->id.'/'.$link($role).'/'.$data->produk_id)); ?>">Tinjau</a></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
        <?php else: ?>
            <?php if($status == 'history'): ?>
             <div class="text-center p-5">
                 <img style="width: 400px;" src="<?php echo e(asset('images/empty-data.png')); ?>" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang sudah selesai</h6>
             </div>
              <?php elseif($status == 'all'): ?>
              <div class="text-center p-5">
                 <img style="width: 400px;" src="<?php echo e(asset('images/no-action.png')); ?>" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang sedang berjalan</h6>
             </div>
             <?php else: ?>
             <div class="text-center p-5">
                 <img style="width: 400px;" src="<?php echo e(asset('images/no-action.png')); ?>" alt="">
                 <br>
                 <h6 class="info_text mt-4">Tidak ada sertifikasi yang harus dikerjakan</h6>
             </div>
             <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    
    
    $(document).ready(function() {
  $('.device-table').DataTable({
    "fixedHeader": {
      header: true,
    },
    "bLengthChange": false,
    "Filter": false,
    "Info": false,
  });

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/company/cert_list.blade.php ENDPATH**/ ?>