
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
                <h1><?php echo $pages; ?><small><?php echo $penjelasan; ?></small></h1>
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
                      <button class="btn btn-primary" onclick="add_role()">
                        <i class="glyphicon glyphicon-plus"></i> Add Role
                      </button>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        <th>ID Role</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Create at</th>
                            <th>Action</p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($roles as $role){?>
                             <tr>
                                <td><?php echo $role->role_id; ?></td>
                                <td><?php echo strtoupper($role->role_name); ?></td>
                                <td><?php echo $role->role_status; ?></td>
                                <td><?php echo $role->role_create_at; ?></td>
                                <td>
                                  <!--
                                  <button class="btn btn-warning" onclick="upd_user(<?php echo $user->user_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                  <button class="btn btn-danger" onclick="del_user(<?php echo $user->user_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                -->
                                <a class="btn btn-xs btn-primary" onclick="upd_role(<?php echo $role->role_id; ?>)">
                                   <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a class="btn btn-xs btn-bricky" onclick="del_role(<?php echo $role->role_id; ?>)">
                                  <i class="fa fa-trash-o"></i> Delete
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


    function add_role()
    {
      save_method = 'add';
      $('#formrole')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function upd_role(id)
    {
      save_method = 'update';
      $('#formrole')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/role/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="role_id"]').val(data.role_id);
            $('[name="role_name"]').val(data.role_name);
            $('[name="role_status"]').val(data.role_status);
            $('[name="role_create_at"]').val(data.role_create_at);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Role'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('Role/add_role')?>";
      }
      else
      {
        url = "<?php echo site_url('Role/upd_role')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#formrole').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('You have some errors. Please check below.');
            }
        });
    }

    function del_role(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/role/del_role')?>/"+id,
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
        <h3><i class="fa fa-pencil-square teal"></i> Form Add Role</h3>
      </div>
      <div class="modal-body form">
        <!-- start: FORM VALIDATION 1 PANEL -->
                  <form action="" role="formrole" id="formrole">
                      <input type="hidden" value="" name="role_id"/>
                      <input type="hidden"  name="role_create_at"/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Your form validation is successful!
                        </div>
                      </div>
                      <!-- INPUT ROLE NAME-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">
                            Role <span class="symbol required"></span>
                          </label>
                          <input type="text" placeholder="Insert your role name" class="form-control" id="role_name" name="role_name">
                        </div>
                        <!-- INPUT STATUS-->
                        <div class="form-group">
                          <label class="control-label">
                            Role <span class="symbol required"></span>
                          </label>
                          <select name="role_status" placeholder="Pick your role status" class="form-control">
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


<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/summernote/build/summernote.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/ckeditor/adapters/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/form-validation.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        Main.init();
        FormValidator.init();
      });
    </script>
