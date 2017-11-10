<?php $this->load->view('/crud/header'); ?>
<h1   style="text-align:center;"> <?php  echo $pagename;  ?> </h1>

      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>Username</th>  
                     <th>Password</th>  
                     <th>Email</th>  
                     <th>Active</th>  
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



<?php $this->load->view('/crud/footer'); ?>