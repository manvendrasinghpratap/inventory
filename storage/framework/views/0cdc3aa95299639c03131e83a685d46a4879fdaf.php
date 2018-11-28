<tr>
    <td>
       <select tr_no="<?php echo e($tr_id); ?>" id="product_id" class="form-control-select" onchange="setProductDetails(this.value,<?php echo e($tr_id); ?>)" name="product_id[]"> 
       <option value="">-- Select Product Name --</option>      
       <?php  
        foreach($products as $key=>$val){
            ?><option value="<?php echo $key; ?>"><?php echo $val; ?> </option>
        <?php 
        }
        ?>
       </select>
    </td>
    <td><input class="form-control" readonly=true type="text" value="" id="sub_category_<?php echo e($tr_id); ?>"></td>   
    <td><input class="form-control" readonly=true type="text" value="" id="rate_<?php echo e($tr_id); ?>"></td>   
    <td><input class="form-control" readonly=true type="text" value="" id="gst_<?php echo e($tr_id); ?>"></td>   
    <td><input class="form-control" name="quantity[]" value="0" min="0" id= "quantity_<?php echo e($tr_id); ?>"  placeholder="Enter Quantity" type="number" onblur='getquantitybyrate(<?php echo e($tr_id); ?>)'></td>
    <td><input class="form-control qty1" name="ratebyquantity[]" readonly=true placeholder="Price" type="text" value="" id="ratebyquantity_<?php echo e($tr_id); ?>"></td>
    <td><a class="btn btn-default btn-xs confirmDeleteThiTr" > <i class="fa fa-trash-o "></i></a>
        
    </td>
</tr>  