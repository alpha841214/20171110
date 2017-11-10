 <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}
</style>
</head>
<body>

<ul>
  <li><a href="<?php echo base_url() . 'adminC/user';  ?>">User Table</a></li>
  <li><a href="<?php echo base_url() . 'adminC/product';  ?>">Product Table</a></li>
  <li><a href="#">Traction Table</a></li>
  
  <li style="float:right; "><a href="<?php echo base_url() . 'adminC/logout';  ?>">logout</a></li>
</ul>
<br/><br/>
<div class="container">

    <section id="main">
      <div class="container">
        <div class="row">
        <?php $this->load->view('/admin/sidebar'); ?>
          
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"><?php echo $msg;  ?> <br></h3>
                <h3 class="panel-title"><?php echo $pagename;  ?></h3>
              </div>
                <br>

             <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>Username</th>  
                     <th>Password</th>  
                     <th>Email</th>  
                     <th>Active</th> 
                     <th> 
                          <button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addUser" 
                          > Add User
                          </button>

                     </th> 
                </tr>  
           <?php  
           if($select_data->num_rows() > 0)  
           {  
                foreach($select_data->result() as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->id; ?></td>  
                     <td><?php echo $row->username; ?></td>  
                     <td><?php echo $row->password; ?></td>  
                     <td><?php echo $row->email; ?></td>
                     <td><?php echo $row->active; ?></td>
                     <td>
                                <button class="btn btn-info edit" data-toggle="modal" data-target="#editUser"
                                  id="<?php echo $row->id; ?>" >Edit</button> 
                                <button   class="btn btn-danger delete"  id="<?php echo $row->id; ?>" >Delete</button>
                      </td> 
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table> 
    
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>
</div>
      <footer id="footer"><center>
        <br/><br/><p>Copyright  &copy; 2017</p>
    </center></footer>

 <!-- Modal addUser-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo base_url(); ?>adminC/add_user" id="createForm">
            
        <div class="form-group">
          <label for="cat_id">username *</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
        </div>
        <div class="form-group">
          <label for="p_name">password *</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
        </div>  
        <div class="form-group">
          <label for="email">email * </label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
        </div>  

        <button type="submit" class="btn btn-primary">Submit</button>
       </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php $this->load->view('/admin/foot'); ?>

<script> 
$(document).ready(function(){
    $('button.delete').click(function() { 
        var uid =this.id.toString();
       var r = confirm("Are you sure you want to delete id= " + uid );
       if(r === true){ // alert(' ok ');          
           $.ajax({
                url : "<?php echo base_url(); ?>adminC/delete_user",
                type : "POST",
                dataType : "text",
                data : {uid : uid}, 
                success : function(Message){
                    alert(Message);
                    window.location.href = "<?php echo base_url(); ?>adminC/user";
                },
                error : function(){
                  alert("Error delete user id= " + uid);
                }
                });
           
         }  else {
            alert(' delete canceld ');
         }
    }); // button delete 
  });
</script>


