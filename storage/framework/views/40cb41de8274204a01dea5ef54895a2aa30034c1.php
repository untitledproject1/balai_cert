<?php $__env->startSection('content-navbar'); ?>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <section class="login_content">
            <div class="login_inner">
                <div class="row">

                    <div class="col-lg-4">
                    <!-- ===== Image Here ====== -->
                    </div>

                    <div class="col-lg-8 align-self-center">
                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                            <script>
                                swal({
                                    title: "Login Gagal!",
                                    text: "Harap cek kembali email dan password anda!",
                                    icon: "warning",
                                });
                            </script>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        <a class="back_btn_icon" href="<?php echo e(url('')); ?>"><img src="<?php echo e(asset('images/icon/left-arrow.png')); ?>" alt="" title="Kembali ke home"></a>
                        <div class="container">
                            <h1>Login</h1>
                            <h6>Selamat Datang Kembali</h6>
                            <br>
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="email"><?php echo e(__('E-Mail Address')); ?></label>

                                    <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="bebas1@gmail.com" required autocomplete="email" autofocus>

                                    

                                </div>

                                <div class="form-group">
                                    <label for="password"><?php echo e(__('Password')); ?></label>

                                    <input id="password" type="password" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" value="12345678">

                                    

                                </div>

                                <div class="form-group">

                                    <label class="container_checkbox" for="remember">
                                        <?php echo e(__('Ingatkan saya')); ?>

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <span class="checkmark_checkbox"></span>
                                    </label>

                                    
                                </div>

                                <button type="submit" class="full_btn">
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <p class="text-center mt-5"><span style="font-weight: 500;">Tidak punya akun ?</span> <b><a href="<?php echo e(route('register')); ?>">Register</a></b></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/balai-cert/resources/views/auth/login.blade.php ENDPATH**/ ?>