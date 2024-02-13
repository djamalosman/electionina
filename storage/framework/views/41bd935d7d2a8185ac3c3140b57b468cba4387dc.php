

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pasien</h3>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Pasien
            </div>
            <div class="card-body">
                <div class="buttons">
                    <a href="createviews" class="btn btn-primary">Create</a>
                </div>
                <table class="cell-border" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Pasien</th>
                            <th>Nama</th>
                            <th>No KTP</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $getDataAllList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($data->code); ?></td>
                                <td><?php echo e($data->name); ?></td>
                                <td><?php echo e($data->no_ktp); ?></td>
                                <td>
                                    <a href ="detailspasien/<?php echo e($data->id_pasien); ?>"><span class="badge bg-success">Detail</span></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<script src="<?php echo e(asset('assets/extensions/simple-datatables/umd/simple-datatables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/simple-datatables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\patientmedication\resources\views/pasien/pasien.blade.php ENDPATH**/ ?>