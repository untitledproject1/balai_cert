<?php $__env->startSection('card-header', 'Manual Book User'); ?>

<?php $__env->startSection('second-content'); ?>
<div class="col-lg">
    <div class="wrap_content">
    	
    	<h5>Atur Manual Book User</h5><br>

        

        <?php if(\Session::has('msg')): ?>
        <p class="alert alert-primary"><?php echo e(\Session::get('msg')); ?></p>
        <?php endif; ?>

        <?php if(!$errors->isEmpty()): ?>
        <ul class="alert alert-danger">
            <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="pl-2"><?php echo e($error[0]); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>

        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="22%">Role User</th>
                    <th width="25%">Nama File</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <!-- <?php echo e($key = 0); ?> -->
            <?php $__currentLoopData = $manual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<?php if($data->role != 'super_admin'): ?>
                <tr class="table_data">
                    <td><?php echo e($key+=1); ?></td>
                    <td><?php echo e($data->role_name); ?></td>
                    <td><?php echo e(!is_null($data->manual) ? $data->manual : 'File belum ada'); ?></td>
                    <td class="text-center align-middle">
                        <form class="HapusFormatFile" method="POST" action="">
                            <?php echo csrf_field(); ?>
                            <?php if(!is_null($data->manual)): ?>
                            <a class="pr-2" style="font-size: 13px;" href="<?php echo e(url('/manual/download/'.$data->role)); ?>" title="Download">
                                <div class="download_file">
                                    <i class="fas fa-download fa-lg"></i>
                                </div>
                            </a>
                            <?php endif; ?>
                            <a class="ubah_manual pr-2" style="font-size: 13px;" href="#" data-toggle="modal" data-target=".ubah_manual_modal" data-role="<?php echo e($data->role_name); ?>" data-url="<?php echo e(Route('ubah_manual', ['id' => $data->id])); ?>" data-judul="Ubah Manual" title="Edit">
                                <div class="edit_file">
                                    <i class="fas fa-edit fa-lg"></i>
                                </div>
                            </a>
                            
                            
                        </form>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

       <div class="modal fade bd-example-modal-lg ubah_manual_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body">
                <div class="container p-3 pb-3">
                    
                    <form id="UbahManual" method="POST" action="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <label>Role</label>
                        <input type="text" class="form-control roleName" disabled="">
                        <small class="form-text text-muted">Wajib diisi</small><br>
                        <label>File</label>
                        <div class="custom-file">
                            <input type="file" class="file_manual custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file" required="">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                            <small class="form-text text-muted">Wajib diisi</small>
                        </div>
                        <br><br>
                        <div class="validMsg"></div><br>
                        <button type="reset" class="reset_btn mr-2">Reset</button>
                        <button type="button" class="submit_btn" onclick="ValidateSize('.file_manual', '', '#UbahManual', '.validMsg')">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

<script type="text/javascript">
    $(document).on("click", ".ubah_manual", function() {
        $('#UbahManual').prop('action', $(this).data('url'));
        $('.roleName').val($(this).data('role'));
        $('.modal-title').html($(this).data('judul'));
    });
</script>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/superAdmin/manual.blade.php ENDPATH**/ ?>