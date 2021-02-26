<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><?php echo $title; ?></h3>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $user_perbulan; ?></h3>
                        <p>New User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">-</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $user_aktif; ?></h3>
                        <p>User Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-checkbox-outline"></i>
                    </div>
                    <a href="#" class="small-box-footer">-</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $user_tak_aktif; ?></h3>
                        <p>User Non Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-remove-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">-</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $count_user; ?></h3>
                        <p>Total User</p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios-people"></i>
                    </div>
                    <a href="#" class="small-box-footer">-</a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- left column -->

        <?php echo $this->session->flashdata('message'); ?>
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-hover" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role ID</th>
                                <th>Status</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_user as $lu) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $lu['nama']; ?></td>
                                    <td><?php echo $lu['username']; ?></td>
                                    <?php if ($lu['role_id'] == 1) : ?>
                                        <td>Administrator</td>
                                    <?php else : ?>
                                        <td>User</td>
                                    <?php endif; ?>
                                    <?php if ($lu['is_active'] == 1) : ?>
                                        <td>Aktif</td>
                                    <?php else : ?>
                                        <td>Tidak Aktif</td>
                                    <?php endif; ?>
                                    <td><?php echo format_indo($lu['date_created']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tfoot>
                    </table>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->