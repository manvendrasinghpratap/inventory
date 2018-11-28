@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">	
					<div class="panel panel-blue">
					   <div class="panel-heading">Register User</div>
					   <div class="panel-body pan">
					   <div class="flash-message">
						  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
							@if(Session::has('alert-' . $msg))
							<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
							@endif
						  @endforeach
						</div>
						  {{ Form::open(['method'=>'post','url'=>'updateUser','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">							
							 <!---First Form culomn--->
							  <div class="col-lg-6">								
								<div class="form-group">
								   <label for="name" class="col-md-3 control-label">Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name',$userData->name,['class' => 'form-control','placeholder' => 'Enter your Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								 <div class="form-group">
								   <label for="dob" class="col-md-3 control-label">Date Of Birth<span class='require'>*</span></label>
								   <div class="col-md-9">
								   @php
									
									$originalDate =$userData->userDetails->date;
                                    $newDate = date("d-m-Y", strtotime($originalDate));
									@endphp
									  <div class="input-icon"><i class="fa fa-calendar"></i>
									  {{ Form::text('dob',$newDate,['class' => 'form-control datepicker','placeholder' => 'Enter your DOB','required' => 'required'])}}
									  </div>
								   </div>
								</div>	
								<div class="form-group">
								   <label for="status" class="col-md-3 control-label">Status<span class='require'>*</span></label>
								   <div class="col-md-9">
								    <div class="input-icon">
									  <select name="status" class="form-control">
									  <option>Please select</option>
									  <option value="1" @if($userData->status ==1) selected="selected" @endif>Enable</option>
									  <option value="2" @if($userData->status ==2 ) selected="selected" @endif>Disable</option>									  										  
									  </select>
									</div>
								   </div>
								</div>
							</div>								
					           <!---Second Form culomn--->		
                               <div class="col-lg-6">
							   <div class="form-group">
								   <label for="email" class="col-md-3 control-label">Email<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-envelope"></i>
									  {{ Form::email('email',$userData->userDetails->user_official_email,['class' => 'form-control','placeholder' => 'Enter your Email', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                 <div class="form-group">
								   <label for="std" class="col-md-3 control-label">Phone ( With STD)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-phone" aria-hidden="true"></i>
									  {{ Form::text('std',$userData->userDetails->phone,['class' => 'form-control','placeholder' => 'Enter your Phone number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
                                <div class="form-group">
								   <label for="name" class="col-md-3 control-label">User Type:<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_type',$userType,$userData->user_type_id,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>								
					   </div>
					</div>
					</div>
					 <div class="form-actions">
						<div class="col-md-offset-3 col-md-9" style="margin-left: 3%;"><button type="submit" class="btn btn-primary">Update</button>&nbsp;<button type="button" onclick="goBack()" class="btn btn-green">Cancel</button></div>
						</div>
						{{ Form::hidden('userId', $userData->id, array('id' => 'userId')) }}
						{{ Form::close() }}
					  </div>
				 </div>
				 </div>
	 </div>
  </div>
</div>
<!--END CONTENT-->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
 <script type="text/javascript">
            $(function () {
               $('.datepicker').datepicker({
				    format: 'dd-mm-yyyy',
					todayHighlight:'TRUE',
					autoclose: true,
					//startDate: new Date(),
				   });
            });
			function goBack() {
    window.history.back();
}
        </script>
  @endsection
