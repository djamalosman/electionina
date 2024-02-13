
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
                        <h3>Data Caleg</h3>
                    
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Caleg</li>
                            </ol>
                        </nav>
                        
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Data Caleg
                    </div>
                    <div class="card-header">
                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                            data-bs-target="#inlineForm">
                            Tambah
                        </button>
                    </div>
                    <div class="card-header">
                     
                   
                            

                    </div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Caleg</th>
                                    <th>Dapil</th>
                                    <th>Nama  Partai</th>
                                    <th>Nomor Partai</th>
                                    <th>Di buat</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($header->name_caleg); ?></td>
                                        <td><?php echo e($header->provinsi); ?> - <?php echo e($header->kota_kabupaten); ?></td>
                                        <td><?php echo e($header->name_partai); ?></td>
                                        <td><?php echo e($header->nomor_partai); ?></td>
                                        <td><?php echo e($header->modified_by); ?></td>
                                        <td><?php echo e($header->updated_at); ?></td>
                                        <td>
                                            <a class="passingID8 btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#default"
                                            data-idcalegv="<?php echo e($header->idcaleg); ?>"
                                            data-namecalegv="<?php echo e($header->name_caleg); ?>"
                                            data-provinsiv="<?php echo e($header->provinsi); ?>"
                                            data-namekotakabuv="<?php echo e($header->kota_kabupaten); ?>"
                                            data-idpartaiv="<?php echo e($header->idpartai); ?>">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                          </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->
            <!--Basic Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Caleg </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?php echo e(route('caleg.create')); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="form">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <label>Nama Caleg </label>
                                <div class="form-group">
                                    <input type="text" name="namecaleg" id="namecaleg" placeholder="Nama Caleg"
                                        class="form-control">
                                </div>
                                <div class="form-group" >
                                    <label>Pilih Partai </label>
                                    <select class="choices form-select" id="idpartai" name="idpartai" >
                                        <?php $__currentLoopData = $partai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->idpartai); ?>"><?php echo e($vals->name_partai); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group" <?php if(true): echo 'readonly'; endif; ?>>
                                    <label>Provinsi </label>
                                    <select class="choices form-select" id="iddapil" name="iddapil" >
                                        <?php $__currentLoopData = $dapil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->iddapil); ?>"><?php echo e($vals->provinsi); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group" <?php if(true): echo 'readonly'; endif; ?>>
                                    <label>Kota/Kabupaten </label>
                                    <select class="choices form-select" <?php if(true): echo 'readonly'; endif; ?> >
                                        <?php $__currentLoopData = $dapil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->iddapil); ?>"><?php echo e($vals->kota_kabupaten); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" id="btnsubmit" class="btn btn-primary ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Dapil</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?php echo e(route('caleg.update')); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="formedit">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <label>Nama Caleg </label>
                                <div class="form-group">
                                    <input type="text" name="namecalegx" id="namecalegx" placeholder="Nama Caleg"class="form-control">
                                </div>
                                <input hidden type="text" name="idcalegx" id="idcalegx" class="form-control">
                                <div class="form-group">
                                    <label>Pilih Partai </label>
                                    <select class="choices form-select" id="idpartaix" name="idpartaix">
                                        <?php $__currentLoopData = $partai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->idpartai); ?>"><?php echo e($vals->name_partai); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi </label>
                                    <select class="choices form-select" id="iddapilx" name="iddapilx" <?php if(true): echo 'readonly'; endif; ?>>
                                        <?php $__currentLoopData = $dapil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->iddapil); ?>"><?php echo e($vals->provinsi); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kota/Kabupaten </label>
                                    
                                        <?php $__currentLoopData = $dapil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="text" value="<?php echo e($vals->kota_kabupaten); ?>" class="form-control" readonly>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                
                            </div>
                           
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" id="btnsubmit" class="btn btn-primary ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-script'); ?>
<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="assets/js/pages/datatables.js"></script>
<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="assets/js/pages/form-element-select.js"></script>
<script>
    
    $(document).on("click", ".passingID8", function () {
        var idcaleg = $(this).data('idcalegv'); // // Use 'id' instead of 'kolom1'
        var namecaleg = $(this).data('namecalegv');
        var provinsi = $(this).data('provinsiv');
        var namekotakabu = $(this).data('namekotakabuv');
        var namapartai = $(this).data('idpartaiv');
        // Set the content of th element
        $("#namecalegx").val(namecaleg);
        $("#provinsix").val(provinsi);
        $("#namekotakabux").val(namekotakabu);
        $("#idpartaix").val(namapartai);
    });
</script>
<script>
    
    
   

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
            var name = document.getElementById("namecaleg").value;
            // console.log(name);
            // if (input == "") {
            //     alert("Input text cannot be empty!");
            //     return false;
            // }

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
                    if (res.status==200) {
                        Swal.fire({
                        icon: "success",
                        title: `${res.message}`,
                    });
                        window.location = res.url;
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${res.message}`,
                        })

                        btnsubmit.disabled = false;
                    }
                    



                },
                error: function(error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${error.message}`,
                    })

                    btnsubmit.disabled = false;


                }
            });
        });

        $('#formedit').on('submit', function(e) {
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
                    if (res.status==200) {
                        Swal.fire({
                        icon: "success",
                        title: `${res.message}`,
                    });
                        window.location = res.url;
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${res.message}`,
                        })

                        btnsubmit.disabled = false;
                    }
                    



                },
                error: function(error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${error.message}`,
                    })

                    btnsubmit.disabled = false;


                }
            });
        });
        
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\electionina\resources\views/caleg/index.blade.php ENDPATH**/ ?>