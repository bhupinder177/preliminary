<div id="wrapper" class="content-wrapper">

  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
      <li class="active">Password</li>
    </ol>
  </section>
  <section   class="content">
    <div class="container1">
      <div id="content">
        <div class="box content-box">
          <div class="box-success">
            <div class="box-body">
                <form action="<?php echo base_url(); ?>admin/passwordUpdate" method="post" enctype="multipart/form-data" class="reset" id="newpasswordform">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                  <label>Password<span class="error">*</span></label>
                                    <input type="password" placeholder="Please enter password" class="form-control" name="password"   id="password">

                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                  <label>Confirm Password<span class="error">*</span></label>
                                    <input type="password" placeholder="Please enter confirm password" class="form-control " name="confirm_password"   id="confirm_password">
                                </div>
                            </div>




          <div class="col-md-12">

            <div class="form-group">
               <button type="submit"  class="btn btn-success" >Update</button>
               <button type="button"  class="cancel btn btn-success" >Cancel</button>
             </div>
             </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- *********************Data****************************** -->
