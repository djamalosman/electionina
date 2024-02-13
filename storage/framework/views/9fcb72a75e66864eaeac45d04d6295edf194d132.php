
<?php $__env->startSection('title'); ?>
    HOME
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
    
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Vote Caleg  </h3>
                    
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Calculate</li>
                            </ol>
                        </nav>
                        
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Data Vote Caleg
                    </div>
                    <div class="card-header">
                     
                   
                            

                    </div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Partai</th>
                                    <th>Nama Caleg</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>TPS</th>
                                    <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($header->name_partai); ?></td>
                                        <td><?php echo e($header->name_caleg); ?></td>
                                        <td><?php echo e($header->nama_kecamatan); ?></td>
                                        <td><?php echo e($header->nama_desa); ?></td>
                                        <td><?php echo e($header->name_tps); ?></td>
                                        <td><?php echo e($header->total_suara); ?></td>
                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-script'); ?>
<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="assets/js/pages/datatables.js"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\electionina\resources\views/calculate/index.blade.php ENDPATH**/ ?>