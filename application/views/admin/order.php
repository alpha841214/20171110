<!DOCTYPE html>
<html lang="en">
<head >
    <title>oder page</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
      <script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">  </script>
</head>

<body style="font-family: Arial">

<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
         
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, Admin</a></li>
            <li><a type="button"  class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>adminC/logout" >Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
        </div>
      </div>
    </header>

     <section id="main">
      <div class="container">
        <div class="row">


          
          <?php $this->load->view('/admin/sidebar'); ?>

         <!--<button type="button" style="margin-right:15px;"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Modal</button>-->

          <div class="col-md-9">
          <div style="width:450px"> <h2  style="color:red;" ><?php  echo $msg; ?> </h2></div>
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Order table</h3>
              </div>
              <div class="panel-body">


    <form id="form1" >
        <div style="width: 700px; border: 1px solid black; padding: 5px">

            <table id="datatable">
                <thead>
                    <tr>
                        <th>oid
                        </th>
                        <th>uid
                        </th>
                        <th>cart
                        </th>
                        <th>createtime
                        </th>
                        <th>totprice
                        </th>
                        <th>edit 
                        </th>
                        <th>delete 
                        </th>
                    </tr>
                </thead>
                <tbody>

                <?php              
                     foreach($orders as $row)
                         {
                          echo ' 
                            <tr>
                            <td>'.$row->oid.'</td>
                            <td>'.$row->uid.'</td>
                            <td>' .'<button type="button" class="btn btn-info viewCart" id="' . $row->oid . '">view cart </button>'.'</td>
                            <td>'.$row->createtime.'</td>
                            <td>'.$row->totprice.'</td>
                            <td>' .'<button type="button" class="btn btn-info edit"  data-toggle="modal" data-target="#editOrder"  id="' . $row->oid . '">edit </button>'.'</td>
                            <td>' .'<button type="button" class="btn btn-danger delete" id="' .$row->oid . '">delete </button>'.'</td>
                            
                            </tr>';
                         }
              
              ?>
              
                </tbody>
            </table>
           
        </div>
    </form>

     </div>
              </div>

          </div>
        </div>
      </div>
    </section>


<!-- modal starts here -->
<div id="modal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">cart information</h4>
            </div>
            <div class="modal-body" id= "modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>
<!--Modal ends here -->

<!--modal edit order -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editOrder">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Order</h4>
      </div>
      <form method="post" action="<?php echo base_url(); ?>adminC/update_product" id="edit_o_form">
       <div class="modal-body">        
        <div class="form-group">
          <label for="oid">oid *</label>
          <input type="text" class="form-control" id="edit_oid" name="edit_oid" placeholder="oid">
        </div>
        <div class="form-group">
          <label for="uid">uid *</label>
          <input type="text" class="form-control" id="edit_uid" name="edit_uid" placeholder="uid">
        </div>  
        <div class="form-group">
          <label for="createtime">createtime * </label>
          <input type="text" class="form-control" id="edit_createtime" name="edit_createtime" placeholder="createtime">
        </div>  
        <div class="form-group">
          <label for="totprice">totprice * </label>
          <input type="text" class="form-control" id="edit_totprice" name="edit_totprice" placeholder="totprice">
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


<!-- Modal end-->
    
   

  </body>
</html>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
-->
<script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });

      $('button.delete').click(function() { 
       var r = confirm("Are you sure you want to delete it? ");
       if(r === true){
           var oid = this.id.toString();
           //alert('oid='+oid);
           
           $.ajax({
                url : "<?php echo base_url(); ?>adminC/delete_order",
                type : "POST",
                dataType : "text",
                data : {oid : oid}, 
                success : function(Message){
                    alert(Message);
                    window.location.href = "<?php echo base_url(); ?>adminC/order";
                },
                error : function(){
                  alert("Error 1");
                }
                });
            
         }
    }); // button delete 

    $('button.edit').click(function() { 
            var oid = this.id.toString();
           //alert('oid='+oid);
           
           var myData = JSON.stringify(oid);
           $.ajax({
                url : "<?php echo base_url(); ?>adminC/edit_order",
                type : "POST",
                dataType : "json",
                data: {myData: myData},
                success : function(response){
                    //alert(JSON.stringify(response));
                    $("#edit_oid").val(response.oid);
                    $("#edit_uid").val(response.uid);
                    $("#edit_createtime").val(response.createtime);
                    $("#edit_totprice").val(response.totprice);
                    //alert('oid=' + response.oid);
                    $('#edit_o_form').attr('action', "<?php echo base_url(); ?>adminC/update_order/" + response.oid.toString());
                                    
                },
                error : function(){
                  alert("Error 1");
                }
          }) ;  
          
    }); // button edit

     $(document).on("click", ".viewCart", function () {
  
   var oid = this.id.toString() ; 
   //alert('oid=' + oid);
   
    $.ajax({
              url : "<?php  echo base_url();  ?>adminC/cartInfo",
              type: "POST",              
              dataType: "JSON",
              data : {'oid' : oid   },
              success: function(data)
              {      
                  if(data.status) //if success close modal and reload ajax table
                  { 
                      
                      //alert('ok, '+data.msg + 'oid=' + data.oid  );
                      $('#modal').modal('show'); // show bootstrap modal
                      $('#modal-body').html(data.msg);
                      
                  }else { alert('ajax error'); }                 
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                    alert(data.msg);
              }
    });
    
  }); //viewCart

</script>


