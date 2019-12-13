<?php $__env->startComponent('mail::message'); ?>
Selamat!

Registrasi telah selesai<br>
Tolong klik tombol dibawah ini untuk memverifikasi email anda

<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
Verifikasi Alamat Email
<?php echo $__env->renderComponent(); ?>

Terima Kasih,<br>
<?php echo e(config('app.name')); ?><br>

<small>Jika anda mendapat masalah saat men-klik tombol verifikasi, salin alamat dibawah ke browser anda:<br><?php echo e($url); ?></small>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/balai-cert/resources/views/emails/verify-email.blade.php ENDPATH**/ ?>