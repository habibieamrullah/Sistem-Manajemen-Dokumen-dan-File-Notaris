<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
            <strong>
                <?php echo $title; ?>
            </strong>
        </h4>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="javascript:window.history.go(-1);" class="btn btn-warning"><i class="ionicons ion-arrow-return-left"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url('admin/add_user'); ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" name="date_created" value="<?php echo date('Y/m/d'); ?>">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                    <?php echo form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                    <?php echo form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="role_id">.
                                        <option value="">Pilih Level</option>
                                        <option value="1">ADMINISTRATOR</option>
                                        <option value="2">USER</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password1" placeholder="Password">
                                    <?php echo form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password2" placeholder="Ketik ulang password">
                                    <?php echo form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
                <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->