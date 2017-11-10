<?php $this->load->view('/admin/head'); ?>

    <section id="main">
      <div class="container">
        <div class="row">
        <?php $this->load->view('/admin/sidebar'); ?>
        
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
              </div>
 
                <br>
                  <table class="table table-striped table-hover table-responsive">
                      <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>email</th>
                        <th>active</th>
                        <th> <!--<a class="btn btn-success" href="#">Add New</a> --> 
                        <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add</button>
                        </th>
                      </tr>
                      
                      <?php
                         foreach($product as $row)
                         {
                          echo ' 
                            <tr>
                            <td id="' .$row->id. '">'.$row->id.'</td>
                            <td>'.$row->username.'</td>
                            <td>'.$row->password.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->active.'</td>
                            <td><a class="btn btn-info" href="edit.html">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td> 
                            </tr>';
                         }
                      ?>
                      
                  </table>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

      <footer id="footer">
        <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>

      <!-- Modal begins -->
  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert Data into product table</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form">
             <label>Enter  username</label>
             <input type="text" name="username" id="username" class="form-control" />
             <br />
             <label>Enter password</label>
             <input type="text"  name="password" id="password" class="form-control" />
             <br />
             <label>Enter email</label>
             <input type="text" name="email" id="email" class="form-control" />
             <br />  
             <label>Enter Active</label>
             <input type="text" name="active" id="active" class="form-control" />
             <br />
             <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
      <!-- Modal ends -->

<?php $this->load->view('/admin/foot'); ?>

      <!-- ajax begins -->
<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#username').val() == "")  
  {  
   alert("userame is required");  
  }  
  else if($('#password').val() == '')  
  {  
   alert("password is required");  
  }  
  else if($('#email').val() == '')
  {  
   alert("email is required");  
  }
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });

  <!-- ajax ends -->