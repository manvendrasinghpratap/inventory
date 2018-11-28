@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Product</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'updateProduct','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						   {{ Form::hidden('id', $productdetails['id'], array('name'=>'id')) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Product Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', $productdetails['name'], array('class' => 'form-control','placeholder'=>"Product Name")) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
									 <label for="name" class="col-md-3 control-label">Select Category</label>
									 <div class="col-md-9">
										 <div class="input-icon"><i class="fa fa-user"></i>
											 {{ Form::select('category_id', ['--Select Category--']+$categories,$productdetails['category_id'], array('id'=>'category_id','class' => 'form-control-select')) }}
											 <span class="text-danger">{{ $errors->first('category_id') }}</span>
										 </div>
									 </div>
								 </div>
								 <div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Rate <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('rate', $productdetails['rate'], array('class' => 'form-control','placeholder'=>"Enter Rate")) }}
										  <span class="text-danger">{{ $errors->first('rate') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">GST <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('gst', $productdetails['gst'], array('class' => 'form-control','placeholder'=>"Enter GST")) }}
										  <span class="text-danger">{{ $errors->first('gst') }}</span>
									  </div>
								   </div>
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary">{{ trans('message.update') }}</button>&nbsp;
									 {!! link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']) !!}
								 </div>
							 </div>
						  {{ Form::close() }}
					   </div>
					</div>
				 </div>
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

	</script>
@endpush