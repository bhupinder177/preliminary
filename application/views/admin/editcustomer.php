<div id="wrapper" class="content-wrapper">

  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
      <li class="active">Edit Customer</li>
    </ol>
  </section>
  <section   class="content">
    <div class="container1">
      <div id="content">
        <div class="box content-box">
          <div class="box-success">
            <div class="box-body">
                <form action="<?php echo base_url(); ?>admin/customerUpdate/<?php echo $result->userId; ?>" method="post" enctype="multipart/form-data" class="reset" id="addcustomer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Name<span class="error">*</span></label>
                                    <input type="text" value="<?php echo $result->name; ?>" placeholder="Please enter name" class="form-control  characteronly" name="name"   id="name">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Email<span class="error">*</span></label>
                                    <input type="text" value="<?php echo $result->email; ?>" placeholder="Please enter email" class="form-control" name="email"   id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Phone<span class="error">*</span></label>
                                    <input type="text" value="<?php echo $result->phone; ?>" placeholder="Please enter phone" class="form-control" name="phone"   id="phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Address<span class="error">*</span></label>
                                    <input type="text" value="<?php echo $result->address; ?>" placeholder="Please enter address" class="form-control" name="address"   id="address">
                                </div>
                            </div>

                            <?php if(!empty($articles))
                            {
                              foreach($articles as $a)
                              {
                              ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label><?php echo $a->variationName; ?><span class="error">*</span></label>
                                  <input type="hidden" name="articles[]" value="<?php echo $a->variationId; ?>">
                                    <input type="checkbox"  value="1" name="checked[<?php echo $a->variationId; ?>]"   id="checked">
                                </div>
                            </div>
                          <?php } } ?>




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
