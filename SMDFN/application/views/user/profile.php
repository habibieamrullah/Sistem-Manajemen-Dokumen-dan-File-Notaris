<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><?php echo $title; ?></h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/profile/' . $user['image']); ?>" alt="User profile picture">
                        <h3 class="profile-username text-center"><?php echo $user['nama']; ?></h3>
                        <a href="<?php echo base_url('user/edit_profile'); ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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
                        <strong><i class="fa fa-book margin-r-5"></i> <?php echo $user['date_created']; ?></strong>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">Indonesia</p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> My Username</strong>
                        <p></i> <?php echo $user['username']; ?></p>
                        <hr>
                        <strong><i class="ion-social-dropbox-outline margin-r-5"></i> Change Password</strong>
                        <p></i><a href="<?php echo base_url('user/edit_profile'); ?>" class="btn btn-outline-primary font-weight-bolder">Ubah Password</a></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">File CV</a></li>
                        <li><a href="#settings" data-toggle="tab">File PT</a></li>
                        <li><a href="#laptahunan" data-toggle="tab">File FPP</a></li>
                        <li><a href="#laplain" data-toggle="tab">File Lainnya</a></li>
                        <li><a href="#dokkerja" data-toggle="tab">Dok. Kerja</a></li>
                        <li><a href="#dokpribadi" data-toggle="tab">File Salinan Akta</a></li>
                        <li><a href="#scanutama" data-toggle="tab">Scan</a></li>
                        <li><a href="#scanpendukung" data-toggle="tab">Pendukung</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($lap_harian_saya as $lhs) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lhs['nama_file']; ?></td>
                                                <td><?php echo $lhs['file_upload']; ?></td>
                                                <td><?php echo $lhs['date_upload']; ?></td>
                                                <td><?php echo $lhs['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/lap_harian'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>

                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($lap_bulanan_saya as $lbs) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lbs['nama_file']; ?></td>
                                                <td><?php echo $lbs['file_upload']; ?></td>
                                                <td><?php echo $lbs['date_upload']; ?></td>
                                                <td><?php echo $lbs['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/lap_bulanan'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="laptahunan">
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($lap_tahunan_saya as $lts) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lts['nama_file']; ?></td>
                                                <td><?php echo $lts['file_upload']; ?></td>
                                                <td><?php echo $lts['date_upload']; ?></td>
                                                <td><?php echo $lts['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/lap_tahunan'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="laplain">
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($lap_lain_saya as $lls) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lls['nama_file']; ?></td>
                                                <td><?php echo $lls['file_upload']; ?></td>
                                                <td><?php echo $lls['date_upload']; ?></td>
                                                <td><?php echo $lls['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/lap_lain'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="dokkerja">
                            <!-- Post -->
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($dok_kerja_saya as $dks) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $dks['nama_file']; ?></td>
                                                <td><?php echo $dks['file_upload']; ?></td>
                                                <td><?php echo $dks['date_upload']; ?></td>
                                                <td><?php echo $dks['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/dok_kerja'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="dokpribadi">
                            <!-- Post -->
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($dok_pribadi_saya as $dps) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $dps['nama_file']; ?></td>
                                                <td><?php echo $dps['file_upload']; ?></td>
                                                <td><?php echo $dps['date_upload']; ?></td>
                                                <td><?php echo $dps['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/dok_pribadi'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="scanutama">
                            <!-- Post -->
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($scan_utama_saya as $sus) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $sus['nama_file']; ?></td>
                                                <td><?php echo $sus['file_upload']; ?></td>
                                                <td><?php echo $sus['date_upload']; ?></td>
                                                <td><?php echo $sus['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/scan_berkas_utama'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="scanpendukung">
                            <!-- Post -->
                            <div class="post">
                                <table class=" table table-bordered table-hover" style="margin-top:10px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Upload File</th">
                                            <th>Tanggal</th>
                                            <th>Jam Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($scan_pendukung_saya as $sps) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $sps['nama_file']; ?></td>
                                                <td><?php echo $sps['file_upload']; ?></td>
                                                <td><?php echo $sps['date_upload']; ?></td>
                                                <td><?php echo $sps['jam_upload']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <a href="<?php echo base_url('user/scan_berkas_pendukung'); ?>" class="btn btn-primary btn-sm">View All</a>
                                </table>
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->