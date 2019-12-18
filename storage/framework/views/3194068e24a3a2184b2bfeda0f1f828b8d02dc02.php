<?php $__env->startSection('card-header', 'Form Waktu Pembayaran'); ?>


<?php $__env->startSection('second-content'); ?>

<div class="col-lg-9">
    <div class="wrap_content">
        <?php $__env->startComponent('stepper'); ?> client,3,<?php echo e($idProduk); ?>,<?php echo e($kode_tahap); ?> <?php echo $__env->renderComponent(); ?>
        
        <hr>
        <?php if(\Session::has('errMsg')): ?>
        <p class="pl-3 alert alert-danger"><?php echo e(\Session::get('errMsg')); ?></p>
        <?php endif; ?>
        <?php if(is_null($bidPrice)): ?>
        <center>
            <p class="alert alert-primary">Penawaran Harga belum dibuat</p>
        </center>
        <?php elseif(!is_null($bidPrice) && $bidPrice->status == 1 && is_null($bidPrice->bukti_bayar)): ?>
            <?php if(is_null($bidPrice->invoice_id) && $bidPrice->status == 1): ?>
            <div class="text-center">
                <a href="<?php echo e(url('/doc/download/bidPrice/'.$bidPrice->bid_price)); ?>" target="_blank">
                    <div class="download_file">
                        <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                    </div>
                </a>
            </div>
            
                <?php if(is_null($bidPrice->tanggal_bayar)): ?>
                <p>Masukan tanggal pembayaran</p>
                <form id="tglBayarForm" method="POST" action="<?php echo e(url('/form_bayar/'.$idProduk)); ?>">
                    <?php echo csrf_field(); ?>
                    <label>Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="tgl" class="minDate form-control tglBayar" data-language="en" data-date-format="dd-mm-yyyy" onkeydown="return false;" placeholder="dd-mm-yyyy" />
                    </div>
                    <br>                
                    <div class="validMsg"></div>
                    <button type="button" class="submit_btn mt-3" onclick="ValidateSize('', '.tglBayar', '#tglBayarForm', '.validMsg')">Submit</button>
                </form>
                <?php else: ?>
                <b><i>Form Waktu Pembayaran telah diisi.</i></b><br>
                Tanggal pembayaran: &nbsp; <b><?php echo e(date('d-m-Y', strtotime($bidPrice->tanggal_bayar))); ?></b><br>
                <?php endif; ?>
                <br>
            <center>
                <p class="alert alert-success">Penawaran Harga telah disetujui oleh Kabid PJT. Tunggu Pembuatan Invoice dan Kode Biling dari Seksi Keuangan</p>
            </center>
            <?php elseif(!is_null($bidPrice->invoice_id) && !is_null($invoice->status)): ?>
            <center>
                <p class="alert alert-success">Invoice telah dibuat. 
                    <?php if(!is_null($invoice->kode_biling)): ?>
                    Maksimal Waktu Pembayaran : <b><?php echo e(date('d-m-Y', strtotime($waktuKodeBiling))); ?></b>.<br>Upload Bukti Pembayaran di tahap selanjutnya
                    <?php else: ?>
                    <br>
                    Kode Biling belum diupload oleh Seksi Keuangan
                    <?php endif; ?>
                </p>
            </center>
            <?php endif; ?>
        <?php elseif( !is_null($bidPrice) && (!is_null($bidPrice->bukti_bayar) || !is_null($bidPrice->invoice_id))): ?>
            <center>
                <p class="alert alert-success">
                    <?php if(!is_null($invoice->kode_biling)): ?>
                    Maksimal Waktu Pembayaran : <b><?php echo e(date('d-m-Y', strtotime($waktuKodeBiling))); ?></b>.
                        <?php if(!is_null($bidPrice->bukti_bayar)): ?>
                        <br>Bukti Pembayaran telah diupload
                        <?php else: ?>
                        <br>Upload Bukti Pembayaran di tahap selanjutnya
                        <?php endif; ?>
                        <br>
                    <?php else: ?>
                    Kode Biling belum diupload oleh Seksi Keuangan
                    <?php endif; ?>
                </p>
            </center>
        <?php else: ?>
            <center>
                <p class="alert alert-primary">Tunggu Apporval Penawaran harga dari Kabid PJT</p>
            </center>
        <?php endif; ?>
        <?php if(!is_null($bidPrice) && !is_null($bidPrice->invoice_id) && $bidPrice->status == 1 && !is_null($invoice->status)): ?>
        <div class="row">
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="<?php echo e(url('/doc/download/bidPrice/'.$bidPrice->bid_price)); ?>" target="_blank">
                        <div class="download_file">
                            <i class="fas fa-download"></i>&nbsp; Download Dokumen Penawaran Harga
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="<?php echo e(url('/doc/download/invoice/'.$invoice->invoice)); ?>" target="_blank">
                        <div class="download_file text-center">
                            <i class="fas fa-download"></i>&nbsp; Download Invoice
                        </div>
                    </a>
                </div>
            </div>
            <?php if(!is_null($invoice->kode_biling)): ?>
            <div class="col-lg align-self-center">
                <div class="text-center">
                    <a href="<?php echo e(url('/doc/download/kodeBiling/'.$invoice->kode_biling)); ?>" target="_blank">
                        <div class="download_file text-center">
                            <i class="fas fa-download"></i>&nbsp; Download Kode Biling
                        </div>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <br>
        <div class="row mt-4 mb-4">
            <div class="col-lg-6 text-left">
                <a href="<?php echo e(url('/mou/'.$idProduk)); ?>" class="stepper_btn_prev"><i class="fas fa-chevron-left"></i> &nbsp; Tahap Sebelumnya</a>
            </div>
            <?php if($kode_tahap >= 15): ?>
            <div class="col-lg-6 text-right">
                <a href="<?php echo e(url('/bukti_bayar/'.$idProduk)); ?>" class="stepper_btn_next">Tahap Selanjutnya &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/bidPrice/form_bayar.blade.php ENDPATH**/ ?>