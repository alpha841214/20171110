 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller {

	public function __construct() {
		parent::__construct();
    $this->load->model('user_model');
    $this->load->model('product_model');
    $this->load->model('orders_model');
	}

	public function index($msg="<h1></h1>") { // echo 'welcome to admin index page <br>' ;
     // $this->user();
      $this->user();
    }

public function login() {  //echo 'welcome to admin login page <br>' ;
      //$this->load->view('admin/login');
  
        if ( trim($this->input->post('username') ) === "admin" && trim($this->input->post('password') ) === "admin"){
            echo " <h1  class='bg-success'>admin login ok! </h1>";
            
            $data = array(
              'is_logged_in'  => true  ,
              'user'          => 'admin'
            );
            $this->session->set_userdata($data);

            $this->user();
          
        }else {
             $msg="<h1> login not good </h1>";
             $this->index($msg);
        }
      
     
	}

 
  function logout() {
    if($this->session->userdata('is_logged_in')){
      $this->session->sess_destroy();
    }
      //$data['msg']="<h1 class='bg-success'>You logged out. </h1>";
      //$this->load->view('admin/login', $data);
      redirect('adminC');
  }


//====================================================================

 public function user($msg='') {  //echo 'welcome to admin index page aaa<br>' ;
        
    /*    if($this->session->userdata('user') !== 'admin' ){
             $data['msg']="<h1 class='bg-danger'>You have to login first.</h1>";
             $this->load->view('admin/login', $data);
        }
        else
    */  
        {
            // echo 'welcome to admin user page <br>' ;
          $data["select_data"] = $this->user_model->select();  
          $data['pagename'] = 'User page';
          $data['msg'] = $msg ;
          $this->load->view("admin/user", $data);
          
        }
    
  }

 public function add_user() {  //echo 'This is add_user page<br>';
      $username = $this->input->post('username'); //echo $username; echo '<br>';
      $password = $this->input->post('password'); //echo $password; echo '<br>';
      $email = $this->input->post('email'); //echo $email; echo '<br>';

      $query = $this->user_model->resolve_only_user($username);
      if ($query->num_rows() == 1){
          $this->user( 'The username has been taken, please try other username. <br> ');           
       } else {
          $arr =  array(
            'username'   => $username,
            'email'      => $email,
            'password'   => $password
          );

          if($this->user_model->insert($arr)) {
            $this->user('insert OK');
          }else {
           $this->user('insert not OK');
          }
            
       }
  }


   public function delete_user() {  
    /*if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else
        */
        {

          $this->load->model("user_model");
          $uid = intval($this->input->post('uid'));
          //echo 'id='. $uid;
          
          $del = $this->user_model->delete_user($uid);
          
           if($del){
             echo 'delete ok.';
           }else {
             echo 'delete fail.';
           }
           
        }
  }

//==========================================================

   public function edit_user() { 
   if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{ 

        $decoded = json_decode($_POST['myData'],true);
        $data = $this->user_model->edit_user($decoded);
          
        $output= array();
        foreach($data as $row){
            $output['username'] = $row->username ;
            $output['password'] = $row->password ;
            $output['email'] = $row->email;
            $output['uid'] = $row->id;
            //$output .= $row->active ;
        }
      echo json_encode($output);
    
  }
}


 public function update_user($id) {  //echo 'update user id=' . $id . '<br>' ;
  if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{
 
      if($this->input_verification() === false){
          $data['msg'] = '<h1 style=" color:red; ">input verification fail. </h1>';
          $data["user"] = $this->user_model->fetch_all();
          $this->load->view('admin/user', $data); 

       }else {
          $username = $this->input->post('username'); //echo $username; echo '<br>';
          $password = $this->input->post('password'); //echo $password; echo '<br>';
          $email = $this->input->post('email'); //echo $email; echo '<br>';
          
          $query = $this->user_model->resolve_only_user($username);
          if ($query->num_rows() !== 1){
          //echo 'The username has been taken, please signup again. <br> ';
            $data['msg'] = '<h1 style=" color:red; ">You can not change the username, try again. </h1>';
            $data["user"] = $this->user_model->fetch_all();
            $this->load->view('admin/user', $data); 
          }else{

            $update = $this->user_model->update_user($id, $username, $email, $password, 1);
            if($update === TRUE)  {
                  //echo 'Edit user ok.  <br>';
                  $data['msg'] = '<h1 style=" color:green; ">Edit user account ok.</h1>';
                  $data["user"] = $this->user_model->fetch_all();
                  $this->load->view('admin/user', $data);
                  
                }else {
                  //echo 'Edit user fail  <br>';
                  $data['msg'] = '<h1 style=" color:red; ">Edit user account fail. </h1>';
                  $data["user"] = $this->user_model->fetch_all();
                  $this->load->view('admin/user', $data); 
                }

          }

       }
    
     }
 }


  
 //=====================================================================
  
  public function product($msg=null) {  //echo 'welcome to admin product page <br>' ;
  
   /* if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else
    */
    {

        $data["msg"] = $msg;        
        $data["product"] = $this->product_model->fetch_all();
        $this->load->view("admin/product", $data);
    }
    
  }


  public function create_product() { // echo 'This is create product page<br>';
     /* if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{  
           if($this->verify_product() === false){
              $this->product('input verification fail');
           }else 
      */
           {
           
              $cat_id = $this->input->post('cat_id'); //echo $cat_id; echo '<br>';
              $p_name = $this->input->post('p_name'); //echo $p_name; echo '<br>';
              $p_price = $this->input->post('p_price'); //echo $p_price; echo '<br>';
              $p_image = $this->input->post('p_image'); //echo $p_image; echo '<br>';

              $create = $this->product_model->create_product($cat_id, $p_name, $p_price, $p_image);
              if($create === TRUE)  { $this->product('create product suceed');}
              else {$this->product('create product fail');}

           }
        }
  

   public function delete_product() {  
      if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{
          $this->load->model("product_model");
          $del = $this->product_model->delete_product();
          
           if($del){
             echo 'delete ok.';
           }else {
             echo 'delete fail.';
           }
        }
  }

   public function edit_product() {  //echo 'edit product page';
    if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{
            $decoded = json_decode($_POST['myData'],true);
            $data = $this->product_model->edit_product($decoded);
              
            $output= array();
            foreach($data as $row){
                $output['cat_id'] = $row->cat_id;
                $output['p_name'] = $row->p_name ;
                $output['p_price'] = $row->p_price ;
                $output['p_image'] = $row->p_image;
                $output['p_id'] = $row->p_id;
            }
            echo json_encode($output);
      }
  }

  public function product_edit_verification(){
      return true;

  }



public function update_product($id) {  //echo 'update product page, pid=' . $id;
  if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else{
            if($this->product_edit_verification() === false){
                    $this->product('product verification fail');
                 } else {
                    $cat_id = $this->input->post('edit_cat_id'); //echo $cat_id; echo '<br>';
                    $p_name = $this->input->post('edit_p_name'); //echo $p_name; echo '<br>';
                    $p_price = $this->input->post('edit_p_price'); //echo $p_price; echo '<br>';
                    $p_image = $this->input->post('edit_p_image'); //echo $p_image; echo '<br>';
                    
                    $update = $this->product_model->update_product($id, $cat_id, $p_name, $p_price, $p_image);

                    if($update === TRUE)  { $this->product('update product suceed');}
                    else {$this->product('update product fail');;}
                    
                 }
              }
}





  //================================================================================  

  public function image_upload() { //echo 'welcome to admin index page <br>' ;
    /*  if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else
    */
        {
              $data['title'] = "Upload Image using Ajax JQuery";  
                  $this->load->view('admin/image_upload', $data);  
        }
    
  }


  function ajax_upload()  {  
/*if($this->session->userdata('user') !== 'admin' ){
          redirect('adminC');
        }else
*/
        {

           if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
                     $data = $this->upload->data();  
                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
                }  
           }  
      } 
    }     
}