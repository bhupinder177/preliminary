    <div id="wrapper" class="content-wrapper">

      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
          <li class="active">Add Article</li>
        </ol>
      </section>
      <section   class="content">
        <div class="container1">
          <div id="content">
            <div class="box content-box">
              <div class="box-success">
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>admin/articleSave" method="post" enctype="multipart/form-data" class="reset" id="addvariation">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Article<span class="error">*</span></label>
                                        <input type="text" placeholder="Please enter article" class="form-control variationName characteronly" name="variationName"   id="variationName">

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Status<span class="error">*</span></label>
                                        <select type="text"  class="form-control variationStatus1" name="variationStatus"   id="variationStatus">
                                          <option value="">Select Status</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
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
