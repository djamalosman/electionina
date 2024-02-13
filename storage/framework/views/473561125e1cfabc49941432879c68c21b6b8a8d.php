

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Data Obat</h3>
                <p class="text-subtitle text-muted">...</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Update</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Obat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Data Obat</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
                            <form action="/obatupdate/<?php echo e($getDataDetails->id_obat); ?>" method="POST" class="form" data-parsley-validate>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Kode Obat</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama Passien" name="code" data-parsley-required="true" value="<?php echo e($getDataDetails->code); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Nama Obat</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Nama Passien" name="name"data-parsley-required="true" value="<?php echo e($getDataDetails->name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Satuan</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="satuan" name="satuan" data-parsley-required="true"value="<?php echo e($getDataDetails->satuan); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Category</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Category" name="category" data-parsley-required="true"value="<?php echo e($getDataDetails->category); ?>">
                                        </div>
                                    </div>                     
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Brand</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Brand" name="brand" data-parsley-required="true"value="<?php echo e($getDataDetails->brand); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" ><?php echo e($getDataDetails->description); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <button class="btn btn-light-info me-1 mb-1"><a href ="/pasien/index">Back</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\patientmedication\resources\views/obat/update.blade.php ENDPATH**/ ?>