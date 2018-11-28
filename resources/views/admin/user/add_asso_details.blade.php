@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">  
	
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Associate User Details</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'saveAssdetails','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
							<div class="row">
							<div class="col-lg-6">
							<div class="form-group">
								   <label for="name" class="col-md-3 control-label">USER TYPE:</label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_type',$userType,$userData->user_type_id,array('class' => 'form-control','placeholder' => 'Please select','disabled'))}}
									  </div>
								   </div>
								</div>
								</div>
							</div>
							 <!---First Form culomn--->
							  <div class="col-lg-6">
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Personal Details:</h4>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="name" class="col-md-3 control-label">Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name',$userData->name,['class' => 'form-control','placeholder' => 'Enter your Name', 'required' => 'required','disabled'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for=profile_pic" class="col-md-3 control-label">Photo<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('profile_pic', array('class' => '')) }}								 
								   </div>
								 </div>
								<div class="form-group">
								   <label for="fathername" class="col-md-3 control-label">Father Name<span class='require'>*</span></label>
								   <div class="col-md-9">
								   <div class="input-icon"><i class="fa fa-user"></i>
								   {{ Form::text('fathername',null,['class' => 'form-control','placeholder' => 'Enter your Father Name', 'required' => 'required'])}}
									</div>
									</div>
								   </div>
								   <div class="form-group">
								   <label for="mothername" class="col-md-3 control-label">Mother Name<span class='require'>*</span></label>
								   <div class="col-md-9">
								   <div class="input-icon"><i class="fa fa-user"></i>
								   {{ Form::text('mothername',null,['class' => 'form-control','placeholder' => 'Enter your Mother Name', 'required' => 'required'])}}
									</div>
									</div>
								   </div>
								 
								<div class="form-group">
								   <label for="dob" class="col-md-3 control-label">Date Of Birth <span class='require'>*</span></label>
								    <div class="col-md-9">
									@php
									
									$originalDate =$userData->userDetails->date;
                                    $newDate = date("d-m-Y", strtotime($originalDate));
									@endphp
									  <div class="input-icon"><i class="fa fa-calendar"></i>									  
									  {{ Form::text('dob',$newDate,['class' => 'form-control datepicker','placeholder' => 'Enter your DOB', 'required' => 'required','disabled'])}}
									</div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="gender" class="col-md-3 control-label">Gender<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="Male" class="col-md-3 control-label">{{Form::radio('gender', '1', true)}} Male</label>									 
									  <label for="Female" class="col-md-6 control-label"> {{Form::radio('gender', '2', false)}} Female</label>									 
								   </div>
								</div>
								<div class="form-group">
								   <label for="marital" class="col-md-3 control-label">Marital Status<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="Single" class="col-md-3 control-label">{{Form::radio('marital', '1', true)}} Single</label>									 
									  <label for="Married" class="col-md-6 control-label"> {{Form::radio('marital', '2', false)}} Married</label>									 
								   </div>
								</div>
                             
								<div class="form-group">
								   <label for="doa" class="col-md-3 control-label">Date Of Association <span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-calendar"></i>									  
									  {{ Form::text('doa',null,['class' => 'form-control datepicker','placeholder' => 'Enter your Date Of Association', 'required' => 'required'])}}
									</div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="doj" class="col-md-3 control-label">Date Of Joining <span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-calendar"></i>									  
									  {{ Form::text('doj',null,['class' => 'form-control datepicker','placeholder' => 'Enter your DOJ', 'required' => 'required'])}}
									</div>
								   </div>
								</div>
                             							
								<div class="form-group">
								   <label for="expreince" class="col-md-3 control-label">Total Exprience<span class='require'>*</span></label>
								   <div class="col-md-9">
								    <div class="input-icon">
									  <select name="expreince" class="form-control">
									  <option>Please select</option>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>	
									  <option value="4">4</option>	
									  <option value="5">5</option>	
									  <option value="6">6</option>	
									  <option value="7">7</option>	
									  <option value="8">8</option>	
									  <option value="9">9</option>	
									  <option value="10">10</option>										  
									  </select>
									</div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="paddress" class="col-md-3 control-label">Permanent Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
									  {{ Form::textarea('paddress' , null , ['class' => 'form-control','size' => '2x5']) }}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="currentaddress" class="col-md-3 control-label">Current Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
									  {{ Form::textarea('currentaddress' , null , ['class' => 'form-control','size' => '2x5']) }}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="currentpin" class="col-md-3 control-label">Current Pin<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									  {{ Form::text('currentpin',null,['class' => 'form-control','placeholder' => 'Enter your Current Area Pin', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="mobile" class="col-md-3 control-label">Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('mobile',null,['class' => 'form-control','placeholder' => 'Enter your Mobile number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="altmobile" class="col-md-3 control-label">Alternate Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('altmobile',null,['class' => 'form-control','placeholder' => 'Enter your Alternate Mobile number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Education Details:</h4>
							         </div>
							    </div>
								<div class="row">
							         <div class="col-lg-12">
									 <h5 style="font-weight: bold;">Graduate :</h5>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="graduatecourse" class="col-md-3 control-label">Course<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-building" aria-hidden="true"></i>
									  {{ Form::text('graduatecourse',null,['class' => 'form-control','placeholder' => 'Enter your Graduate Course', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="graduatecollagename" class="col-md-3 control-label">Collage Name<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-building" aria-hidden="true"></i>
									  {{ Form::text('graduatecollagename',null,['class' => 'form-control','placeholder' => 'Enter your Collage Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="graduateyop" class="col-md-3 control-label">Year of passing<span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-calendar"></i>									  
									  {{ Form::text('graduateyop',null,['class' => 'form-control datepickeryop','placeholder' => 'Enter your DOJ', 'required' => 'required'])}}
									</div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="graduatemarks" class="col-md-3 control-label">Marks (%).<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{ Form::text('graduatemarks',null,['class' => 'form-control','placeholder' => 'Enter your Marks (%)', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="row">
							         <div class="col-lg-12">
									 <h5 style="font-weight: bold;">Post Graduate :</h5>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="postcourse" class="col-md-3 control-label">Course<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-building" aria-hidden="true"></i>
									  {{ Form::text('postcourse',null,['class' => 'form-control','placeholder' => 'Enter your Graduate Course', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="postcollagename" class="col-md-3 control-label">Collage Name<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-building" aria-hidden="true"></i>
									  {{ Form::text('postcollagename',null,['class' => 'form-control','placeholder' => 'Enter your Collage Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="postyop" class="col-md-3 control-label">Year of passing<span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-calendar"></i>									  
									  {{ Form::text('postyop',null,['class' => 'form-control datepickeryop','placeholder' => 'Enter your DOJ', 'required' => 'required'])}}
									</div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="postmarks" class="col-md-3 control-label">Marks (%).<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{ Form::text('postmarks',null,['class' => 'form-control','placeholder' => 'Enter your Marks (%)', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								
								
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">References Details:</h4>
							         </div>
							    </div>
                                 <div class="form-group">
								   <label for="references" class="col-md-3 control-label">References</label>
								   <div class="col-md-9">
                                      <select name="references" id="category" class="form-control">
									  <option value="1">Yes</option>
									  <option value="2" selected>No</option>									  										  
									  </select>								   
									</div>
								</div>	
                                <div  id="subusertype" style="display:none;"> 								
								<div class="row">
							         <div class="col-lg-12">
									 <h5 style="font-weight: bold;">Professional I:</h5>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="professional1name" class="col-md-3 control-label">Reference Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional1name',null,['class' => 'form-control','placeholder' => 'Enter your Reference Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="professional1relationship" class="col-md-3 control-label">Relationship<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional1relationship',null,['class' => 'form-control','placeholder' => 'Enter your Relationship Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="form-group">
								   <label for="professional1mobile" class="col-md-3 control-label">Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('professional1mobile',null,['class' => 'form-control','placeholder' => 'Enter your Mobile number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="form-group">
								   <label for="professional1knowing" class="col-md-3 control-label">knowing the reference <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional1knowing',null,['class' => 'form-control','placeholder' => 'Enter your Time knowing the Reference', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="professional1contactname" class="col-md-3 control-label">Contact Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{ Form::textarea('professional1contactname',null,['class' => 'form-control','placeholder' => 'Enter your Contact Address','size' => '2x5','required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="row">
							         <div class="col-lg-12">
									 <h5 style="font-weight: bold;">Professional II:</h5>
							         </div>
							    </div>
                                <div class="form-group">
								   <label for="professional2name" class="col-md-3 control-label">Reference Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional2name',null,['class' => 'form-control','placeholder' => 'Enter your Reference Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="professionalrelationship" class="col-md-3 control-label">Relationship<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional2relationship',null,['class' => 'form-control','placeholder' => 'Enter your Relationship Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="form-group">
								   <label for="professional2mobile" class="col-md-3 control-label">Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('professional2mobile',null,['class' => 'form-control','placeholder' => 'Enter your Mobile number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>	
                                 <div class="form-group">
								   <label for="professional2knowing" class="col-md-3 control-label">knowing the reference <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('professional2knowing',null,['class' => 'form-control','placeholder' => 'Enter your Time knowing the Reference', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="professional1contactname" class="col-md-3 control-label">Contact Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{ Form::textarea('professional2contactname',null,['class' => 'form-control','placeholder' => 'Enter your Contact Address','size' => '2x5', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="row">
							         <div class="col-lg-12">
									 <h5 style="font-weight: bold;">Friend:</h5>
							         </div>
							    </div>
                                <div class="form-group">
								   <label for="friendname" class="col-md-3 control-label">Reference Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('friendname',null,['class' => 'form-control','placeholder' => 'Enter your Reference Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="professionalrelationship" class="col-md-3 control-label">Relationship<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('friendrelationship',null,['class' => 'form-control','placeholder' => 'Enter your Relationship Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
                                <div class="form-group">
								   <label for="professional2mobile" class="col-md-3 control-label">Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('friendmobile',null,['class' => 'form-control','placeholder' => 'Enter your Mobile number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>	
                                 <div class="form-group">
								   <label for="friendknowing" class="col-md-3 control-label">knowing the reference <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('friendknowing',null,['class' => 'form-control','placeholder' => 'Enter your Time knowing the Reference', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="friendcontactname" class="col-md-3 control-label">Contact Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{ Form::textarea('friendcontactname',null,['class' => 'form-control','placeholder' => 'Enter your Contact Address','size' => '2x5', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								
								</div>
							</div>
								<!---Second Form culomn--->		
								<div class="col-lg-6">
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Professional Details:</h4>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="userrole" class="col-md-3 control-label">User Role<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="yes" class="col-md-3 control-label">{{Form::radio('userrole', '1', true)}} Permanent</label>
									  <label for="no" class="col-md-3 control-label">{{Form::radio('userrole', '2', false)}} Trainee</label>
                                      <label for="no" class="col-md-3 control-label">{{Form::radio('userrole', '3', false)}} Associate</label>									  
								   </div>
								</div>	
								 <div class="form-group">					
								   <label for="working_status" class="col-md-3 control-label">Working Status<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">								  
									  <select name="working_status" class="form-control">
									  <option>Please select</option>
									  <option value="1">Not working</option>
									  <option value="2">Self-employed</option>
									  <option value="3">Working in organization</option>									  
									  </select>
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="user_department" class="col-md-3 control-label">Department<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_department',$userDepartment,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
								
								<div class="form-group">
								   <label for="user_brand" class="col-md-3 control-label">Brand Level<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_brand',$userBrand,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
							
								<div class="form-group">
								   <label for="user_zone" class="col-md-3 control-label">Zone Assigned<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_zone',$zoneAssigned,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="user_cluster" class="col-md-3 control-label">Cluster Assigned<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_cluster',$clusterAssigned,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
					         
								<div class="form-group">
								   <label for="officeemailid" class="col-md-3 control-label">Official Email<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-envelope"></i>
									  {{ Form::email('officeemailid',$userData->userDetails->user_official_email,['class' => 'form-control','placeholder' => 'Enter your Official Email', 'required' => 'required','disabled'])}}
									  </div>
								   </div>
								</div>						
								<div class="form-group">
								   <label for="references" class="col-md-3 control-label">Appointment Letter Acceptance<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="yes" class="col-md-5 control-label">{{Form::radio('letter', '1', true)}} Yes</label>									  
									  <label for="no" class="col-md-4 control-label">{{Form::radio('letter', '0', false)}} No</label>									 
								   </div>
								</div>															
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Account Details:</h4>
							         </div>
							    </div>
								 <div class="form-group">					
								   <label for="personalaccount" class="col-md-3 control-label">Account Number<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('personalaccount',null,['class' => 'form-control','placeholder' => 'Enter your Personal Account Number', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								 <div class="form-group">					
								   <label for="personaltype" class="col-md-3 control-label">Account Type<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">								  
									  <select name="personaltype" class="form-control">
									  <option>Please select</option>
									  <option value="Current">Current</option>
									  <option value="saving">Saving</option>
									  <option value="other">Other</option>									  
									  </select>
									  </div>
								   </div>
								</div>
								 <div class="form-group">					
								   <label for="ifsc" class="col-md-3 control-label">IFSC code<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('ifsc',null,['class' => 'form-control','placeholder' => 'Enter your IFSC code', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								
								 <div class="form-group">					
								   <label for="pancard" class="col-md-3 control-label">Pan card<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('pancard',null,['class' => 'form-control','placeholder' => 'Enter your Pan card', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								 <div class="form-group">					
								   <label for="aadhar" class="col-md-3 control-label">Aadhar No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('aadhar',null,['class' => 'form-control','placeholder' => 'Enter your Aadhar card', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								
								<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Attachment Details:</h4>
							         </div>
							    </div>
								 <div class="form-group">
								   <label for="addressproof" class="col-md-3 control-label">Address Proof<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('addressproof', array('class' => '')) }}								 
								   </div>
								 </div>
								 <div class="form-group">
								   <label for="photoid" class="col-md-3 control-label">Photo ID Proof<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('photoid', array('class' => '')) }}								 
								   </div>
								 </div>
								<div class="form-group">
								   <label for="graduate" class="col-md-3 control-label">Graduate & Post Graduate degree/ mark sheets documents<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('graduate', array('class' => '')) }}								 
								   </div>
								 </div>	
								  <div class="form-group">
								   <label for="employment" class="col-md-3 control-label">Last Employment Proof<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('employment', array('class' => '')) }}								 
								   </div>
								 </div>
								<div class="form-group">
								   <label for="attachgst" class="col-md-3 control-label">Attach GST certificate<span class='require'>*</span></label>
								   <div class="col-md-9">
								   {{ Form::file('attachgst', array('class' => '')) }}	
								   </div>
								</div>
								<div class="form-group">
								   <label for="references" class="col-md-3 control-label">Attach Acceptance Letter<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('letterimage', array('class' => '')) }}								 
								   </div>
								 </div>
                                 <div class="form-group">
								   <label for="attachpan" class="col-md-3 control-label">Attach Pan card<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('attachpan', array('class' => '')) }}								 
								   </div>
								 </div>	
                                 <div class="form-group">
								   <label for="itr" class="col-md-3 control-label">Last 3 years ITR<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('itr', array('class' => '')) }}								 
								   </div>
								 </div>	
                                 <div class="form-group">
								   <label for="bill" class="col-md-3 control-label">Last paid Utility Bill<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('bill', array('class' => '')) }}								 
								   </div>
								 </div>								 
								 </div>
					   </div>
					</div>
					{{ Form::hidden('userId', $userData->id, array('id' => 'userId')) }}
					 <div class="form-actions">
						<div class="col-md-offset-3 col-md-9" style="margin-left: 3%;">
						<button type="submit" class="btn btn-primary">Submit</button>&nbsp;
						<button type="button" class="btn btn-green" onclick="goBack()">Cancel</button></div>
						</div>
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
				   $('.datepickeryop').datepicker({
				    format: 'yyyy',
					todayHighlight:'TRUE',
					autoclose: true,
					//startDate: new Date(),
				   });
				   
				   
				});
				function goBack() {
					   window.history.back();
				 }
				 $(function() {    
				$('#category').change(function(){
					//alert('test');
					if($(this).val() == 2){
					$('#subusertype').hide();	
					}else{
					$('#subusertype').show();		
					}
				   
				});

			});
        </script>
  @endsection
