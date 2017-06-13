
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
                  Data Universitas
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 space20">
                      <button class="btn btn-primary" onclick="add_universitas()">
                        <i class="glyphicon glyphicon-plus"></i> Tambah Universitas
                      </button>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                            <th width="60px">ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th width="150px">Buat di</th>
                            <th width="150px">Aksi</p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($universitas as $u){?>
                             <tr>
                                <td><?php echo $u->universitas_id; ?></td>
                                <td><?php echo strtoupper($u->universitas_name); ?></td>
                                <td><?php echo $u->universitas_desc; ?></td>
                                <td><?php echo $u->universitas_status; ?></td>
                                <td><?php echo $u->universitas_create_at; ?></td>
                                <td>

                                <a class="btn btn-xs btn-primary" onclick="upd_universitas(<?php echo $u->universitas_id;?>)">
                                   <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a class="btn btn-xs btn-bricky" onclick="del_universitas(<?php echo $u->universitas_id;?>)">
                                  <i class="fa fa-trash-o"></i> Hapus
                                </a>

                                </td>


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


<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );

    var save_method; //for save method string
    var table;


    function add_universitas()
    {
      save_method = 'add';
      $('#formuniversitas')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Universitas'); // Set Title to Bootstrap modal title
    }

    function upd_universitas(id)
    {
      save_method = 'update';
      $('#formuniversitas')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/universitas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="universitas_id"]').val(data.universitas_id);
            $('[name="universitas_name"]').val(data.universitas_name);
            $('[name="universitas_desc"]').val(data.universitas_desc);
            $('[name="universitas_status"]').val(data.universitas_status);
            $('[name="universitas_create_at"]').val(data.universitas_create_at);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Universitas'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('index.php/universitas/add_universitas')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/universitas/upd_universitas')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#formuniversitas').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Anda memiliki beberapa kesalahan Silakan cek di bawah ini.');
            }
        });
    }

    function del_universitas(id)
    {
      if(confirm('Apa anda yakin akan menghapus data ini ?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/universitas/del_universitas')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><i class="fa fa-plus-square teal"></i> </h3>
      </div>
      <div class="modal-body form">
          <!-- start: FORM VALIDATION 1 PANEL -->
                  <form action="" role="formuniversitas" id="formuniversitas">
                      <input type="hidden" value="" name="universitas_id"/>
                      <input type="hidden"  name="universitas_create_at"/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> Anda memiliki beberapa kesalahan Silakan cek di bawah ini.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Anda berhasil mengisi form dengan benar.
                        </div>
                      </div>
                      <!-- INPUT USERNAME UNIVERSITAS-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">
                            Nama <span class="symbol required"></span>
                          </label>
                          <input type="text" placeholder="Masukan nama universitas" class="form-control" id="universitas_name" name="universitas_name">
                        </div>
                        <!-- INPUT DESCRIPTION-->
                        <div class="form-group">
                          <label class="control-label">
                            Deskripsi <span class="symbol required"></span>
                          </label>
                          <textarea name="universitas_desc" placeholder="Masukan deskripsi" class="autosize form-control" id="form-field-24" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                        </div>
                        <!-- INPUT STATUS-->
                        <div class="form-group">
                          <label class="control-label">
                            Status <span class="symbol required"></span>
                          </label>
                          <select name="universitas_status" placeholder="Insert your status" class="form-control">
                              <option value="Active">Active</option>
                              <option value="Deactive">Deactive</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
             
          </div>
          <div class="modal-footer">
              <p align="left">
              <button class="btn btn-yellow" type="submit" Onclick="save()">
                  Submit <i class="fa fa-arrow-circle-right"></i>
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </p>
          </div>
          </form>
           <!-- end: FORM VALIDATION 1 PANEL -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="?php echo base_url();?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="?php echo base_url();?>assets/admin/plugins/summernote/build/summernote.min.js"></script>
    <script src="?php echo base_url();?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
    <script src="?php echo base_url();?>assets/admin/plugins/ckeditor/adapters/jquery.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        Main.init();
        FormValidator.init();
      });
    </script>
