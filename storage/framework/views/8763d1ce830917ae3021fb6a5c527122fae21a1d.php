
<?php $__env->startSection('title'); ?>
    HOME
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="app">
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Input Tps</h3>
                        
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Data Tps</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input Tps</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card col-12 col-md-6 col-lg-6">
                    <div class="card-header">
                        <h4 class="card-title">Input Tps</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Input Tps</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">Middle</button>
                    </div>
                </div>
                
            </section>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\election_ina\resources\views/tps.blade.php ENDPATH**/ ?>