
<!-- start: PAGE -->
      <div class="main-content">
        <div class="container">
          <!-- start: PAGE HEADER -->
          <div class="row">
            <div class="col-sm-12">
              <!-- start: PAGE TITLE & BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="active">
                  <i class="clip-file"></i>
                    <?php echo $pages ?>
                </li>
                <li class="search-box">
                  <form class="sidebar-search">
                    <div class="form-group">
                      <input type="text" placeholder="Start Searching...">
                      <button class="submit">
                        <i class="clip-search-3"></i>
                      </button>
                    </div>
                  </form>
                </li>
              </ol>
              <div class="page-header">
                <h1><?php echo $pages; ?></h1>
              </div>
              <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->

<!-- start: DYNAMIC TABLE PANEL -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i>
                  Data Log
                </div>
                <div class="panel-body">
                    <!--<div class="row">
                   <div class="col-md-12 space20">
                      <a href="<?php echo base_url()?>C_excel/export_excel">
                       <button class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus"></i> Export
                      </button>
                    </a>
                  </div>
                  </div>-->
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        <th>Riwayat</th>
                        <th>Tahun & Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($logs as $log){?>
                             <tr>
                                <td><?php echo $log->log_user.' '.$log->log_desc; ?></td>
                                <td><?php echo $log->log_time; ?></td>
                              </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end: DYNAMIC TABLE PANEL -->
            </div>
          <!-- end: PAGE CONTENT-->
        </div>
      </div>
      <!-- end: PAGE -->
