<script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({ selector : 'textarea' , plugins : 'directionality, code', toolbar: "ltr rtl | alignleft aligncenter alignright alignjustify | outdent indent | sizeselect | bold italic | fontselect |  fontsizeselect", relative_urls: false, remove_script_host : true, });
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>File CV</h3>
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
        <div class="box box-primary">
            <div class="box-header with-border">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lap">
                    Upload File
                </button>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-hover" id="table-id" style="font_size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama File</th>
                                <th>No. Akta</th>
								<th>Barcode</th>
                                <th>Link Dokumen</th>
                                <th>Upload File</th>
                                <th>Tgl. Upload</th>
                                <th>Download</th>
                                <th>Detail</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lap_harian_saya as $lhs) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $lhs['nama_file']; ?></td>
                                    <td><?php echo $lhs['nomor_akta']; ?></td>
                                    <td><a target="_blank" href="<?php echo base_url() ?>lihat/?c=3&id=<?php echo $lhs['unid'] ?>&barcode=1">Lihat</a></td>
                                    <td><a target="_blank" href="<?php echo base_url() ?>lihat/?c=3&id=<?php echo $lhs['unid'] ?>">Klik</a></td>
                                    <td><?php echo $lhs['file_upload']; ?></td>
                                    <td><?php echo format_indo($lhs['date_upload']); ?></td>
                                    <td><a href="<?php echo base_url('user/file_download_harian/' . $lhs['id']); ?>" class="btn btn-success btn-sm btn-block">Download</a></td>
                                    <td> <a href="<?php echo base_url('user/edit_lap_harian/' . $lhs['id']); ?>" class="btn btn-info btn-sm btn-block">Detail</a></td>
                                    <td><a href="<?php echo base_url('user/del_lap_harian/' . $lhs['id']); ?>" class="tombol-delete btn btn-danger btn-sm btn-block">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Button trigger modal -->


<div class="modal fade" id="lap">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-weight:800;">File CV</h3>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('user/lap_harian'); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id']; ?>">
					<input type="hidden" class="form-control" name="unid" value="<?php echo substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 25) ?>">
                    <input type="hidden" class="form-control" name="jam_upload" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i:s'); ?>">
					<label>Nama File</label>
                    <input type="text" class="form-control" name="nama_file" placeholder="Nama File">
					<label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
					<label>Nomor Akta</label>
                    <input type="text" class="form-control" name="nomor_akta" placeholder="No Akta, ex: TU/2021/2/UT">
					<label>Tanggal Akta</label>
					<?php 

					$month = date('m');
					$day = date('d');
					$year = date('Y');

					$today = $year . '-' . $month . '-' . $day;
					?>
                    <input type="date" class="form-control" name="date_upload" value="<?php echo $today; ?>">
                </div>
                <div class="form-group mb-0 mt-0">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-right:5px;">Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <hr style="margin-top:4px;margin-bottom:2px;">
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-left text-muted">* Ekstensi File xls, xlsx, doc, docx, ppt, pptx, pdf, zip, rar</div><br>
                <div class="pull-left text-muted">* Ukuran File Kurang dari 10 MB</div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('.tombol-delete').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'data akan dihapus',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>