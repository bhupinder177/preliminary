



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

               <li <?php if($this->uri->segment(2) =="customerlist") { ?> class="active" <?php } ?>>
                   <a href="<?php echo base_url(); ?>admin/customerlist">
                       <img src="<?php echo base_url(); ?>assets/images/dashboard.png" class="img-fluid">Customer</a>
               </li>

               <li <?php if($this->uri->segment(2) =="stafflist") { ?> class="active" <?php } ?>>
                   <a href="<?php echo base_url(); ?>admin/stafflist">
                       <img src="<?php echo base_url(); ?>assets/images/dashboard.png" class="img-fluid">Staff</a>
               </li>

       </ul>
   </div>
