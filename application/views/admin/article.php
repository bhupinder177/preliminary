



    <div id="wrapper" class="content-wrapper">
      <section class="content-header">
      <ol class="breadcrumb">
          <li><a href="dashboard"><i class="fa fa-dashboard"></i>Dashboard</a> > </li>
          <li class="active">Article</li>
        </ol>
      </section>
      <section class="content portfolio-cont dsr">
        <div class="no-margin user-dashboard-container">
          <div  id="employeedsr" >


            <div id="content">
              <div class="no-border-radius">
                <div class="row">
                  <div class="col-md-12">

                  <div class="group-chat">
                  <div class="">

                    <!-- tabs -->
                    <div class="tab-content">
                      <div id="mydsr" class="tab-pane fade in active show membership-table">
                    <div class="box bg-white rounded c-pass-sec">
                      <div class="box-header with-border p-3">

                      <div class="row">
                        <div class="col-md-10">

                    </div>


                         <div class="col-md-2">
                          <a href="<?php echo base_url(); ?>admin/article/add"   class="btn btn-success mb-0">Add Artcile</a>
                        </div>

                      </div>

                    </div>


                     <div class="box-header with-border bg-white mt-3">
                      <div class="box-body">
                        <div class="table-responsive">
                        <table class="table">
                              <thead>
                                  <tr>
                                      <th >S.No</th>
                                      <th >Article</th>
                                      <th style="width: 25%">Status</th>
                                      <th >Action</th>
                                  </tr>
                              </thead>
                              <tbody class="articledata">
                                <?php
                                 if(!empty($result))
                                 {
                                   $start = $start + 1;
                                   foreach($result as $r)
                                   {
                                ?>
                                  <tr class="data">
                                      <td><?php echo $start++; ?></td>
                                      <td><?php echo $r->variationName; ?></td>
                                    <td>  <div class="form-group">
                                      <select data-id="<?php echo $r->variationId; ?>" class="form-control companyStatuschange">
                                        <option value="">Select Status</option>
                                        <option data-id="<?php echo $r->variationId; ?>" <?php if($r->variationStatus == 1){ echo "selected"; } ?>   value="1">Active</option>
                                        <option data-id="<?php echo $r->variationId; ?>" <?php if($r->variationStatus == 0){ echo "selected"; } ?>  value="0">InActive</option>
                                      </select>
                                    </div>
                                  </td>




                                      <td>
                                       <a href="<?php echo base_url(); ?>admin/article/edit/<?php echo $r->variationId; ?>"><i class="fa fa-edit"></i></a>&nbsp;
                                       <a class="deleterecord" data-link="<?php echo base_url(); ?>admin/articleDelete" data-id="<?php echo $r->variationId; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                       </td>
                                  </tr>
                                <?php } }
                                     else
                                         {
                                           ?>
                                      <tr><td colspan="5">No record</td></tr>
                                    <?php } ?>
                              </tbody>
                          </table>
                        <div  class="articlepagination">
                          <?php echo $links; ?>

                        </div>
                          </div>
                      </div>
                    </div>








                    </div>
                  </div>

                  </div>
                </div>
                </div>
                  </div>
                  <!-- col -md-12 -->

                  <!-- delete confirm modal -->
                               <div id="deleteconfirm" class="modal fade" role="dialog">
                             <div class="modal-dialog">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   <h4 class="modal-title">Delete</h4>
                                 </div>
                                 <div class="modal-body driverdetails">
                                   <h5 class="messagetext">Are you sure to  delete this record ?</h5>
                                   <input type="hidden" value="" name="id" class="deleteId">
                                   <input type="hidden" value="" name="link" class="deletelink">
                                      </div>

                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-success datadelete" >Delete</button>
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 </div>
                               </div>

                             </div>
                           </div>
                               <!-- delete confirm modal -->

                               <!-- confirm modal -->
                                            <div id="confirm" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Status</h4>
                                              </div>
                                              <div class="modal-body driverdetails">
                                                <h5 class="messagetext"></h5>
                                                <input type="hidden" value="" name="id" class="userId">
                                                <input type="hidden" value="" name="status" class="userstatus">
                                                   </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-success updatestatus" >Confirm</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                            <!-- confirm modal -->

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>
    </div>


    <!-- *********************Data****************************** -->
