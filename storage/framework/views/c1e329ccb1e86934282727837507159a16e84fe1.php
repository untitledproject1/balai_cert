<button type="button" class="add_messages_floating" data-toggle="modal" data-target="#modalTambahPesan">
    <img style="width: 30px;" src="<?php echo e(asset('images/icon/help.svg')); ?>" alt=""> &nbsp; Kirim Pesan
</button>

<!-- Modal -->
<div class="modal fade" id="modalTambahPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Kirim Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Kepada</label>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Pemasaran</option>
                            <option value="2">Kerjasama</option>
                            <option value="3">Sertifikasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Produk</label>
                        <input class="form-control" type="text" value="Keramik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tahap Sertifikasi</label>
                        <input class="form-control" type="text" value="Apply SA" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Pesan</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3" placeholder="Isi pesan.."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="reset_btn">Reset</button>
                        <button type="button" class="submit_btn ml-3">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/balai-cert/resources/views/pesan/add_messages.blade.php ENDPATH**/ ?>