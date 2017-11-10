<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Posts</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
    <link href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">  </script>
    <!-- <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/home.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/jquery/jquery.min.js"></script> -->
  </head>
  <body>

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

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div style="background-color:pink; color:red; text-align: center;"><?php echo $msg; ?> </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="login" style="height:300px;" method="post" action="<?php echo base_url(); ?>adminC/login" class="well">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>

  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
