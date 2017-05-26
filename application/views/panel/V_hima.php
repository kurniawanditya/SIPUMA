
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
                  Data Hima
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 space20">
                      <button class="btn btn-primary" onclick="add_hima()">
                        <i class="glyphicon glyphicon-plus"></i> Add Hima
                      </button>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                      <tr>
                        <th>ID Hima</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Fakultas</th>
                            <th>Universitas</th>
                            <th>Status</th>
                            <th>Create at</th>
                            <th>Action</p></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($himas as $hima){?>
                             <tr>
                                <td><?php echo $hima->hima_id; ?></td>
                                <td><?php echo strtoupper($hima->username); ?></td>
                                <td><?php echo strtoupper($hima->hima_name); ?></td>
                                <td><?php echo $hima->hima_desc; ?></td>
                                <td><?php echo strtoupper($hima->fakultas_name); ?></td>
                                <td><?php echo strtoupper($hima->universitas_name); ?></td>
                                <td><?php echo $hima->hima_status; ?></td>
                                <td><?php echo $hima->hima_create_at; ?></td>
                                <td>
                                <a class="btn btn-xs btn-primary" onclick="upd_hima(<?php echo $hima->hima_id;?>)">
                                   <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a class="btn btn-xs btn-bricky" onclick="del_hima(<?php echo $hima->hima_id;?>)">
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


    function add_hima()
    {
      save_method = 'add';
      $('#formhima')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function upd_hima(id)
    {
      save_method = 'update';
      $('#formhima')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/hima/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="hima_id"]').val(data.hima_id);
            $('[name="user_id"]').val(data.user_id);
            $('[name="hima_name"]').val(data.hima_name);
            $('[name="hima_desc"]').val(data.hima_desc);
            $('[name="fakultas_id"]').val(data.fakultas_id);
            $('[name="universitas_id"]').val(data.universitas_id);
            $('[name="hima_status"]').val(data.hima_status);
            $('[name="hima_create_at"]').val(data.hima_create_at);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit hima'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('index.php/hima/add_hima')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/hima/upd_hima')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#formhima').serialize(),
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

    function del_hima(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/hima/del_hima')?>/"+id,
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
        <h3 class="modal-title"><i class="fa fa-plus-square teal"></i> Hima Form</h3>
      </div>
      <div class="modal-body form">
          <!-- start: FORM VALIDATION 1 PANEL -->
                  <form action="" role="formhima" id="formhima">
                      <input type="hidden" value="" name="hima_id"/>
                      <input type="hidden"  name="hima_create_at"/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                          <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                          <i class="fa fa-ok"></i> Your form validation is successful!
                        </div>
                      </div>
                      <!-- INPUT USER-->
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">
                            User <span class="symbol required"></span>
                          </label>
                          <select name="user_id" placeholder="Pick user" class="form-control">
                            <?php foreach($users as $user){?>
                              <option value="<?php echo $user->user_id; ?>"><?php echo strtoupper($user->username); ?></option>
                            <?php }?>
                          </select>
                        </div>
                        <!-- INPUT NAME HIMA-->
                        <div class="form-group">
                          <label class="control-label">
                            Name <span class="symbol required"></span>
                          </label>
                          <input type="text" placeholder="Insert your HIMA name" class="form-control" id="hima_name" name="hima_name">
                        </div>
                        <!-- INPUT DESCRIPTION-->
                        <div class="form-group">
                          <label class="control-label">
                            Description <span class="symbol required"></span>
                          </label>
                          <textarea name="hima_desc" placeholder="Insert your description" class="autosize form-control" id="form-field-24" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                        </div>
                        <!-- INPUT FAKULTAS-->
                        <div class="form-group">
                          <label class="control-label">
                            Fakultas <span class="symbol required"></span>
                          </label>
                          <select name="fakultas_id" placeholder="Fakultas Name" class="form-control">
                            <?php foreach($fakultas as $f){?>
                              <option value="<?php echo $f->fakultas_id; ?>"><?php echo $f->fakultas_name; ?></option>
                            <?php }?>
                          </select>
                        </div>
                         <!-- INPUT UNIVERSITAS-->
                        <div class="form-group">
                          <label class="control-label">
                            Universitas <span class="symbol required"></span>
                          </label>
                          <select name="universitas_id" placeholder="Universitas" class="form-control">
                              <?php foreach($universitas as $u){?>
                                <option value="<?php echo $u->universitas_id; ?>"><?php echo $u->universitas_name; ?></option>
                              <?php }?>
                          </select>
                        </div>
                        <!-- INPUT STATUS-->
                        <div class="form-group">
                          <label class="control-label">
                            Status <span class="symbol required"></span>
                          </label>
                          <select name="hima_status" placeholder="Insert your status" class="form-control">
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
