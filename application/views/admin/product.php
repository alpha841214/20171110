<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

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
            <div style="width:450px"  >  <h2  style="color:red;" ><?php  echo $msg; ?> </h2></div>
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Products</h3>
                </div>  
                <br>
                  <table class="table table-striped table-hover table-responsive">
                      <tr>
                        <th>p_id</th>
                        <th>cat_id</th>
                        <th>p_name</th>
                        <th>p_price</th>
                        <th>p_image</th>
                        <th> <!--<a class="btn btn-success" href="#">Add New</a> --> 
                          <button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addProduct" 
                          > Add Product
                          </button>
                        </th>
                      </tr>
                      
                      <?php
                         foreach($product as $row)
                         {
                          echo ' 
                            <tr>
                            <td>'.$row->p_id.'</td>
                            <td>'.$row->cat_id.'</td>
                            <td>'.$row->p_name.'</td>
                            <td>'.$row->p_price.'</td>
                            <td>'.$row->p_image.'</td>
                            <td>' .
                                '<button class="btn btn-info edit" data-toggle="modal" data-target="#EditProduct"
                                  id="' . $row->p_id . '" >Edit</button> 
                                <button   class="btn btn-danger delete"  id="' . $row->p_id . '" >Delete</button>' .
                            '</td> 
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
<br/><br />
    <footer id="footer"><center>
        <p>Copyright  &copy; 2017</p>
   </center> </footer>
</div> <!-- container -->

<!-- ================================================= -->
<!-- add product -->
  <div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <form method="post" action="<?php echo base_url(); ?>adminC/create_product" id="createForm">
      <div class="modal-body">        
        <div class="form-group">
          <label for="cat_id">cat_id *</label>
          <input type="text" class="form-control" id="cat_id" name="cat_id" placeholder="cat_id">
        </div>
        <div class="form-group">
          <label for="p_name">p_name *</label>
          <input type="text" class="form-control" id="p_name" name="p_name" placeholder="p_name">
        </div>  
        <div class="form-group">
          <label for="email">p_price * </label>
          <input type="text" class="form-control" id="p_price" name="p_price" placeholder="p_price">
        </div>  
        <div class="form-group">
          <label for="p_image">p_image * </label>
          <input type="text" class="form-control" id="p_image" name="p_image" placeholder="p_image">
        </div>  
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!-- edit product -->
  <div class="modal fade" tabindex="-1" role="dialog" id="EditProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Product</h4>
      </div>
      <form method="post" action="<?php echo base_url(); ?>adminC/update_product" id="edit_p_form">
       <div class="modal-body">        
        <div class="form-group">
          <label for="cat_id">cat_id *</label>
          <input type="text" class="form-control" id="edit_cat_id" name="edit_cat_id" placeholder="cat_id">
        </div>
        <div class="form-group">
          <label for="p_name">p_name *</label>
          <input type="text" class="form-control" id="edit_p_name" name="edit_p_name" placeholder="p_name">
        </div>  
        <div class="form-group">
          <label for="email">p_price * </label>
          <input type="text" class="form-control" id="edit_p_price" name="edit_p_price" placeholder="p_price">
        </div>  
        <div class="form-group">
          <label for="p_image">p_image * </label>
          <input type="text" class="form-control" id="edit_p_image" name="edit_p_image" placeholder="p_image">
        </div>  
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Product</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
      <!-- Modal ends -->

<?php $this->load->view('/admin/foot'); ?>



<script> 
$(document).ready(function(){
    $('button.delete').click(function() { 
       var r = confirm("Are you sure you want to delete it? ");
       if(r === true){
           var p_id = this.id.toString();
           //alert(' p_id= ' +p_id);
           
           $.ajax({
                url : "<?php echo base_url(); ?>adminC/delete_product",
                type : "POST",
                dataType : "text",
                data : {p_id : p_id}, 
                success : function(Message){
                    alert(Message);
                    window.location.href = "<?php echo base_url(); ?>adminC/product";
                },
                error : function(){
                  alert("Error 1");
                }
                });
            
         }
    }); // button delete 

    $('button.edit').click(function() { 
           
           var myData = JSON.stringify(this.id.toString());
           $.ajax({
                url : "<?php echo base_url(); ?>adminC/edit_product",
                type : "POST",
                dataType : "json",
                data: {myData: myData},
                success : function(response){
                    //alert(JSON.stringify(response));
                    $("#edit_cat_id").val(response.cat_id);
                    $("#edit_p_name").val(response.p_name);
                    $("#edit_p_price").val(response.p_price);
                    $("#edit_p_image").val(response.p_image);
                    //alert('p_id=' + response.p_id);
                    $('#edit_p_form').attr('action', "<?php echo base_url(); ?>adminC/update_product/" + response.p_id.toString());
                                    
                },
                error : function(){
                  alert("Error 1");
                }
          }) ;  
    }); // button edit

  });

</script>