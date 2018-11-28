@extends('admin.layouts.login')
@section('content')
    <div class="page-form" style="width:80% !important; height:80%">

   <div class="col-lg-12">
      <div class="panel panel-yellow">
         <div class="panel-heading">Signup Form </div>
         <div class="panel-body pan">
            <form action="#" class="horizontal-form">
               <div class="form-body pal">
                  <h3>Signup As</h3>
				  
				  <div class="form-group">
					   <div class="radio">
						  <label class="radio-inline">
							 <div class="iradio_minimal-grey " style="position: relative;">
							 {{ Form::radio('user_type', 'bank', true, ['class' => 'field']) }}
							 </div>
							 &nbsp;
							 {{ trans('message.bank')}}
						  </label>
						  <label class="radio-inline">
							 <div class="iradio_minimal-grey" style="position: relative;">
							 {{ Form::radio('user_type', 'bank', '', ['class' => 'field']) }}
								</div>
							 &nbsp;
							{{ trans('message.nbfc')}}
						  </label>
						  <label class="radio-inline">
							 <div class="iradio_minimal-grey" style="position: relative;">
							 {{ Form::radio('user_type', 'bank', '', ['class' => 'field']) }}
							 </div>
							 &nbsp;
							 {{ trans('message.corporate')}}
						  </label>
						  <label class="radio-inline">
							 <div class="iradio_minimal-grey" style="position: relative;">
							 {{ Form::radio('user_type', 'bank', '', ['class' => 'field']) }}
							 </div>
							 &nbsp;
							 {{ trans('message.indi_custom')}}
						  </label>
					   </div>
					</div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group has-success">
                           <label for="inputFirstName" class="control-label">First Name <span class="require">*</span></label>
                           <div class="input-icon right"><i data-hover="tooltip" data-original-title="Correct" class="glyphicon glyphicon-ok tooltips"></i><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"></div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group has-error">
                           <label for="inputLastName" class="control-label">Last Name <span class="require">*</span></label>
                           <div class="input-icon right"><i data-hover="tooltip" data-original-title="Last Name is empty" class="glyphicon glyphicon-remove tooltips"></i><input id="inputLastName" type="text" placeholder="Last Name" class="form-control"></div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="inputEmail" class="control-label">Email <span class="require">*</span></label>
                           <div class="input-icon"><i class="fa fa-envelope"></i><input type="text" placeholder="Email Address" class="form-control"></div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="selGender" class="control-label">Gender <span class="require">*</span></label>
                           <select id="selGender" class="form-control">
                              <option value="">Male</option>
                              <option value="">Female</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><label for="inputBirthday" class="control-label">Birthday</label><input id="inputBirthday" type="text" placeholder="dd/mm/yyyy" class="form-control"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label for="inputPhone" class="control-label">Phone</label><input id="inputPhone" type="text" placeholder="" class="form-control"></div>
                     </div>
                  </div>
                  <h3>Address</h3>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group"><label for="inputStreet" class="control-label">Street <span class="require">*</span></label><input id="inputStreet" type="text" placeholder="" class="form-control"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><label for="inputFirstName" class="control-label">District</label><input id="inputDistrict" type="text" placeholder="" class="form-control"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label for="inputCity" class="control-label">City <span class="require">*</span></label><input id="inputCity" type="text" placeholder="" class="form-control"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><label for="inputPostCode" class="control-label">Post Code</label><input id="inputPostCode" type="text" placeholder="" class="form-control"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="selCountry" class="control-label">Country</label>
                           <select id="selCountry" class="form-control">
                              <option value="">Select a Country</option>
                              <option value="">United States</option>
                              <option value="">England</option>
                              <option value="">France</option>
                              <option value="">Spain</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-actions text-right pal"><button type="submit" class="btn btn-primary">Submit</button>&nbsp;<button type="button" class="btn btn-green">Cancel</button></div>
            </form>
         </div>
      </div>
   </div>

    </div>
@endsection
@push('scripts')
<script>

$(document).ready(function() {
	 $("input[name=type]").change(function() {
        var check = $(this).val();
		if(check=='BANK'){			
			  $("#bank").show();
              $("#Corporate").hide()
			  $("#NBFC").hide()
			  $("#customer").hide()
		}else if(check=='NBFC'){
			  $("#NBFC").show();
              $("#Corporate").hide()
			  $("#bank").hide()
			  $("#customer").hide()
		}else if(check=='Corporate'){
			  $("#Corporate").show();
              $("#bank").hide()
			  $("#NBFC").hide()
			  $("#customer").hide()
		}else{
              $("#customer").show();
              $("#Corporate").hide()
			  $("#NBFC").hide()
			  $("#bank").hide()
		}
      ;
    }); 
	$( "#ifsc" ).change(function() 
  {
	var id = $(this).val();
	$.ajax({
    method: 'GET', 
    url: '{{ url('register/getbankdetail') }}',
	data: {id: id},
    success: function(response){
		$('.appendHtml').html(response);
        console.log(response ); 
    },
    error: function(response) { // What to do if we fail
    }
});
});


});

$("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});

function goBack() {
    window.history.back();
}

</script>
@endpush


