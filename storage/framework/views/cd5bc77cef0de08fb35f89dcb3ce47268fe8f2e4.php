<?php $__env->startSection('content'); ?>
<style>
    .heading_middle{
        font-size: larger;
        background-color: #6D7CA4;
        color: white;
        height: 27px;
        width: 96%;
        padding: 2px 20px;
    }

</style>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Generate Invoice</div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['method'=>'post','url'=>'generateInvoice','files'=>'true','class'=>'form-horizontal','role'=>'form'])); ?>

							 <div class="form-body pal">
							 <div class="form-group <?php echo e($errors->has('bank_id') ? 'has-error' : ''); ?>">
									 <label for="name" class="col-md-3 control-label">Select State</label>
									 <div class="col-md-9">
										 <div class="input-icon"><i class="fa fa-user"></i>
											 <?php echo e(Form::select('state_id', ['--Select State--']+$states,'', array('id'=>'state_id','name'=>'state_id','class' => 'form-control-select'))); ?>

											 <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
										 </div>
									 </div>
								 </div>
							 <div class="form-group <?php echo e($errors->has('bank_id') ? 'has-error' : ''); ?>">
									 <label for="name" class="col-md-3 control-label">Select Bank</label>
									 <div class="col-md-9">
										 <div class="input-icon"><i class="fa fa-user"></i>
											 <?php echo e(Form::select('bank_id', ['--Select Bank--']+$bankDetail,'', array('id'=>'bank_id','class' => 'form-control-select'))); ?>

											 <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
										 </div>
									 </div>
								 </div>
							 
							 
								 <div class="form-group <?php echo e($errors->has('branch_name') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">Branch Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('branch_name', '', array('class' => 'form-control','placeholder'=>"Branch Name"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('branch_name')); ?></span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group <?php echo e($errors->has('gst_no') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">GST No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('gst_no', '', array('class' => 'form-control','placeholder'=>"GST Number"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('gst_no')); ?></span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group <?php echo e($errors->has('Invoice No.') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label">Invoice No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('invoice', '', array('class' => 'form-control','placeholder'=>"Invoice Number"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('invoice')); ?></span>
									  </div>
								   </div>
								</div>
								<hr>
								<div>
                                   <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                      <thead>                                          
                                       <tr>
                                           <th width="25%" >Product Name</th>
                                           <th width="15%">Sub Category</th>
                                           <th width="10%">Rate</th>
                                           <th width="10%">GST</th>
                                           <th width="15%" >Quantity</th>
                                           <th width="15%" >Price</th>
                                           <th></th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                           
                                            <td>
                                                <?php echo e(Form::select('product_id[]', ['--Select Product Name--']+$product,'', array('id'=>'product_id','tr_no'=>1,'name'=>'product_id[]','class' => 'form-control-select','onChange'=>'setProductDetails(this.value,1)'))); ?>

                                            </td>
                                            <td><?php echo e(Form::text('sub_category[]', '', array('class' => 'form-control','name'=>'sub_category[]','readonly'=> true,'placeholder'=>"Enter Quantity",'id'=>'sub_category_1'))); ?> </td>
                                            <td><?php echo e(Form::text('rate[]', '', array('class' => 'form-control','name'=>'rate[]','readonly'=> true,'placeholder'=>" Rate",'id'=>'rate_1'))); ?> </td>
                                            <td><?php echo e(Form::text('gst[]', '', array('class' => 'form-control','name'=>'gst[]','readonly'=> true,'placeholder'=>" GST",'id'=>'gst_1'))); ?> </td>
                                            <td><?php echo e(Form::number('quantity[]', 0, array('min'=>'0','class' => 'form-control','name'=>'quantity[]','id'=>'quantity_1','placeholder'=>"Enter Quantity",'onblur'=>'getquantitybyrate(1),calculateSum()','onclick'=>'addAnotherRow()'))); ?> </td>
                                            <td><?php echo e(Form::text('ratebyquantity[]', '', array('class' => 'form-control qty1','name'=>'ratebyquantity[]','readonly'=> true,'placeholder'=>" Price",'id'=>'ratebyquantity_1'))); ?> </td>
                                            <td></td>
                                      </tbody>                                       
                                   </table>                                    
								</div>
                                 <div class="clear"></div>
                                 <br>
                                 <div class="form-group">
									 <label for="name" class="col-md-3 control-label">Total Amount</label>
									 <div class="col-md-9">
										 <div class="input-icon">
										 <?php echo e(Form::number('totalAmount', 0, array('min'=>'0','class' => 'form-control','name'=>'totalAmount','readonly'=> true,'id'=>'totalAmount','placeholder'=>"Total Amount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="form-group">
									 <label for="name" class="col-md-3 control-label">Discount(In Rs)</label>
									 <div class="col-md-9">
										 <div class="input-icon">
										 <?php echo e(Form::number('discountAmount', 0, array('min'=>'0','class' => 'form-control discount','name'=>'discountAmount','id'=>'discountAmount','placeholder'=>"Discount Amount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="form-group">
									 <label for="name" class="col-md-3 control-label">Amount After Discount</label>
									 <div class="col-md-9">
										 <div class="input-icon">
										 <?php echo e(Form::number('amountAfterDiscount', 0, array('min'=>'0','class' => 'form-control','name'=>'amountAfterDiscount','readonly'=> true,'id'=>'amountAfterDiscount','placeholder'=>"Amount After Discount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="form-group">
									 <label for="name" class="col-md-3 control-label">GST(%)</label>
									 <div class="col-md-9">
										 <div class="input-icon">
										 <?php echo e(Form::number('main_gst', 0, array('min'=>'0','class' => 'form-control','readonly'=> true,'name'=>'main_gst','id'=>'main_gst','placeholder'=>"GST"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="form-group">
									 <label for="name" class="col-md-3 control-label">Net Payable Amount</label>
									 <div class="col-md-9">
										 <div class="input-icon">
										 <?php echo e(Form::number('netPayableAmount', 0, array('min'=>'0','class' => 'form-control','readonly'=> true,'name'=>'netPayableAmount','id'=>'netPayableAmount','placeholder'=>"Net Payable Amount"))); ?>

										 </div>
									 </div>
								 </div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
								     <?php echo e(Form::hidden('siteUrl', url('/'), array('class' => 'form-control','placeholder'=>"Branch Name",'id'=>'siteUrl'))); ?>

								     <?php echo e(Form::hidden('tr_id',2, array('class' => 'form-control', 'id'=>'tr_id'))); ?>

								     
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

               <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo asset('public/js/select2.min.js'); ?>"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#bank_id").select2({closeOnSelect:false});
            $("#state_id").select2({closeOnSelect:false});
            $("#product_id").select2({closeOnSelect:false});
        });//]]>
        
        function setProductDetails(product_id,tr_no){
            var $_token = jQuery('#token').val();
            siteUrl = $('#siteUrl').val();
            var tr_id = $('#tr_id').val();
            var tr_id = tr_no;
            //var  new_tr_id_value = parseInt(tr_id)-1;
            var  new_tr_id_value = tr_no;
            
            $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/getproductDetails/" + product_id,
                async: true,
                success: function (data) {
                        var obj             = $.parseJSON(data);
                        var categoryArray    = obj.categoryName; 
                        var rate            = obj.rate; 
                        var gst             = obj.gst;
                        var ddd = $.parseJSON(obj.categoryName);
                    alert(ddd.categoryName);
                    return false;
                    $('#sub_category_'+new_tr_id_value).val(categoryName);
                    $('#rate_'+new_tr_id_value).val(rate);
                    $('#gst_'+new_tr_id_value).val(gst);
                    $('#main_gst').val(gst);
                    calculateSum();
                },
            });
            //addAnotherRow();
        }
        function addAnotherRow()
        {
            product_id = 1;
            var $_token = jQuery('#token').val();
            var siteUrl = $('#siteUrl').val();
            var tr_id = $('#tr_id').val();
            var  new_tr_id_value = parseInt(tr_id)+1;
             $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/addProductDropdown/" + product_id+'/'+tr_id,
                async: true,
                success: function (msg) {
                    $('#table_id').append(msg);
                    $('#tr_id').val(new_tr_id_value);
                },
            });
           // return returndata;
        }
        
        function getquantitybyrate(tr_no)
        {
            var quantity = $('#quantity_'+tr_no).val();
            var rate = $('#rate_'+tr_no).val();
            ratebyquantity = parseInt(quantity)*parseInt(rate);
            $('#ratebyquantity_'+tr_no).val(ratebyquantity);
            addAnotherRow();
            calculateSum();
        }
        
        /* Calculating the sum Start */
        function calculateSum()
        {
            var sum = 0;
            $(".qty1").each(function(){
            sum += +$(this).val();
            });
            $("#totalAmount").val(sum);
            $("#amountAfterDiscount").val(sum);
            var main_gst = $("#main_gst").val();
            
            netPayableAmount = parseInt(sum) + parseFloat(parseInt(sum)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
        
        /* Calculating the sum End */
        
        
        $(".discount").on("blur", function(){
        var sum=0;
        var totalAmount = $("#totalAmount").val();
        var discountAmount = $("#discountAmount").val();
        var amountAfterDiscount = parseInt(totalAmount) - parseInt(discountAmount);  
        var main_gst = $("#main_gst").val();
            
        if(amountAfterDiscount<0){
           $("#amountAfterDiscount").val(totalAmount); 
            netPayableAmount = parseInt(totalAmount) + parseFloat(parseInt(totalAmount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
        else{
            $("#amountAfterDiscount").val(amountAfterDiscount);
            netPayableAmount = parseInt(amountAfterDiscount) + parseFloat(parseInt(amountAfterDiscount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
            
            
            
            
        });
        
        $(".confirmDeleteThiTrg").on("blur", function(){
        var sum=0;
        var totalAmount = $("#totalAmount").val();
        var discountAmount = $("#discountAmount").val();
        var amountAfterDiscount = parseInt(totalAmount) - parseInt(discountAmount);  
        var main_gst = $("#main_gst").val();
            
        if(amountAfterDiscount<0){
           $("#amountAfterDiscount").val(totalAmount); 
            netPayableAmount = parseInt(totalAmount) + parseFloat(parseInt(totalAmount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
        }
        else{
            $("#amountAfterDiscount").val(amountAfterDiscount);
            netPayableAmount = parseInt(amountAfterDiscount) + parseFloat(parseInt(amountAfterDiscount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
        }
            
            
            
            
        });
        
        
        $(document).on('click', '.confirmDeleteThiTr', function () { 
            $(this).closest('tr').remove();
            calculateSum();
            return false;
        });
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>