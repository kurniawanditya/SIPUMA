<!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/fonts/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/iCheck/skins/all.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/theme_light.css" type="text/css" id="skin_color">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/print.css" type="text/css" media="print"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/summernote/build/summernote.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

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
                  Data User
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 space20">
                      <button class="btn btn-primary" onclick="add_user()">
                        <i class="glyphicon glyphicon-plus"></i> Tambah User
                      </button>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                            <th width="60px">ID </th>
                            <th>Nama Pengguna</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Buat di</th>
                            <th>Aksi</p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($users as $user){?>
                             <tr>
                                <td><?php echo $user->user_id; ?></td>
                                <td><?php echo strtoupper($user->username); ?></td>
                                <td><?php echo $user->role_name; ?></td>
                                <td><?php echo $user->user_status; ?></td>
                                <td><?php echo $user->user_create_at; ?></td>
                                <td>
                                  <!--
                                  <button class="btn btn-warning" onclick="upd_user(<?php echo $user->user_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                  <button class="btn btn-danger" onclick="del_user(<?php echo $user->user_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                -->
                                <a class="btn btn-xs btn-primary" onclick="upd_user(<?php echo $user->user_id;?>)">
                                   <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a class="btn btn-xs btn-bricky" onclick="del_user(<?php echo $user->user_id;?>)">
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


    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
    }

    function upd_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="user_id"]').val(data.user_id);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="role_id"]').val(data.role_id);
            $('[name="user_status"]').val(data.user_status);
            $('[name="user_create_at"]').val(data.user_create_at);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('index.php/user/add_user')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/user/upd_user')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
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

    function del_user(id)
    {
      if(confirm('Apa anda yakin akan menghapus data ini ?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/user/del_user')?>/"+id,
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
  <div class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"><i class="fa fa-plus-square teal"></i> </h3>
      </div>
      <div class="modal-body form">
        <!-- start: FORM VALIDATION 1 PANEL -->
                  <form action="" role="form" id="form">
                      <input type="hidden" value="" name="user_id"/>
                      <input type="hidden"  name="user_create_at"/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> Anda memiliki beberapa kesalahan Silakan cek di bawah ini.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Anda berhasil mengisi form dengan benar.
                        </div>
                      </div>
                      <!-- INPUT USERNAME-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">
                            Nama Pengguna <span class="symbol required"></span>
                          </label>
                          <input type="text" placeholder="Masukan nama pengguna" class="form-control" id="username" name="username">
                        </div>
                        <!-- INPUT PASSWORD-->
                        <div class="form-group">
                          <label class="control-label">
                            Password <span class="symbol required"></span>
                          </label>
                          <input type="password" placeholder="Masukan password" class="form-control" id="password" name="password">
                        </div>
                        <!-- INPUT ROLE-->
                        <div class="form-group">
                          <label class="control-label">
                            Role <span class="symbol required"></span>
                          </label>
                          <select name="role_id" placeholder="Insert your Role" class="form-control">
                              <?php foreach($roles as $role){?>
                                <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                              <?php }?>
                          </select>
                        </div>
                        <!-- INPUT ROLE-->
                        <div class="form-group">
                          <label class="control-label">
                            Role <span class="symbol required"></span>
                          </label>
                          <select name="user_status" placeholder="User Status" class="form-control">
                              <option value="Active">Active</option>
                              <option value="Deactive">Deactive</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
              <!-- end: FORM VALIDATION 1 PANEL -->
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
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

