@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Pincode State City Mapping</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'addpinstatecitymaps','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Pin code<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('pincode', '', array('class' => 'form-control','placeholder'=>"Pincode")) }}
										  <span class="text-danger">{{ $errors->first('pincode') }}</span>
									  </div>
								   </div>
								</div>
								 <div class="form-group {{ $errors->has('area_location') ? 'has-error' : '' }}">
								   <label for="area_location" class="col-md-3 control-label">Location (Area Name) <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									   {{ Form::textarea('area_location', '', array('row'=>1,'col'=>2,'class' => 'form-control','placeholder'=>"Location (Area Name)")) }}
										  <span class="text-danger">{{ $errors->first('area_location') }}</span>
									  </div>
								   </div>
								</div>
								 <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
								   <label for="area_location" class="col-md-3 control-label">State <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									   {{ Form::select('state_id', $state,'', array('id'=>'state_id','class' => 'form-control-select','placeholder'=>"Select State")) }}
										  <span class="text-danger">{{ $errors->first('state_id') }}</span>
									  </div>
								   </div>
								</div>
								 <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
								   <label for="area_location" class="col-md-3 control-label">City <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									   {{ Form::select('city_id', $cities,'', array('id'=>'city_id','class' => 'form-control-select','placeholder'=>"Select City")) }}
										  <span class="text-danger">{{ $errors->first('city_id') }}</span>
									  </div>
								   </div>
								</div>

								 <div class="form-group {{ $errors->has('geographical_location') ? 'has-error' : '' }}">
								   <label for="area_location" class="col-md-3 control-label">Geographical Location of country <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									   {{ Form::select('geographical_location', $geographical_location,'', array('id'=>'geographical_location','class' => 'form-control-select','placeholder'=>"Geographical Location of country")) }}
										  <span class="text-danger">{{ $errors->first('geographical_location') }}</span>
									  </div>
								   </div>
								</div>
							 </div>							 
							</div>
							<div class="form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>&nbsp;
									<button type="reset" class="btn btn-green">{{ trans('message.reset') }}</button>
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
	$.noConflict();
	<script src="{!! asset('public/js/select2.min.js') !!}"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#geographical_location").select2({closeOnSelect:false});
            $("#city_id").select2({closeOnSelect:false});
            $("#state_id").select2({closeOnSelect:false});
        });//]]>

	</script>
@endpush

