<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #auth {
            width: 100%;
            max-width: 800px; /* Sesuaikan lebar halaman sesuai kebutuhan */
        }

        #auth #auth-left .auth-logo {
            margin-bottom: 10rem;
        }

        .auth-logokoanan  {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin: 0;
        }

        .auth-logokoanan img {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin: 0;
        }
        .auth-logo  {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 1vh;
            margin: 0;
        }
        .auth-logo img {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 1vh;
            margin: 0;
        }
    </style
</head>

<body style="background-color: rgb(3, 11, 94)">
    
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
            <div class="auth-logokoanan">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Partai_NasDem.svg/2048px-Partai_NasDem.svg.png" style="" alt="Logo">
            </div>
        </div>
    </div>
    <div id="auth" style="background-color: white">
        <div class="row h-200">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h1 class="auth-title">Pasti Menang!!!</h1>
                    </div>
                    <h1 class="auth-subtitle mb-1">Selamat datang</h1>
                    <p class="auth-subtitle mb-5">Silahkan login data menggunakan username dan password.</p>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="email" class="form-control form-control-xl <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"  placeholder="email">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>  
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                                
                </div>
            </div>
            
        </div>
        
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\electionina\resources\views/welcome.blade.php ENDPATH**/ ?>