   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <h3><?php echo $title; ?></h3>
       </section>
       <!-- Main content -->
       <section class="content">
           <!-- general form elements -->
           <div class="box box-primary">
               <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
               <?php if (validation_errors()) { ?>
                   <div class="alert alert-danger">
                       <a class="close" data-dismiss="alert">x</a>
                       <strong><?php echo strip_tags(validation_errors()); ?></strong>
                   </div>
               <?php } ?>
               <div class="box-header with-border">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user">
                       Tambah User
                   </button>
               </div>
               <div class="box-body">
                   <div class="table-responsive">
                       <table id="table-id" class="table table-bordered table-hover" style="font-size:14px;">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Nama</th>
                                   <th>Username</th>
                                   <th>Role ID</th>
                                   <th>Status</th>
                                   <th>Date Created</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
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
                                       <td> <button type="button" class="tombol-edit btn btn-info btn-block btn-xs" data-id="<?php echo $lu['id']; ?>" data-toggle="modal" data-target="#edit-user">Edit</button></td>
                                       <td><a href="<?php echo base_url('admin/del_user/') . $lu['id']; ?>" class="tombol-delete btn btn-danger btn-block btn-xs">Delete</a>
                                       </td>
                                   </tr>
                               <?php endforeach; ?>
                               </tfoot>
                       </table>
                   </div>
               </div>
           </div>
       </section>
       <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <div class="modal fade" id="add-user">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h3 class="modal-title" style="font-weight:800;">Tambah User</h3>
               </div>
               <div class="modal-body">
                   <form action="<?php echo base_url('admin/man_user'); ?>" method="post">
                       <div class="box-body">
                           <div class="form-group">
                               <label for="exampleInputEmail1">Level</label>
                               <select class="form-control" name="role_id" required>
                                   <option value="">Pilih Level</option>
                                   <option value="1">ADMINISTRATOR</option>
                                   <option value="2">USER</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="exampleInputEmail1">Nama Lengkap</label>
                               <input type="text" class="form-control" name="nama" required>
                           </div>
                           <div class="form-group">
                               <label for="exampleInputEmail1">Username</label>
                               <input type="text" class="form-control" name="username" required>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Password</label>
                                       <input type="password" class="form-control" name="password1" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Ulang Password</label>
                                       <input type="password" class="form-control" name="password2" placeholder="Ketik ulang password" required>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Simpan Data</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       </div>
                       <!-- /.box-body -->
                   </form>
               </div>
           </div>
           <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
   </div>

   <div class="modal fade" id="edit-user">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h3 class="modal-title" style="font-weight:800;">Edit User</h3>
               </div>
               <div class="modal-body">
                   <form action="<?php echo base_url('admin/edit_user'); ?>" method="post">
                       <div class="box-body">
                           <div class="form-group">
                               <label for="nama">Level</label>
                               <input type="hidden" name="id" id="idjson">
                               <select class="form-control" name="role_id" id="rolejson" required>
                                   <option value="">Pilih Level</option>
                                   <option value="1">ADMINISTRATOR</option>
                                   <option value="2">USER</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="nama">Nama Lengkap</label>
                               <input type="text" class="form-control" name="nama" id="namajson" required>
                           </div>
                           <div class="form-group">
                               <label>Status</label>
                               <div class="radio">
                                   <label>
                                       <input type="radio" name="is_active" id="optionsRadios1" value="1" checked>
                                       Aktif
                                   </label>
                               </div>
                               <div class="radio">
                                   <label>
                                       <input type="radio" name="is_active" id="optionsRadios2" value="0">
                                       Tidak Aktif
                                   </label>
                               </div>
                           </div>
                       </div>
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       </div>
                       <!-- /.box-body -->
                   </form>
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
               title: 'Yakin untuk menghapus ?',
               text: 'Data User akan dihapus',
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

   <script>
       $('.tombol-edit').on('click', function() {
           const id = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_edit'); ?>',
               data: {
                   id: id
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#namajson').val(data.nama);
                   $('#rolejson').val(data.role_id);
                   $('#idjson').val(data.id);
               }
           });
       });
   </script>