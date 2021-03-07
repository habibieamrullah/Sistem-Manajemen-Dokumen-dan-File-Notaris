<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><?php echo $title; ?></h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('user/scan_berkas_utama'); ?>" class="btn btn-default btn-sm">Kembali</a></li>
        </ol>
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
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 style="font-weight:700;">Edit File</h4>
                    </div>
                    <div class="box-body">
                        <?php echo form_open_multipart('user/edit_scan_utama/' . $scan_utama['id']); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama File</label>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $scan_utama['id']; ?>">
                            <input type="hidden" class="form-control" name="date_edit" value="<?php echo date('Y/m/d'); ?>">
                            <input type="hidden" class="form-control" name="jam_edit" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                echo date('H:i:s'); ?>">
                            <input type="text" class="form-control" name="nama_file" value="<?php echo $scan_utama['nama_file']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ubah File</label>
                            <input type="file" id="exampleInputFile" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 style="font-weight:700;">Keterangan File</h4>
                    </div>
                    <div class="box-body box-profile">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama File</b> <a class="pull-right"><?php echo $scan_utama['nama_file']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama File Upload</b> <a class="pull-right"><?php echo $scan_utama['file_upload']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tgl. Upload - Jam Upload</b> <a class="pull-right"><?php echo $scan_utama['date_upload']; ?> - <?php echo $scan_utama['jam_upload']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tgl. Edit - Jam Edit</b> <a class="pull-right"><?php echo $scan_utama['date_edit']; ?> - <?php echo $scan_utama['jam_edit']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->