



   <div id="sidebar">
       <ul>
               <li <?php if($this->uri->segment(2) =="dashboard") { ?> class="active" <?php } ?>>
                   <a href="<?php echo base_url(); ?>admin/dashboard">
                       <img src="<?php echo base_url(); ?>assets/images/dashboard.png" class="img-fluid"> Dashboard</a>
               </li>


               <li <?php if($this->uri->segment(2) =="articlelist") { ?> class="active" <?php } ?>>
                   <a href="<?php echo base_url(); ?>admin/articlelist">
                       <img src="<?php echo base_url(); ?>assets/images/dashboard.png" class="img-fluid">Article</a>
               </li>

               <li <?php if($this->uri->segment(2) =="customer") { ?> class="active" <?php } ?>>
                   <a href="<?php echo base_url(); ?>admin/customer">
                       <img src="<?php echo base_url(); ?>assets/images/dashboard.png" class="img-fluid">Customer</a>
               </li>


       </ul>
   </div>
