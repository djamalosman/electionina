
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
                        <h3>Data Tps</h3>
                    
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tps</li>
                            </ol>
                        </nav>
                        
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Data Tps
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
                                    <th>Nama Tps</th>
                                    <th>User Mobile</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>RT/RW</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($header->name_tps); ?></td>
                                        
                                        <td><?php echo e($header->username); ?></td>
                                        <td><?php echo e($header->email); ?></td>
                                        <td><?php echo e($header->alamat); ?></td>
                                        <td><?php echo e($header->namertrw); ?></td>
                                        <td><?php echo e($header->updated_at); ?></td>
                                        <td>
                                            <a class="passingID2 btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#default"
                                            data-idtps="<?php echo e($header->idtps); ?>"
                                            data-namauser="<?php echo e($header->username); ?>"
                                            data-rtrwname="<?php echo e($header->namertrw); ?>"
                                            data-titlentps="<?php echo e($header->name_tps); ?>">
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
                            <h4 class="modal-title" id="myModalLabel33">Tambah Tps </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?php echo e(route('tps.create')); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="form">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <label>Nama Tps </label>
                                <div class="form-group">
                                    <input type="text" name="tpsname" id="tpsname" placeholder="Nama Tps"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Pilih Rt/Rw</label>
                                    <select class="choices form-select" id="rtrwId" name="rtrwId">
                                        <?php $__currentLoopData = $rtrw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val->idrtrw); ?>"><?php echo e($val->namertrw); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih user mobile </label>
                                    <select class="choices form-select" id="iduser" name="iduser">
                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vals->iduser); ?>"><?php echo e($vals->username); ?></option>
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
                            <h5 class="modal-title" id="myModalLabel1">Edit  Tps</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?php echo e(route('tps.update')); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="formedit">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <label>Nama Tps </label>
                                <div class="form-group">
                                    <input type="text" name="nametpsx" id="nametpsx" placeholder="Nama Tps"class="form-control">
                                </div>
                                <input hidden type="text" name="idtpsx" id="idtpsx" placeholder="Nama Tps"class="form-control">
                                <div class="form-group">
                                    <label>Pilih Rt/Rw</label>
                                    <select class="choices form-select" id="rtrwIdx" name="rtrwIdx">
                                        <?php $__currentLoopData = $rtrw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valEdit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($valEdit->idrtrw); ?>"><?php echo e($valEdit->nama_desa); ?>-<?php echo e($valEdit->namertrw); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih user mobile </label>
                                    <select class="choices form-select" id="iduserx" name="iduserx">
                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valEdits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($valEdits->iduser); ?>"><?php echo e($valEdits->username); ?></option>
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
    
    $(document).on("click", ".passingID2", function () {
        var idtps = $(this).data('idtps'); // Use 'id' instead of 'kolom1'
        var name_tps = $(this).data('titlentps');
        var namauser = $(this).data('namauser');
        var rtrwname = $(this).data('rtrwname');
        // Set the content of th elements
        $("#idtpsx").val(idtps);
        $("#nametpsx").val(name_tps);
        $("#rtrwIdx").val(rtrwname);
        $("#iduserx").val(namauser);
        
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
            var name = document.getElementById("tpsname").value;
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\electionina\resources\views/tps/index.blade.php ENDPATH**/ ?>