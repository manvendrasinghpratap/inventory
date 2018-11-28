<?php $__env->startSection('content'); ?>
<style>
.panel-sub-heading {
        color: #FFFFFF;
        background: #0a8;
        border-color: #0a8 !important;
        height: 33px;
        font-size: 16px;
        clear: both;
        text-align: center;
        padding-top: 7px;
}
</style>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">View Product And Size</div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['method'=>'post','url'=>'updateProduct','files'=>'true','class'=>'form-horizontal','role'=>'form'])); ?>

						   <?php echo e(Form::hidden('id', $productdetails['id'], array('name'=>'id'))); ?>

							 <div class="form-body pal">
								 <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">Product Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('name', $productdetails['name'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Product Name"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
									  </div>
								   </div>
								</div>
								<div class="form-group <?php echo e($errors->has('gst') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">GST <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('gst', $productdetails['gst'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Enter GST"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('gst')); ?></span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group <?php echo e($errors->has('hsn') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">HSN <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('hsn', $productdetails['hsn'], array('class' => 'form-control','placeholder'=>"Enter HSN"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('hsn')); ?></span>
									  </div>
								   </div>
								</div>
								 <hr/>
                                <div class="panel-sub-heading">View Size </div>
                                <br>
                                 <div class="col-md-3"></div>
								<div class="col-md-9">
                                   <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                      <thead>                                          
                                       <tr>
                                           <th width="50%" >Size</th>
                                           <th width="40%" >Price</th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                      <?php ($i=0); ?>
                                      <?php $__currentLoopData = $categorydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <td><?php echo e(Form::text('size', $categorydetail['name'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Enter Size",'name'=>'size[]'))); ?></td>
                                          <td><?php echo e(Form::number('price', $categorydetail['rate'], array('disabled'=>true,'class' => 'form-control addNew ','placeholder'=>"Enter Price",'name'=>'price[]','min'=>0))); ?></td>
                                      </tr>
                                       <?php (++$i); ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tbody>                                       
                                   </table>                                    
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <?php echo link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']); ?>

								 </div>
							 </div>
						  <?php echo e(Form::close()); ?>

					   </div>
					</div>
				 </div>
				 </div>
               <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>