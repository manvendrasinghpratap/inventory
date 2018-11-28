@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add User Type Dashboard</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'adduserTypeAndDashboard','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('user_type_id') ? 'has-error' : '' }}">
								   <label for="user_type_id" class="col-md-3 control-label">User Type Name<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									  {{ Form::select('user_type_id', $usertypes,'', array('class' => 'form-control','placeholder'=>"User Type ")) }}
										  <span class="text-danger">{{ $errors->first('user_type_id') }}</span>
									  </div>
								   </div>
								</div>
								 <div class="form-group {{ $errors->has('dashboard_url') ? 'has-error' : '' }}">
								   <label for="dashboard_url" class="col-md-3 control-label">Dashboard URL <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('dashboard_url', '', array('class' => 'form-control','placeholder'=>"Dashboard URL")) }}
										  <span class="text-danger">{{ $errors->first('dashboard_url') }}</span>
									  </div>
								   </div>
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								<div class="col-md-offset-3 col-md-9"><button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>&nbsp;
								<button type="reset" class="btn btn-green">{{ trans('message.reset') }}</button></div>
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
