@extends('admin.layouts.index')
@section('content')
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
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Product And Size </div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'addProduct','files'=>'true','class'=>'form-horizontal','role'=>'form','id'=>'productForm'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Product Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', '', array('class' => 'form-control','placeholder'=>"Product Name")) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">GST <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('gst', '', array('class' => 'form-control','placeholder'=>"Enter GST")) }}
										  <span class="text-danger">{{ $errors->first('gst') }}</span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group {{ $errors->has('hsn') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">HSN </label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('hsn', '', array('class' => 'form-control','placeholder'=>"Enter HSN")) }}
										  <span class="text-danger">{{ $errors->first('hsn') }}</span>
									  </div>
								   </div>
								</div>
                                <hr/>
                                <div class="panel-sub-heading">Add Size </div>
                                <br>
                                 <div class="col-md-3"></div>
								<div class="col-md-9">
                                   <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                      <thead>                                          
                                       <tr>
                                           <th width="50%" >Size</th>
                                           <th width="40%" >Price</th>
                                           <th width="2%" ></th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                      <tr>
                                          <td>{{ Form::text('size', 'NA', array('class' => 'form-control','placeholder'=>"Enter Size",'name'=>'size[]','onblur'=>'checkNull(this.value)')) }}</td>
                                          <td>{{ Form::number('price', '', array('class' => 'form-control addNew ','placeholder'=>"Enter Price",'name'=>'price[]','min'=>0)) }}</td>
                                          <td><a href="javascript:void(0);" id="addCF"><i class="glyphicon glyphicon-plus"></i></a></td>
                                      </tr>
                                      </tbody>                                       
                                   </table>                                    
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>&nbsp;
									 <button type="reset" class="btn btn-green">{{ trans('message.reset') }}</button>
									 {!! link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']) !!}
								 </div>
							 </div>
							 
						  {{ Form::close() }}
					   </div>
					</div>
				 </div>
				 </div>
               <!--END CONTENT-->
  @endsection
@push('scripts')
	<script src="{!! asset('public/js/select2.min.js') !!}"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#category_id").select2({closeOnSelect:false});
        });//]]>
        
        
   $(document).ready(function(){
	$("#addCF").click(function(){
		$("#table_id").append('<tr><td><input class="form-control" placeholder="Enter Size" name="size[]" type="text" value="NA" ></td><td><input class="form-control addNew numeric" placeholder="Enter Price" name="price[]" type="number" value="" min="0"></td><td> <a href="javascript:void(0);" class="remCF"><i class ="glyphicon glyphicon-minus" ></i></a></td></tr>');
	});
    $("#table_id").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});

    $("#productForm input").on('blur',function(){
    if( !$(this).val() ) {
        $(this).val('NA');
    }
    });
	</script>
@endpush
