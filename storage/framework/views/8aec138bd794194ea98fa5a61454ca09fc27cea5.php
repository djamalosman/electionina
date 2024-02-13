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
                            <h3>Update</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Obat Pasien</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div>
                    
                    <form action="<?php echo e(route('Schedule.update',$datasch->id)); ?>" onsubmit="validateForm()" method="POST" enctype="multipart/form-data" id="form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="basicInput"> Kode Transaksi</label>
                                                            <input type="text" class="form-control" id="transactionnumber"
                                                                    name="transactionnumber" value="<?php echo e($datasch->transactionnumber); ?>" placeholder="Auto" readonly required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="helpInputTop">Nama Pasien</label>
                                                            <select class="choices form-select" name="id_pasien"  id="id_pasien">
                                                                <option value="">---Pilih Pasien---</option>
                                                                <?php $__currentLoopData = $dataPasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($data->id); ?>" <?php echo e($data->id == $datasch->id_pasien ? 'selected' : ''); ?>>
                                                                            <?php echo e($data->name); ?>

                                                                            
                                                                        </option>
                                                                       
                                                                    
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="helperText">Tanggal Transaksi</label>
                                                                    <input type="date" class="form-control" id="transactiondate"
                                                                    name="transactiondate" value="<?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $datasch->transactiondate)->format('Y-m-d')); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="disabledInput">Deskripsi</label>
                                                                    <textarea class="form-control" id="description" name="description"rows="3"><?php echo e($datasch->description); ?></textarea>
                                                                </div>
                                                                
                                                            </div>
                                                            <div id="education_fields"></div>
                                                                
                                                                <?php $__currentLoopData = $dataschdtl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                    
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <hr>
                                                                                <label for="disabledInput">Obat Pasien </label>
                                                                                <select class="choices form-select" id="id_obat" name="id_obat[]">
                                                                                    <option value="">---Pilih Obat---</option>
                                                                                    <?php $__currentLoopData = $dataObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($data->id); ?>" <?php echo e($data->id == $val->id_obat ? 'selected' : ''); ?>>
                                                                                            <?php echo e($data->name); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                                                </select>
                                                                            </div>
                                
                                                                            <div class="form-group">
                                                                                <label for="helpInputTop">Qty Hari</label>
                                                                                <input type="text" class="form-control" id="Qty_hari" name="Qty_hari[]" value="<?php echo e($val->Qty_hari); ?>" placeholder="Major">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="disabledInput">Aturan Pakai</label>
                                                                                <input type="text" class="form-control" value="<?php echo e($val->aturanpakai); ?>" name="aturanpakai[]" id="aturanpakai">
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <hr>
                                                                            <label for="helpInputTop">Tanggal Awal Minum Obat</label>
                                                                            <input type="datetime-local" class="form-control" id="stardate"
                                                                            
                                                                                    name="stardate[]" value="<?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d h:m:s', $val->stardate)->format('Y-m-d h:m:s')); ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="disabledInput">Tanggal Akhir Minum Obat</label>
                                                                            <input type="datetime-local" class="form-control" id="enddate"
                                                                            name="enddate[]" value="<?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d h:m:s', $val->enddate)->format('Y-m-d h:m:s')); ?>">
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-md-6">
                                                                        <a href="#" name="add" id="dynamic-ar"  onclick="education_fields();" class="btn btn-primary">Add</a>
                                                                    </div>
                                                                
                                                            <div class="clear"></div>
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
                                                    <a type="submit" href="<?php echo e(route('Schedule')); ?>"
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
     $('.js-example-basic-single').select2();
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          //window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
        //
        var room = 1;
        function education_fields() {
        
            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass"+room);
            var rdiv = 'removeclass'+room;
             divtest.innerHTML = '<div class="row"><div class="col-md-6"><div class="form-group"><label for="disabledInput">Obat Pasien </label><select class="choices form-select"id="id_obat" name="id_obat[]"><option value="">---Pilih Obat---</option><?php $__currentLoopData = $dataObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div><div class="form-group"> <label for="helpInputTop">Qty Hari</label><input type="text" class="form-control" id="Qty_hari" name="Qty_hari[]" value=""placeholder="Major"></div><div class="form-group"><label for="disabledInput">Aturan Pakai</label><input type="text" class="form-control" name="aturanpakai[]" id="aturanpakai"></div></div><div class="col-md-6"> <div class="form-group"><label for="helpInputTop">Tanggal Awal Minum Obat</label><input type="datetime-local" class="form-control" id="stardate" name="stardate[]"value="<?php echo e(now()->setTimezone('T')->format('Y-m-dTh:m:s')); ?>"></div><div class="form-group"><label for="disabledInput">Tanggal Akhir Minum Obat</label> <input type="datetime-local" class="form-control" id="enddate" name="enddate[]"value="<?php echo e(now()->setTimezone('T')->format('Y-m-dTh:m:s')); ?>"></div></div><div class="clear"></div> <div class="col-md-6"><a href="#"  type="button" onclick="remove_education_fields('+ room +');" class="btn btn-danger">Remove</a></div></div><hr>';
               
            
            objTo.appendChild(divtest)
        }
        function remove_education_fields(rid) {
            $('.removeclass'+rid).remove();
        }
        
    </script>
    <script>
  
    // $("#myselect").select2({ width: 'resolve' });               
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
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
            var name = document.getElementById("id_pasien").value;
            var name = document.getElementById("id_obat").value;
            if (input == "") {
                alert("Input text cannot be empty!");
                return false;
            }

            return true;
        }

        function validateForm() {
            var name = document.getElementById("id_pasien").value;
            var phone = document.getElementById("id_obat").value;

            if (name == "") {
                alert("Nama pasien Kosong !!");
                return false;
            }
            if (phone == "") {
                alert("obat Kosong !!!");
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\patientmedication\resources\views/schedule/edit.blade.php ENDPATH**/ ?>