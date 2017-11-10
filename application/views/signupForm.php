<?php $this->load->view('/templates/header'); ?>
<div class="container">
  <h3>This is signupForm Page</h3>
</div>

<?php  
  echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
 ?> 

			<form action="<?php echo base_url('homeC/signup_validation'); ?>" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
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
					<input type="submit" class="btn btn-default" value="Signup">
				</div>
			</form>
      <script>
      function dorefresh() {
          window.location.reload(true);
      }
      </script>

 <?php $this->load->view('/templates/footer'); ?>