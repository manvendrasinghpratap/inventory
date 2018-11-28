<?php $__env->startSection('content'); ?>
<style>
    .form-horizontal .control-label{
        padding-bottom:10px !important;
        text-align:left !important;
    }
    .col-md-4{
        padding-bottom: 20px!important;
    }
    .heading_middle{
        font-size: larger;
        background-color: #6D7CA4;
        color: white;
        height: 27px;
        width: 96%;
        padding: 2px 20px;
    }
    .rightside{
        margin-left: 640px !important;
        padding-bottom: 35px;
    }
</style>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
                <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<div class="panel panel-blue">
					   <div class="panel-heading">Generate Invoice</div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['name'=>'generateForm','method'=>'post','url'=>'generateInvoice','files'=>'true','class'=>'form-horizontal','role'=>'form','onsubmit'=>"return validateForm()"])); ?>

							 <div class="form-body pal">
                               
                                 <div class="col-md-4">
                                     <div class=" <?php echo e($errors->has('invoice') ? 'has-error' : ''); ?>">
                                       <label for="name" class="col-md-12 control-label">Invoice No.<span class='require'>*</span><span class="text-green" id="alert_msg_invoice" style="margin-left:20px !important;"></span></label>
                                          <?php echo e(Form::text('invoice', $invoice, array('readonly'=>false,'id'=>'invoice','name'=>'invoice','class' => 'form-control','placeholder'=>"Invoice Number",'onblur'=>'checkInvoiceExistOrNot(this.value)'))); ?>

                                              
                                       </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class=" <?php echo e($errors->has('invoice_date') ? 'has-error' : ''); ?>">
                                        <label for="invoice_date" class="col-md-6 control-label">Invoice Date.<span class='require'>*</span></label>								  
                                        <?php echo e(Form::text('invoice_date',date('d-m-Y'), array('id'=>'datetimepicker1','class' => 'form-control date','placeholder'=>"Invoice Date"))); ?>

                                          <span class="text-danger"><?php echo e($errors->first('invoice_date')); ?></span>
                                    </div>
                                </div>
                                
                               <div class="col-md-4">
                                 <div class=" <?php echo e($errors->has('gst_no') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-6 control-label">GST No.</label>
									  <?php echo e(Form::text('gst_no', '', array('class' => 'form-control alphanumeric','placeholder'=>"GST Number"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('gst_no')); ?></span>									  
								   </div>
								</div>
                                <div class="col-md-4">
                                    <div class="<?php echo e($errors->has('bank_id') ? 'has-error' : ''); ?>">
                                     <label for="name" class="col-md-6 control-label">Select State <span class='require'>*</span></label>
                                         <?php echo e(Form::select('state_id', $states,'', array('tabindex'=>'1','id'=>'state_id','name'=>'state_id','class' => 'form-control-select alphanumeric'))); ?>

                                             <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                     <div class=" <?php echo e($errors->has('bank_id') ? 'has-error' : ''); ?>">
                                     <label for="name" class="col-md-6 control-label">Select Bank <span class='require'>*</span></label>
                                     <?php echo e(Form::select('bank_id', $bankDetail,'', array('tabindex'=>'2','id'=>'bank_id','class' => 'form-control-select alphanumeric'))); ?>

                                         <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                                     </div>
                                </div>
							 
							 
								<div class="col-md-4">
								 <div class=" <?php echo e($errors->has('branch_name') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-6 control-label">Branch Name <span class='require'>*</span></label>
									  <?php echo e(Form::text('branch_name', '', array('id'=>'branch_name','tabindex'=>'3','class' => 'form-control alphanumeric','placeholder'=>"Branch Name"))); ?>

										  <span class="text-danger"><?php echo e($errors->first('branch_name')); ?></span>									  
								   </div>
								</div>
								<div class="clear"></div>
								<hr>
								<div>
                                   <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                      <thead>                                          
                                       <tr>
                                           <th width="25%" >Product Name</th>
                                           <th width="15%">Size</th>
                                           <th width="10%">Rate</th>
                                           <th width="10%">GST</th>
                                           <th width="15%" >Quantity</th>
                                           <th width="15%" >Price</th>
                                           <th></th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                           
                                            <td>
                                                <select tabindex="7" id="product_id" tr_no="1" name="product_id[]" class="form-control-select alphanumeric" onchange="setProductDetails(this.value,1)" >
                                                  <option value="0">--Select Product Name--</option>
                                                   <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option otherdetail= "<?php echo e(count($pro['categoryDetails'])); ?>" value = "<?php echo e($pro['id']); ?>"><?php echo e($pro['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                            <td><span id="span_sub_category_1">
                                            <?php echo e(Form::select('sub_category[]',['--Select Size--'],'', array('tabindex'=>'8','id'=>'sub_category_1','name'=>'sub_category[]','class' => 'form-control-select alphanumeric','onChange'=>'getRateAndGst(this.value,1)'))); ?>

                                            </span>
                                            </td>
                                            <td><?php echo e(Form::text('rate[]', '', array('tabindex'=>"-1" ,'class' => 'form-control','name'=>'rate[]','readonly'=> true,'placeholder'=>" Rate",'id'=>'rate_1'))); ?> </td>
                                            <td><?php echo e(Form::text('gst[]', '', array('tabindex'=>"-1" ,'tabindex'=>"-1" ,'class' => 'form-control','name'=>'gst[]','readonly'=> true,'placeholder'=>" GST",'id'=>'gst_1'))); ?> </td>
                                            <td><?php echo e(Form::number('quantity[]', 0, array('tabindex'=>9,'min'=>'0','class' => 'form-control alphanumeric myclass','name'=>'quantity[]','id'=>'quantity_1','placeholder'=>"Enter Quantity",'onblur'=>'getquantitybyrate(1),calculateSum(),setFocusToTextBox(1),addNewRowWithCondition(1)'))); ?> </td>
                                            <td><?php echo e(Form::text('ratebyquantity[]', '', array('tabindex'=>"-1" ,'class' => 'form-control qty1','name'=>'ratebyquantity[]','readonly'=> true,'placeholder'=>" Price",'id'=>'ratebyquantity_1'))); ?> </td>
                                            <td><a href="javascript:void(0);" id="addCF" onclick= "addAnotherRow()"><i class="glyphicon glyphicon-plus"></i></a></td>
                                      </tbody>                                       
                                   </table>                                    
								</div>
                                 <div class="clear"></div>
                                 <br>
                                 <div  style="margin-left:640px !important; padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">Total Amount</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('totalAmount', 0, array('tabindex'=>"-1" ,'min'=>'0','class' => 'form-control','name'=>'totalAmount','readonly'=> true,'id'=>'totalAmount','placeholder'=>"Total Amount"))); ?>

										 </div>
									 </div>
								 </div>
								  <div class="clear"></div>
                                 <br>
								 <div  style="margin-left:639px !important; padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">Discount (In Rs)</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('discountAmount', 0, array('min'=>'0','class' => 'form-control discount','name'=>'discountAmount','id'=>'discountAmount','placeholder'=>"Discount Amount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="clear"></div>
                                 <br>
								 <div  style="margin-left:638px !important;  padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">Amount After Discount</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('amountAfterDiscount', 0, array('tabindex'=>"-1" ,'tabindex'=>"-1" ,'min'=>'0','class' => 'form-control','name'=>'amountAfterDiscount','readonly'=> true,'id'=>'amountAfterDiscount','placeholder'=>"Amount After Discount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="clear"></div>
                                 <br>
								 <div  style="margin-left:637px !important;  padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">GST(%)</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('main_gst', 0, array('tabindex'=>"-1" ,'min'=>'0','class' => 'form-control','readonly'=> true,'name'=>'main_gst','id'=>'main_gst','placeholder'=>"GST"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="clear"></div>
                                 <br>
                                 <div  style="margin-left:639px !important; padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">Shipping Chargs (In Rs)</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('shippingcharges', 0, array('min'=>'0','class' => 'form-control discount','name'=>'shippingcharges','id'=>'shippingcharges','placeholder'=>"Shipping Amount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="clear"></div>
                                 <br>
								 <div style="margin-left:636px !important; padding-bottom: 35px;">
									 <label for="name" class="col-md-6 control-label">Net Payable Amount</label>
									 <div class="col-md-6">
										 <div class="input-icon">
										 <?php echo e(Form::number('netPayableAmount', 0, array('tabindex'=>"-1" ,'min'=>'0','class' => 'form-control','readonly'=> true,'name'=>'netPayableAmount','id'=>'netPayableAmount','placeholder'=>"Net Payable Amount"))); ?>

										 </div>
									 </div>
								 </div>
								 <div class="clear"></div>
                                 <br>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
								     <?php echo e(Form::hidden('siteUrl', url('/'), array('class' => 'form-control','placeholder'=>"Branch Name",'id'=>'siteUrl'))); ?>

								     <?php echo e(Form::hidden('tr_id',2, array('class' => 'form-control', 'id'=>'tr_id'))); ?>

								     
								     <?php echo Form::submit( trans('message.submitandprint'), ['class' => 'btn btn-blue', 'name' => 'submitbutton', 'value' => 'save']); ?>


                                    <?php echo Form::submit( trans('message.submitonly'), ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'save-draft']); ?>

								     
								     
								     
								     
								     <!--<button type="submit" name = 'submitbutton' class="btn btn-primary"><?php echo e(trans('message.submitonly')); ?></button>
									 <button type="submit" name = 'submitbutton' class="btn btn-primary"><?php echo e(trans('message.submitandprint')); ?></button>&nbsp;-->
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
            $('select').select2(             
                                {closeOnSelect:false,
                                });
            /*$("#bank_id").select2({closeOnSelect:false});*/
        });//]]>
        
        function select2Focus() {
            alert(12)
        }
        
        
        function setFocusToTextBox(tr_no)
        {
             document.getElementById("shippingcharges").focus();
                return false;
            var a = $(".myclass").filter(function () {
            return +this.value == 0;
            }).length;
            if(a==1){
                document.getElementById("discountAmount").focus();
                return false;
            }
        /*v = $('#sub_category_'+tr_no).val(); 
            if(v==0){
                 document.getElementById("discountAmount").focus();
            }*/
        
        }
       
        function checkExists(sel) {
            var status = false;
            if ($(sel).length) status = true;
            return status;
        }
        function addNewRowWithCondition(tr_no){
            var a = $(".myclass").filter(function () {
            return +this.value == 0;
            }).length;
            if(a==1)
            {
                document.getElementById("discountAmount").focus();
                return false;
            }
            else
            {
                df = parseInt(tr_no)+1;
                if(checkExists('#product_id_'+df)){
                    v = $('#product_id_'+df).val(); 
                    if(v>0){
                        // addAnotherRow();
                        $("#s2id_product_id_"+df).select2("open");
                    }
                }
                else{                
                    //addAnotherRow();
                    $("#s2id_product_id_"+df).select2("open");
                }
            }
        }
        
        function getRateAndGst(category_id,tr_no){
            /*df = parseInt(tr_no)+1;
            if(checkExists('#product_id_'+df)){
                v = $('#product_id_'+df).val(); 
                if(v>0){
                     addAnotherRow();
                    $("#s2id_product_id_"+df).select2("open");
                }
            }
            else{                
                addAnotherRow();
                $("#s2id_product_id_"+df).select2("open");
            }*/
            calculateSum();
            var $_token = jQuery('#token').val();
            siteUrl = $('#siteUrl').val();
            var  new_tr_id_value = tr_no;
            $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/getRateAndGst/" + category_id,
                async: true,
                success: function (data) {                 
                    var obj             = $.parseJSON(data);
                    var rate            = obj.rate; 
                    var gst             = obj.gst; 
                    $('#rate_'+new_tr_id_value).val(rate);
                    $('#gst_'+new_tr_id_value).val(gst);
                    $('#main_gst').val(gst);
                    getquantitybyrate(new_tr_id_value);
                    calculateSum();
                    //addAnotherRow();
                },
            });
        }
        function setProductDetails(product_id,tr_no){
            
            
            var otherdetail = $('#product_id option:selected').attr('otherdetail');
            alert(otherdetail); 
            var $_token = jQuery('#token').val();
            siteUrl = $('#siteUrl').val();
            var tr_id = $('#tr_id').val();
            var tr_id = tr_no;
            //var  new_tr_id_value = parseInt(tr_id)-1;
            var  new_tr_id_value = tr_no;
            $('#s2id_sub_category_'+new_tr_id_value).addClass('fa fa-spinner');
            $('#sub_category_'+tr_no).html('');
           if(otherdetail>1){
            $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/getproductDetails/" + product_id,
                async: true,
                success: function (data) {
                    /*var obj             = $.parseJSON(data);
                    var id            = obj.id; 
                    var value             = obj.value; 
                    alert(id);
                    $('#sub_category_'+tr_no).html('<option selected value="'+ id +'">'+value+'</option>');
                    $('#s2id_sub_category_'+new_tr_id_value).removeClass('fa fa-spinner');
                    alert(data); return false;*/
                    $('#sub_category_'+tr_no).html(data).trigger('chosen:open');
                    $('#s2id_sub_category_'+new_tr_id_value).removeClass('fa fa-spinner');
                    //dd = $("#s2id_sub_category_"+new_tr_id_value).val($("#s2id_sub_category_"+new_tr_id_value+" option:first").val());
                    //alert(dd.val());
                    //alert($( "#s2id_sub_category_"+new_tr_id_value+" option:selected" ).text());
                    calculateSum();
                },
                complete: function() {
                   $(this).data('requestRunning', false);
                    $("#s2id_sub_category_"+new_tr_id_value).select2("open");
                    $("#s2id_sub_category_"+new_tr_id_value+" option:first").attr('selected','selected');
                    //dd = $("#s2id_sub_category_"+new_tr_id_value).val($("#s2id_sub_category_"+new_tr_id_value+" option:first").val());
                    //alert(dd.val());
                     //alert($( "#s2id_sub_category_"+new_tr_id_value+" option:selected" ).text());
                },
            });
        }
            else{
                $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/getproductDetails/" + product_id,
                async: true,
                success: function (data) {
                    var obj             = $.parseJSON(data);
                    var id            = obj.id; 
                    var value             = obj.value; 
                    alert(id);
                    alert(data);
                    $('#sub_category_'+tr_no).html('<option selected value="'+ id +'">'+value+'</option>');
                    $('#s2id_sub_category_'+new_tr_id_value).removeClass('fa fa-spinner');
                    alert(data); return false;
                    $('#sub_category_'+tr_no).html(data).trigger('chosen:open');
                    $('#s2id_sub_category_'+new_tr_id_value).removeClass('fa fa-spinner');
                    //dd = $("#s2id_sub_category_"+new_tr_id_value).val($("#s2id_sub_category_"+new_tr_id_value+" option:first").val());
                    //alert(dd.val());
                    //alert($( "#s2id_sub_category_"+new_tr_id_value+" option:selected" ).text());
                    calculateSum();
                },
                complete: function() {
                   $(this).data('requestRunning', false);
                    $("#s2id_sub_category_"+new_tr_id_value).select2("open");
                    $("#s2id_sub_category_"+new_tr_id_value+" option:first").attr('selected','selected');
                    //dd = $("#s2id_sub_category_"+new_tr_id_value).val($("#s2id_sub_category_"+new_tr_id_value+" option:first").val());
                    //alert(dd.val());
                     //alert($( "#s2id_sub_category_"+new_tr_id_value+" option:selected" ).text());
                },
            });
            }
            
            
            //addAnotherRow();
        }
        function addAnotherRow()
        {
            product_id = 1;
            var $_token = jQuery('#token').val();
            var siteUrl = $('#siteUrl').val();
            var tr_id = $('#tr_id').val();
            var  new_tr_id_value = parseInt(tr_id)+1;
            //return false;
             $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/addProductDropdown/" + product_id+'/'+tr_id,
                async: true,
                success: function (msg) {
                    $('#table_id').append(msg);
                    $('#tr_id').val(new_tr_id_value);
                    $(function(){
                        $('select').select2({closeOnSelect:false});
                    });
                },
                 complete: function() {
                     //alert(tr_id);
                   $(this).data('requestRunning', false);
                     $("#s2id_product_id_"+tr_id).select2("open");
                    
                },
            });
           // return returndata;
        }
        
        function getquantitybyrate(tr_no)
        {
            var quantity = $('#quantity_'+tr_no).val();
            var rate = $('#rate_'+tr_no).val();
            ratebyquantity = parseInt(quantity)*parseInt(rate);
            if(isNaN(ratebyquantity))
                ratebyquantity=0;
            $('#ratebyquantity_'+tr_no).val(ratebyquantity);
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
            var shippingcharges = $("#shippingcharges").val();
            netPayableAmount = parseInt(shippingcharges) + parseInt(sum) + parseFloat(parseInt(sum)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
        
        /* Calculating the sum End */
        
        
        $(".discount").on("blur", function(){
        var sum=0;
        var totalAmount = $("#totalAmount").val();
        var discountAmount = $("#discountAmount").val();
        //var shippingcharges = $("#shippingcharges").val();
        var amountAfterDiscount = parseInt(totalAmount) - parseInt(discountAmount);  
        var main_gst = $("#main_gst").val();
            
        if(amountAfterDiscount<0){
           $("#amountAfterDiscount").val(totalAmount); 
            var shippingcharges = $("#shippingcharges").val();
            netPayableAmount = parseInt(shippingcharges) + parseInt(totalAmount) + parseFloat(parseInt(totalAmount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
        else{
            $("#amountAfterDiscount").val(amountAfterDiscount);
            var shippingcharges = $("#shippingcharges").val();
            netPayableAmount = parseInt(shippingcharges) + parseInt(amountAfterDiscount) + parseFloat(parseInt(amountAfterDiscount)*parseFloat(main_gst)/100);
            $("#netPayableAmount").val(netPayableAmount);
            //alert(netPayableAmount)
        }
            
            
          $('.alphanumeric').autotab('filter', { format: 'alphanumeric', uppercase: true });
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
        
        
    $(document).ready(function(){
      var date_input=$('input[name="invoice_date"]'); //our date input has the name "date"
      var options={
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
        
        
        
        $.fn.focusNextInputField = function() {
    return this.each(function() {
        var fields = $(this).parents('form:eq(0),body').find('button,input,textarea,select');
        var index = fields.index( this );
        if ( index > -1 && ( index + 1 ) < fields.length ) {
            fields.eq( index + 1 ).focus();
        }
        return false;
    });
};
      
    $(".alphanumeric").keyup(function () 
        {
            if (this.value.length == this.maxLength) 
            {
                $(this).next('.inputs').focus();
            }
        });
        
    function validateForm() 
        {
        var x = document.forms["generateForm"]["branch_name"].value;
        var y = document.forms["generateForm"]["invoice"].value;
        if (x == "") {
            alert("Branch Name is Empty");
            return false;
        }
        if (y == "") {
            alert("Invoice is Empty");
            return false;
        }
    }
    function checkInvoiceExistOrNot(invoice){
       
        if(invoice!=''){
            $('.text-danger').html('');
            $('.text-green').html('');
            var $_token = jQuery('#token').val();
            var siteUrl = $('#siteUrl').val();
             $.ajax({
                type: "GET",
                cache: false,
                headers: {'X-XSRF-TOKEN': $_token},
                url: siteUrl + "/ajax/checkInvoice/" + invoice,
                async: true,
                success: function (data) {  
                    if(data==1){
                        $('#invoice').val('');
                        $('#alert_msg_invoice').removeClass('text-green');
                        $('#alert_msg_invoice').addClass('text-danger');
                        $('#alert_msg_invoice').html('Invoice No. Already Used');
                    }
                    else{
                        $('#alert_msg_invoice').removeClass('text-danger');
                        $('#alert_msg_invoice').addClass('text-green');
                        $('.text-green').html('Use this Invoice No.');
                    }
                    return false;
                },
            });
        }
        else{
          alert('Empty'); 
            return false;
        }
    }    
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>