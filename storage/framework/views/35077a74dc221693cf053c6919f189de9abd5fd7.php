<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title"><?php echo e(@$page_title); ?></div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <!-- <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Dashboard&nbsp;&nbsp;</li> -->
		<?php if(count($breadcrumb>0)): ?>
		<?php foreach($breadcrumb as $key=>$value):?>
			<li class="active"><i class="fa fa-angle-right"></i> &nbsp;&nbsp;<a href='<?php echo e(url($key)); ?>'> <?php echo e($value); ?> </a></li>
		<?php endforeach?>
			<?php endif; ?>
    </ol>
    <div class="btn btn-blue reportrange"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden" name="endstart"/></div>
    <div class="clearfix"></div>
</div>