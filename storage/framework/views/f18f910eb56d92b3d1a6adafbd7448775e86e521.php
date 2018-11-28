
   <tr>
    <td>
       <select tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>" tr_no="<?php echo e($tr_id); ?>" id="product_id_<?php echo e($tr_id); ?>" class="form-control-select" onchange="setProductDetails(this.value,<?php echo e($tr_id); ?>)" name="product_id[]"> 
       <option value="0">-- Select Product Name --</option>      
       <?php  
        foreach($products as $key=>$val){
            ?><option value="<?php echo $key; ?>"><?php echo $val; ?> </option>
        <?php 
        }
        ?>
       </select>
    </td>
    <td>
    <select tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>"  id="sub_category_<?php echo e($tr_id); ?>" class="form-control-select" name="sub_category[]" onchange="getRateAndGst(this.value,<?php echo e($tr_id); ?>)"><option value="0">--Select Sub Category--</option> </select></td>   
    <td><input tabindex ="-1" class="form-control" readonly=true type="text" value="" id="rate_<?php echo e($tr_id); ?>"></td>   
    <td><input tabindex ="-1" class="form-control" readonly=true type="text" value="" id="gst_<?php echo e($tr_id); ?>"></td>   
    <td><input tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>" class="form-control alphanumeric myclass" name="quantity[]" value="0" min="0" id= "quantity_<?php echo e($tr_id); ?>"  placeholder="Enter Quantity" type="number" onblur='getquantitybyrate(<?php echo e($tr_id); ?>),setFocusToTextBox(<?php echo e($tr_id); ?>,addNewRowWithCondition(<?php echo e($tr_id); ?>))'></td>
    <td><input tabindex ="-1" class="form-control qty1" name="ratebyquantity[]" readonly=true placeholder="Price" type="text" value="" id="ratebyquantity_<?php echo e($tr_id); ?>"></td>
    <td><a href="javascript:void(0);" id="addCF" onclick= "addAnotherRow()"><i class="glyphicon glyphicon-plus"></i></a><a class="btn btn-default btn-xs confirmDeleteThiTr" > <i class="fa fa-trash-o "></i></a>
        
    </td>
</tr>  