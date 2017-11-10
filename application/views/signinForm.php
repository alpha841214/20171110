
<?php $this->load->view('/templates/header'); ?>
<div class="container">
  <h3>This is signinForm Page</h3>
</div>

<?php  
  echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
 ?> 

<form action="<?php  echo base_url('homeC/signin_validation'); ?>" method="post">
        <div class="form-group" >
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Your username" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
        </div>

        <div id="captchaImg">
        <label>Captcha </label><br />
        <input  type="text" name="captcha" placeholder="type captcha here" required>
        <br /> <br />
        <?php  echo $captcha;   ?>
        &nbsp &nbsp &nbsp &nbsp
        <button onclick="dorefresh()">refresh Captcha</button>
        <br /><br />
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-default" value="Submit">
        </div>
      </form>

        
      <script>
      function dorefresh() {
          window.location.reload(true);
      }
      </script>

      <?php $this->load->view('/templates/footer'); ?>