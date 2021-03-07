<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user['nama']; ?></p>
                <a href="#"><i class="fa fa-circle"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">ADMINISTRATOR</li>
            <li><a href="<?php echo base_url('admin/index'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
            <li><a href="<?php echo base_url('admin/profile'); ?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>

            <li><a href="<?php echo base_url('admin/man_user'); ?>"><i class="fa fa-users"></i> <span>Management User</span></a></li>
            <li class="header">END</li>
            <li><a href="<?= base_url('auth/logout'); ?>" class="tombol-logout"><i class="fa fa-sign-out text-aqua"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->