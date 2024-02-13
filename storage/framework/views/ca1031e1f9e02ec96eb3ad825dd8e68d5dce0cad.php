

<?php $__env->startSection('title'); ?>
HOME
<?php $__env->stopSection(); ?>


<style>
    .card-content {
        margin-top: -40px
    }
</style>

<?php $__env->startSection('content'); ?>
    <div id="app">

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
                            <h3>Obat</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Gate</a></li>
                                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Obat</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>



                <section class="section">
                    <div class="card">
                        <div class="card-header">
                     
                            <a href="<?php echo e(route('Obat.create')); ?>" type="button" id="create"
                                class="btn btn-outline-success"> Create</a>
                      
                                <?php if($message = Session::get('message')): ?>
                                <div class="alert alert-success alert-dismissible show fade" style="margin-top: 10px">
                                    <?php echo e($message); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th nowrap>Action</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Brand</th>
                                                <th>Category</th>
                                                <th>Satuan</th>
                                                <th>Description</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php $no = 1; ?>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td> <a href="<?php echo e(url('/Obat/edit/' . $header->id)); ?>"
                                                        id="btn-edit-post" class="btn btn-xs btn-primary"><i
                                                            class="fa fa-edit" title="Edit Data"></i></a>
                                                    <a href="#"
                                                        id="btn-delete-post" data-id="<?php echo e($header->id); ?>"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"
                                                            title="Delete Data"></i></a>
                                                </td>           
                                                                                  
                                                <td><?php echo e($header->code); ?></td>
                                                <td><?php echo e($header->name); ?></td>
                                                <td><?php echo e($header->brand); ?></td>                                       
                                                <td><?php echo e($header->category); ?></td>                                       
                                                <td><?php echo e($header->satuan); ?></td> 
                                                <td><?php echo e($header->description); ?></td> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>



                    </div>

                </section>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-script'); ?>
<script src="<?php echo e(asset('assets/extensions/jquery/jquery.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?php echo e(asset('assets/js/pages/datatables.js')); ?>"></script>
    
    <script>
        $(document).ready(function() {
            // ShowData()
            // ProjectFind()
           
            $('#exampleModal').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
            $('#exampleModalV2').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });

        })

        $('body').on('click', '#btn-delete-post', function() {
            let id = $(this).data('id');
            var base_url = "<?php echo e(url('/Obat/')); ?>";
            var get_item_url = base_url + "/delete/" + id;
            Swal.fire({
                title: 'Are You Sure?',
                text: "Delete Data !!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'NO',
                confirmButtonText: 'YES, DELETE!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //fetch to delete data
                    $.ajax({
                        type: "PUT",
                        url: get_item_url,
                        cache: false,
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(response) {

                            //show success message
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: "Delete Data Successfully",
                                showConfirmButton: false

                            });
                            window.location.reload();
                

                        }
                    });
                }
            })
        });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\patientmedication\resources\views/obat/index.blade.php ENDPATH**/ ?>