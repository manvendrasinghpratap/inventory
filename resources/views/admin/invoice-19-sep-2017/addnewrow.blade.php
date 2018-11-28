
   <tr>
    <td>
       <select tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>" tr_no="{{ $tr_id }}" id="product_id_{{ $tr_id }}" class="form-control-select" onchange="setProductDetails(this.value,{{ $tr_id }})" name="product_id[]"> 
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
    <select tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>"  id="sub_category_{{ $tr_id }}" class="form-control-select" name="sub_category[]" onchange="getRateAndGst(this.value,{{ $tr_id }})"><option value="0">--Select Sub Category--</option> </select></td>   
    <td><input tabindex ="-1" class="form-control" readonly=true type="text" value="" id="rate_{{ $tr_id }}"></td>   
    <td><input tabindex ="-1" class="form-control" readonly=true type="text" value="" id="gst_{{ $tr_id }}"></td>   
    <td><input tabindex="<?php echo strtotime(date('Y-m-d H:m:s')); ?>" class="form-control alphanumeric myclass" name="quantity[]" value="0" min="0" id= "quantity_{{ $tr_id }}"  placeholder="Enter Quantity" type="number" onblur='getquantitybyrate({{ $tr_id }}),setFocusToTextBox({{ $tr_id }},addNewRowWithCondition({{ $tr_id }}))'></td>
    <td><input tabindex ="-1" class="form-control qty1" name="ratebyquantity[]" readonly=true placeholder="Price" type="text" value="" id="ratebyquantity_{{ $tr_id }}"></td>
    <td><a class="btn btn-default btn-xs confirmDeleteThiTr" > <i class="fa fa-trash-o "></i></a>
        
    </td>
</tr>  