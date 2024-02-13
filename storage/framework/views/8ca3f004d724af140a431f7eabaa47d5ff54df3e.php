
<?php $__env->startSection('title'); ?>
    HOME
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="app">
    <div id="main">
        <div class="page-content">
            
        </div>
    </div>
</div>
<script src="<?php echo e(asset('assets/extensions/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/dashboard.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1578562/public_html/pengingatobat.com/resources/views/home.blade.php ENDPATH**/ ?>