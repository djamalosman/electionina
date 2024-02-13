

<?php $__env->startSection('title'); ?>
    HOME
<?php $__env->stopSection(); ?>

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
                            <h3>Create</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Obat</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div>
                    
                    <form action="<?php echo e(route('listpasien.store')); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="form">
                        <?php echo csrf_field(); ?>
                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label>Nomor</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="code"
                                                                    name="code" value="<?php echo e($data[0]->transactionnumber); ?>" readonly required>
                                                            </div>
                                                            <input type="text" class="form-control" id="id_obat"
                                                                    name="id_obat" value="<?php echo e($data[0]->id_obat); ?>" readonly required hidden>
                                                                    <input type="text" class="form-control" id="id"
                                                                    name="id" value="<?php echo e($data[0]->id); ?>" readonly required hidden>
                                                        
                                                            <div class="col-md-1">
                                                                <label>Obat</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="<?php echo e($data[0]->obat_name); ?>"  required readonly>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label>Jam</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" class="form-control" id="jam"
                                                                    name="jam" value="<?php echo e($data[0]->jam); ?>" readonly>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label>Qty</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="text" id="brand" class="form-control"
                                                                    name="brand" value="<?php echo e($data[0]->qty); ?>" readonly>
                                                            </div>

                                                            
                                                            <div class="col-md-1">
                                                                <label>Image</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image"  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-body">
                                                        <div class="col-md-3 col-6">
                                                            <button type="submit" id="btnsubmit"
                                                            class="btn btn-primary">Save</button>
                                                            <a type="submit" href="<?php echo e(route('Obat')); ?>"
                                                                class="btn btn-danger">Cancel</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>

                    </form>

            </div>
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
            ProjectFind2()

            $('#exampleModalV2').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });

        })

        function ProjectFind2() {

            $('#table2').dataTable({
                "sPaginationType": "full_numbers",
                "bFilter": true
            });
        }
        $(document).on("keydown", ":input:not(textarea)", function(event) {
            return event.key != "Enter";
        });

        $('#btnsubmit').on('click', function(event) {
            event.preventDefault();
            const isFormValid = validateForm();

            if (isFormValid) {
                $(this).prop('disabled', true);
                $('body').append('<div class="overlay"><div class="spinner"></div></div>');
                $('#form').submit();

            }
        });

        function validateForm() {
            
            var inputs = document.querySelectorAll('input[type="text"][required]');
            var isValid = true;


          

            inputs.forEach(function(input) {
                if (input.value.trim() === '') {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert('Please fill out all required fields.');
                return false;
            }



            return true;
        }

       

        $('#form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var dataform = new FormData(form);
            var btnsubmit = document.getElementById("btnsubmit");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },

                success: function(res) {

                    Swal.fire({
                        icon: "success",
                        title: `${res.message}`,
                    });
                    window.location = res.url;



                },
                error: function(error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })

                    btnsubmit.disabled = false;


                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1578562/public_html/pengingatobat.com/resources/views/listpasien/edit.blade.php ENDPATH**/ ?>