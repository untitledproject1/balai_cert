<!-- <?php echo e($role = explode(',', htmlspecialchars($slot))[0]); ?> -->
<!-- <?php echo e($val = explode(',', htmlspecialchars($slot))[1]); ?> -->
<!-- <?php echo e($id = explode(',', htmlspecialchars($slot))[2]); ?> -->
<!-- <?php echo e($id2 = explode(',', htmlspecialchars($slot))[3]); ?> -->

<ul class="progress-indicator">
    <?php if($role == 'client'): ?>

	    <li class="<?php echo e(intval($val) >= 1 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && ($id2 >= 11 || $id2 == 0) ? url('/sa/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && ($id2 >= 11 || $id2 == 0) ? '' : 'cursor: default;'); ?>"><span class="bubble"></span> Apply Sertifikasi Awal </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 2 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 12 ? url('/mou/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 12 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Sign MOU </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 3 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 14 ? url('/form_bayar/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 14 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Form Waktu Pembayaran </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 4 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 15 ? url('/bukti_bayar/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 15 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Form Upload Bukti Pembayaran </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 5 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 17 ? url('/verify_dokSert/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 17 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Form Kelengkapan Laporan Audit Kecukupan sertifikasi Produk </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 6 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 20 ? url('/apprv_draftSert/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 20 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Approval Draft Sertifikasi Produk </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 7 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 22 ? url('/req_sert/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 22 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Request Kirim atau Ambil di BBK </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 8 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id != '' && $id2 >= 23 ? url('/verify_terimaSert/'.$id) : '#'); ?>" style="display:block;<?php echo e($id != '' && $id2 >= 23 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Verifikasi Penerimaan Sertifikat </a>
	    </li>

    <?php elseif($role == 'pemasaran'): ?>

		<!-- <?php echo e($id3 = explode(',', htmlspecialchars($slot))[4]); ?> -->
	    <li class="<?php echo e(intval($val) >= 1 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e(url('/company/'.$id.'/sert/'.$id2)); ?>" style="display:block;"> <span class="bubble"></span> Verifikasi Dokumen SA </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 2 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id3 >= 13 ? url('/bidPrice/'.$id.'/sert/'.$id2) : '#'); ?>" style="display:block;<?php echo e($id3 >= 13 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Penawaran Harga </a>
	    </li>
	    <li class="<?php echo e(intval($val) >= 3 ? 'completed' : ''); ?>">
	    	<a href="<?php echo e($id3 >= 22 ? url('/jadwalSert/'.$id.'/sert/'.$id2) : '#'); ?>" style="display:block;<?php echo e($id3 >= 22 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Penjadwalan Pengambilan atau Pengiriman Sertifikat </a>
	    </li>

	<?php else: ?>

		<!-- <?php echo e($id3 = explode(',', htmlspecialchars($slot))[4]); ?> -->
		<li class="<?php echo e(intval($val) >= 1 ? 'completed' : ''); ?>">
			<a href="<?php echo e($id3 >= 16 ? url('/company/'.$id.'/audit/'.$id2) : '#'); ?>" style="display:block;<?php echo e($id3 >= 16 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Surat Pemberitahuan Jadwal dan Tim Audit </a>
		</li>
        <li class="<?php echo e(intval($val) >= 2 ? 'completed' : ''); ?>">
        	<a href="<?php echo e($id3 >= 18 ? url('/auditPlan/'.$id.'/audit/'.$id2) : '#'); ?>" style="display:block;<?php echo e($id3 >= 18 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Upload Audit Plan, Sampling Plan, dan Pembuatan Dokumen Laporan Hasil Sertifikasi </a>
        </li>
        
        <li class="<?php echo e(intval($val) >= 3 ? 'completed' : ''); ?>">
        	<a href="<?php echo e($id3 >= 20 ? url('/draftSert/'.$id.'/audit/'.$id2) : '#'); ?>" style="display:block;<?php echo e($id3 >= 20 ? '' : 'cursor: default;'); ?>"> <span class="bubble"></span> Pembuatan Draft Sertifikasi </a>
        </li>

    <?php endif; ?>
</ul>
<?php /**PATH /var/www/html/balai-cert/resources/views/stepper.blade.php ENDPATH**/ ?>