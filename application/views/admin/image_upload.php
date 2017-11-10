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
  <li><a href="<?php echo base_url() . 'homeC/contact';  ?>">Traction Table</a></li>
  
  <li style="float:right; "><a href="<?php echo base_url() . 'adminC/logout';  ?>">logout</a></li>
</ul>
<br/><br/>

    <section id="main">
      <div class="container">
        <div class="row">
        <?php $this->load->view('/admin/sidebar'); ?>

          <div class="col-md-9">
   
              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Image Upload</h3>
                </div>
                <div class="panel-body">

                <div class="container">  
                     <br /><br /><br />  
                     <h3 align="center"><?php echo $title; ?></h3>  
                     <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                          <input type="file" name="image_file" id="image_file" />  
                          <br />  
                          <br />  
                          <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
                     </form>  
                     <br />  
                     <br />  
                     <div id="uploaded_image">  
                     </div>  
                </div>  
  
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <br><br>
    <footer id="footer"><center>
      <p>Copyright AdminStrap, &copy; 2017</p>
    </center></footer>

    <!-- Modals -->

    <!-- Add Page 
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
  </body>
</html>

<script>  
 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>adminC/ajax_upload",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  
