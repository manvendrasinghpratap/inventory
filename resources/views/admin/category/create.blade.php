@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Category</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'addCategory','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Category Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', '', array('class' => 'form-control','placeholder'=>"Category Name")) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
									 <label for="name" class="col-md-3 control-label">Select Product</label>
									 <div class="col-md-9">
										 <div class="input-icon"><i class="fa fa-user"></i>
											 {{ Form::select('product_id',$products,'', array('id'=>'product_id','class' => 'form-control-select')) }}
											 <span class="text-danger">{{ $errors->first('product_id') }}</span>
										 </div>
									 </div>
								 </div>
                                 <div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Rate <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('rate', '', array('class' => 'form-control','placeholder'=>"Enter Rate")) }}
										  <span class="text-danger">{{ $errors->first('rate') }}</span>
									  </div>
								   </div>
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
	 </div>
  </div>
</div>
               <!--END CONTENT-->
  @endsection
@push('scripts')
	<script src="{!! asset('public/js/select2.min.js') !!}"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#product_id").select2({closeOnSelect:false});
        });//]]>

	</script>
@endpush
