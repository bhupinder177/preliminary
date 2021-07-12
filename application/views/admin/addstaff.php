    <div id="wrapper" class="content-wrapper">

      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
          <li class="active">Add Staff</li>
        </ol>
      </section>
      <section   class="content">
        <div class="container1">
          <div id="content">
            <div class="box content-box">
              <div class="box-success">
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>admin/staffSave" method="post" enctype="multipart/form-data" class="reset" id="addstaff">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Name<span class="error">*</span></label>
                                        <input type="text" placeholder="Please enter name" class="form-control  characteronly" name="name"   id="name">
                                        <input type="hidden" value="2" name="type"   id="type">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Email<span class="error">*</span></label>
                                        <input type="text" placeholder="Please enter email" class="form-control" name="email"   id="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Phone<span class="error">*</span></label>
                                        <input type="text" placeholder="Please enter phone" class="form-control" name="phone"   id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Can edit order<span class="error">*</span></label>
                                        <select  class="form-control" name="role"   id="role">
                                          <option value="">Select Option</option>
                                          <option value="1">Yes</option>
                                          <option value="2">No</option>

                                        </select>
                                    </div>
                                </div>





              <div class="col-md-12">

                <div class="form-group">
                   <button type="submit"  class="btn btn-success" >Submit</button>
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
