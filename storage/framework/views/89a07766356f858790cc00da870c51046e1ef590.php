<?php $__env->startSection('content'); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Product</div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['method'=>'post','url'=>'addProduct','files'=>'true','class'=>'form-horizontal','role'=>'form'])); ?>

							 <div class="form-body pal">
								 <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">Product Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('name', '', array('class' => 'form-control','placeholder'=>"Product Name"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
									  </div>
								   </div>
								</div>
								<div class="form-group <?php echo e($errors->has('gst') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">GST <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('gst', '', array('class' => 'form-control','placeholder'=>"Enter GST"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('gst')); ?></span>
									  </div>
								   </div>
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary"><?php echo e(trans('message.submit')); ?></button>&nbsp;
									 <button type="reset" class="btn btn-green"><?php echo e(trans('message.reset')); ?></button>
									 <?php echo link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']); ?>

								 </div>
							 </div>
						  <?php echo e(Form::close()); ?>

					   </div>
					</div>
				 </div>
				 </div>
	 </div>
  </div>
</div>
               <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo asset('public/js/select2.min.js'); ?>"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#category_id").select2({closeOnSelect:false});
        });//]]>

	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>