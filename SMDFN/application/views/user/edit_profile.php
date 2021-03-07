<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><?php echo $title; ?></h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert">x</a>
                <strong><?php echo strip_tags(validation_errors()); ?></strong>
            </div>
        <?php } ?>
        <!-- Default box -->
        <div class="row">

            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/profile/' . $user['image']); ?>" alt="User profile picture">
                        <h3 class="profile-username text-center"><?php echo $user['nama']; ?></h3>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Date Created</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> <?php echo format_indo($user['date_created']); ?></strong>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">Indonesia</p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> My Username</strong>
                        <p></i> <?php echo $user['username']; ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Profile</h3>
                    </div>
                    <div class="box-body">
                        <?php echo form_open_multipart('user/edit_profile'); ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <input type="text" class="form-control" id="text" value="<?php echo $user['username']; ?>" readonly>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="name" class="form-control" id="name" name="nama" value="<?php echo $user['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">Picture</div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ganti Password</h3>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo base_url('user/changepassword'); ?>" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Password Lama</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control form-control-sm" id="current_password" name="current_password" placeholder="Password Lama">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control form-control-sm" id="new_password1" name="new_password1" placeholder="Password Baru">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Ulangi Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control form-control-sm" id="new_password2" name="new_password2" placeholder="Ketik ulang password baru..">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->