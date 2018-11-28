@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Zone</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'admin/addzone','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								<div class="form-group">
								   <label for="name" class="col-md-3 control-label">Zone Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', '', array('class' => 'form-control','placeholder'=>"Zone Name")) }}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="pincode" class="col-md-3 control-label">Pin code<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-pincode"></i>
									  {{ Form::select('pincode_state_city_mapping_id', $pincode,'', array('class' => 'form-control','placeholder'=>"Pincode")) }}
									  </div>
								   </div>
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								<div class="col-md-offset-3 col-md-9"><button type="submit" class="btn btn-primary">Save</button>&nbsp;
								<button type="reset" class="btn btn-green">Reset</button></div>
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
