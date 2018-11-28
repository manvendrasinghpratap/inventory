<?php $__env->startSection('content'); ?>
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/jquery.dataTables.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
   <div class="page-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="portlet box">
               <div class="portlet-body">
                  <div class="row mbm">
                     <div class="col-lg-12">
                        <div class="portlet portlet-white">
                        <div class="portlet-header pam mbn">
                           <div class="caption"><?php echo e(array_values($breadcrumb)[0]); ?></div>
                           <div class="actions">
                              <a href="<?php echo e(url(key($listing))); ?>" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                 <?php echo e(array_values($listing)[0]); ?>

                              </a>&nbsp;
                           </div>
                        </div>
                           <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="portlet-body pan">
                           <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
                                 <th width="2%">S.No.</th>
                                 <th width="10%">Invoice</th>
                                 <th width="10%">State Name</th>
                                 <th width="10%">Bank Name</th>
                                 <th width="10%">Branch Name</th>
                                 <th width="5%">GST No.</th>
                                 <th width="5%">Total Amount</th>
                                 <th width="1%">Discount</th>
                                 <th width="5%">GST</th>
                                 <th width="5%">Net Pay</th>
                                 <th width="5%">Invoice <br>Date</th>
                                 <th width="2%">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php ( $i=0); ?>
                              <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr id="hide_<?php echo e($row->invoice); ?>">
                                    <td><?php echo e(++$i); ?></td>                                    
                                    <td><?php echo e($row->invoice); ?></td>                                    
                                    <td><?php echo e($row->statename); ?></td>                                    
                                    <td><?php echo e($row->bank_name); ?></td>                                    
                                    <td><?php echo e($row->branch_name); ?></td>                                    
                                    <td><?php echo e($row->gst_no); ?></td>                                                   
                                    <td><?php echo e($row->totalamount); ?></td>                                                   
                                    <td><?php echo e($row->discount); ?></td>                                                   
                                    <td><?php echo e($row->gst); ?></td>                                    
                                    <td><?php echo e($row->netpayableamount); ?></td>                                    
                                    <td><?php echo e(date('d-m-Y',strtotime($row->invoice_date))); ?></td>                                    
                                    <td>
                                       <a target='_blank' class="btn btn-default btn-xs edit" href="<?php echo e(URL::to('print/'.\App\Helpers\Common::encodeParam($row->invoice) )); ?>" title="Print Invoice"> <i class="fa fa-print"></i></a>
                                       <button type="button" data-deleteColumnName = "invoice" class="btn btn-default btn-xs confirmDeleteStatus" data-siteurl ="<?php echo e(url('/')); ?>" data-tablename="invoices" data-record-id="<?php echo e($row->invoice); ?>" data-record-title="Are you sure you want to delete this Invoice?" data-toggle="modal" data-target="modal-confirm" data-succuss="Product deleted successfully">
                                          <i class="fa fa-trash-o "></i></button>
                                    </td>
                                 </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                           </table>
                        </div>
                        </div>
                        <div style="float:right;">
                           <?php echo e($invoices->links()); ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<!--LOADING SCRIPTS FOR PAGE-->
<?php $__env->startPush('scripts'); ?>
   <script src="<?php echo asset('public/js/jquery.dataTables.min.js'); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>