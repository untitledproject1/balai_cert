<?php $__env->startSection('card-header', 'Dasboard'); ?>

<?php $__env->startSection('second-content'); ?>

<div class="col-lg">
    <div class="wrap_content">
        <div class="card mt-3 p-3">
            <div class="card-body">
                <h5>Atur Format File</h5><br>

                <button type="button" class="btn btn-primary ubah_format" data-toggle="modal" data-target=".bd-example-modal-lg" data-url="<?php echo e(Route('format_file_ubah')); ?>" data-judul="Tambah Format File">+ Tambah Data</button>
                <br><br>

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
                            <th width="22%">Format</th>
                            <th width="25%">Nama File</th>
                            <th width="20%">Tanggal Perubahan Dokumen</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php echo e($key = 0); ?> -->
                        <?php $__currentLoopData = $format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table_data">
                            <td><?php echo e($key+=1); ?></td>
                            <td><?php echo e($data->format); ?></td>
                            <td><?php echo e($data->file); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($data->updated_at))); ?></td>
                            <td class="text-center align-middle">
                                <form class="HapusFormatFile" method="POST" action="<?php echo e(Route('format_file_hapus', ['id' => $data->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <a class="pr-2" style="font-size: 13px;" href="<?php echo e(url('/doc/download/format_dok/'.$data->file)); ?>" title="Download">
                                        <div class="download_file">
                                            <i class="fas fa-download fa-lg"></i>
                                        </div>
                                    </a>
                                    <a class="ubah_format pr-2" style="font-size: 13px;" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" data-format="<?php echo e($data->format); ?>" data-url="<?php echo e(Route('format_file_ubah', ['id' => $data->id])); ?>" data-judul="Ubah Format File" title="Edit">
                                        <div class="edit_file">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </div>
                                    </a>
                                    
                                    <button type="button" class="delete_file" style="font-size: 13px;" onclick="ValidateSize('', '', '.HapusFormatFile')" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            
                            <form id="UbahFormatFile" method="POST" action="" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                <label>Format</label>
                                <select class="form-control formatDok" name="formatDok">
                                    <option selected=""> -- Pilih Format -- </option>
                                    <option>Surat Permohonan F.03.01</option>
                                    <option>Surat Pemberitahuan Jadwal Audit</option>
                                    <option>Audit Plan</option>
                                    <option>Sampling Plan</option>
                                    <option>Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI</option>
                                </select>
                                <small class="form-text text-muted">Wajib diisi</small><br>
                                <label>File</label>
                                <div class="custom-file">
                                    <input type="file" class="file_format custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file" required="">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih File..</label>
                                    <small class="form-text text-muted">Wajib diisi</small>
                                </div>
                                <br><br>
                                <div class="validMsg"></div><br>
                                <button type="reset" class="reset_btn mr-2">Reset</button>
                                <button type="button" class="submit_btn" onclick="ValidateSize('.file_format', '.formatDok', '#UbahFormatFile', '.validMsg')">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).on("click", ".ubah_format", function() {
        $('#UbahFormatFile').prop('action', $(this).data('url'));
        $('.formatDok').val($(this).data('format'));
        $('.modal-title').html($(this).data('judul'));
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/superAdmin/format_file.blade.php ENDPATH**/ ?>