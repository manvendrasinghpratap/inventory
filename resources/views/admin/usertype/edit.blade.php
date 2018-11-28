@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add User Type</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'updateusertype','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						   {{ Form::hidden('id', $usertypedetails['id'], array('name'=>'id','class' => 'form-control','placeholder'=>"User Type")) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">User Type Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', $usertypedetails['name'], array('class' => 'form-control','placeholder'=>"User Type Name")) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
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
