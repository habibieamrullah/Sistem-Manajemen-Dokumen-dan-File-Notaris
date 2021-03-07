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
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-book"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">File CV</span>
            <span class="info-box-number"><?php echo $data_harian; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/lap_harian'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fa fa-calendar-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">File PT</span>
            <span class="info-box-number"><?php echo $data_bulanan; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/lap_harian'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- col -->

      <!-- col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-lime">
          <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">File Firma Persekutuan Perdata</span>
            <span class="info-box-number"><?php echo $data_tahunan; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/lap_tahunan'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- col -->

      <!-- col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-navy">
          <span class="info-box-icon"><i class="fa fa-clone"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">File Lainya</span>
            <span class="info-box-number"><?php echo $data_lain; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/lap_lain'); ?>"> More info </a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-maroon">
          <span class="info-box-icon"><i class="fa fa-file-archive-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Dokumen Kerja</span>
            <span class="info-box-number"><?php echo $dok_kerja; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/dok_kerja'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-folder-open"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">File Salinan Akta</span>
            <span class="info-box-number"><?php echo $dok_pribadi; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/dok_pribadi'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- col -->

      <!-- col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-fuchsia">
          <span class="info-box-icon"><i class="fa fa-inbox"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Scan Berkas Utama</span>
            <span class="info-box-number"><?php echo $scan_utama; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/scan_berkas_utama'); ?>"> More info</a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
      <!-- col -->

      <!-- col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="info-box bg-gray">
          <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Scan Berkas Pendukung</span>
            <span class="info-box-number"><?php echo $scan_pendukung; ?> Files</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <a href="<?php echo base_url('user/scan_berkas_pendukung'); ?>"> More info </a>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>
    </div>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab" style="font-weight:800;">File CV</a></li>
        <li><a href="#settings" data-toggle="tab" style="font-weight:800;">File PT</a></li>
        <li><a href="#laptahunan" data-toggle="tab" style="font-weight:800;">File Firma Persekutuan Perdata</a></li>
        <li><a href="#laplain" data-toggle="tab" style="font-weight:800;">File Lainya</a></li>
        <li><a href="#dokkerja" data-toggle="tab" style="font-weight:800;">Dokumen Kerja</a></li>
        <li><a href="#dokpribadi" data-toggle="tab" style="font-weight:800;">File Salinan Akta</a></li>
        <li><a href="#scanutama" data-toggle="tab" style="font-weight:800;">Scan</a></li>
        <li><a href="#scanpendukung" data-toggle="tab" style="font-weight:800;">Scan Pendukung</a></li>
      </ul>

      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" style="margin-top:10px;">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="settings">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="laptahunan">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="laplain">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="dokkerja">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="dokpribadi">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="scanutama">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="scanpendukung">
          <div class="table-responsive">
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
                </tfoot>
            </table>
          </div>
        </div>

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->