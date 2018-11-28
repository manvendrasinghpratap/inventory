@extends('admin.layouts.index')
@section('content')
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	
					<div class="panel panel-blue">
					   <div class="panel-heading">Add Internal User Details</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'savedetails','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
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
								   <label for=userphoto" class="col-md-3 control-label">Photo<span class='require'>*</span></label>
								   <div class="col-md-9">
								      {{ Form::file('userphoto', array('class' => '')) }}								 
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
								   <label for="siblings" class="col-md-3 control-label">Total Siblings<span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon">									  
									  {{ Form::number('siblings',null,['class' => 'form-control','min'=>'0','required' => 'required'])}}
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
								   <label for="kids" class="col-md-3 control-label">No. of Kids<span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon">									  
									  {{ Form::number('kids',null,['class' => 'form-control','min'=>'0','required' => 'required'])}}
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
								   <label for="joiningage" class="col-md-3 control-label">Age at the time of joining<span class='require'>*</span></label>
								    <div class="col-md-9">
									  <div class="input-icon">									  
									  {{ Form::number('joiningage',null,['class' => 'form-control','min'=>'0','required' => 'required'])}}
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
								   <label for="ppin" class="col-md-3 control-label">Permanent Pin<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									  {{ Form::text('ppin',null,['class' => 'form-control','placeholder' => 'Enter your Permanent Area Pin', 'required' => 'required'])}}
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
								<div class="form-group">
								   <label for="collagename" class="col-md-3 control-label">Collage Name<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-building" aria-hidden="true"></i>
									  {{ Form::text('collagename',null,['class' => 'form-control','placeholder' => 'Enter your Collage Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="caddress" class="col-md-3 control-label">Collage Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
									  {{ Form::textarea('caddress' , null , ['class' => 'form-control','size' => '2x5']) }}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="cpin" class="col-md-3 control-label">Collage Area Pin<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									  {{ Form::text('cpin',null,['class' => 'form-control','placeholder' => 'Enter your Collage Area Pin', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="references" class="col-md-3 control-label">References<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="yes" class="col-md-3 control-label">{{Form::radio('references', '1', true)}} Yes</label>									 
									  <label for="no" class="col-md-6 control-label"> {{Form::radio('references', '0', false)}} No</label>									 
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
								<div id="subusertype" style="display:none;">
								<div class="form-group">
								   <label for="referencename" class="col-md-3 control-label">Reference Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('referencename',null,['class' => 'form-control','placeholder' => 'Enter your Reference Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="relationship" class="col-md-3 control-label">Relationship<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('relationship',null,['class' => 'form-control','placeholder' => 'Enter your Relationship Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="contactname" class="col-md-3 control-label">Conatct Name<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('contactname',null,['class' => 'form-control','placeholder' => 'Enter your Conatct Name', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="contactaddress" class="col-md-3 control-label">Conatct Address<span class='require'>*</span></label>
								   <div class="col-md-9">
									 <div class="input-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
									  {{ Form::textarea('contactaddress' , null , ['class' => 'form-control','size' => '2x5']) }}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="contactpin" class="col-md-3 control-label">Pin code<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
									  {{ Form::text('contactpin',null,['class' => 'form-control','placeholder' => 'Enter your Pin code', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>
								
								</div>
								<div class="form-group">
								   <label for="jobarea" class="col-md-3 control-label">Job Area<span class='require'>*</span></label>
								   <div class="col-md-9">								      
									  <label for="yes" class="col-md-5 control-label">{{Form::radio('jobarea', '1', true)}} Work In VIS</label>
									  
									  <label for="no" class="col-md-4 control-label">{{Form::radio('jobarea', '0', false)}}Work In Other</label>									 
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
								
							</div>
					<!---Second Form culomn--->		
                    <div class="col-lg-6">
					<div class="row">
							         <div class="col-lg-12">
									 <h4 style="font-weight: bold;">Professional Details:</h4>
							         </div>
							    </div>
								<div class="form-group">
								   <label for="empid" class="col-md-3 control-label">Employee ID<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
									  {{ Form::text('empid',null,['class' => 'form-control','placeholder' => 'Enter your ID', 'required' => 'required'])}}
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
								   <label for="user_specialization" class="col-md-3 control-label">Specialization<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_specialization',$userSpecialization,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="user_brand" class="col-md-3 control-label">Band Level<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_brand',$userBrand,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="user_designation" class="col-md-3 control-label">Designation<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_designation',$userDesignation,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
								<div class="form-group">
								   <label for="user_assest" class="col-md-3 control-label">Assign Assest<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_assest',$userDesignation,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
									  </div>
								   </div>
								</div>
					<div class="form-group">
								   <label for="user_exposure" class="col-md-3 control-label">Industrial Exposure Level<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  {{Form::select('user_exposure',$industrialExposure,null,array('class' => 'form-control','placeholder' => 'Please select'))}}
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
								   <label for="cugmobile" class="col-md-3 control-label">CUG Mobile No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-mobile" aria-hidden="true"></i>
									  {{ Form::text('cugmobile',null,['class' => 'form-control','placeholder' => 'Enter your CUG Mobile number', 'required' => 'required'])}}
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
								   <label for="salaryaccount" class="col-md-3 control-label">Salary Account<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('salaryaccount',null,['class' => 'form-control','placeholder' => 'Enter your Salary Account', 'required' => 'required'])}}
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
								 <div class="form-group">					
								   <label for="passport" class="col-md-3 control-label">Passport No.<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('passport',null,['class' => 'form-control','placeholder' => 'Enter your Passport card', 'required' => 'required'])}}
									  </div>
								   </div>
								</div>								
								<div class="form-group">
								   <label for="salaryamount" class="col-md-3 control-label">Salary Amount<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('salaryamount',null,['class' => 'form-control','placeholder' => 'Enter your Salary Ammount', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">
								   <label for="tds" class="col-md-3 control-label">TDS to be Deduction (%)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('tds',null,['class' => 'form-control','placeholder' => 'Enter your TDS to be Deduction', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								
								<div class="form-group">
								   <label for="advance" class="col-md-3 control-label">Advances (-)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('advance',null,['class' => 'form-control','placeholder' => 'Enter your Advances', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">
								   <label for="deductions" class="col-md-3 control-label">Deductions (-)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('deductions',null,['class' => 'form-control','placeholder' => 'Enter your Deductions', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">
								   <label for="reimbursements" class="col-md-3 control-label">Reimbursements (+)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('reimbursements',null,['class' => 'form-control','placeholder' => 'Enter your Reimbursements', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">
								   <label for="incentives" class="col-md-3 control-label">Incentives (+)<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('incentives',null,['class' => 'form-control','placeholder' => 'Enter your Incentives', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">
								   <label for="totalsalary" class="col-md-3 control-label">Total Salary<span class='require'>*</span></label>
								   <div class="col-md-9">
									  {{ Form::number('totalsalary',null,['class' => 'form-control','placeholder' => 'Enter your Total Salary', 'min' =>'0','required' => 'required'])}}
								   </div>
								</div>
								<div class="form-group">					
								   <label for="gst" class="col-md-3 control-label">GST Number<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-university" aria-hidden="true"></i>
									  {{ Form::text('gst',null,['class' => 'form-control','placeholder' => 'Enter your GST Number', 'required' => 'required'])}}
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
