@extends('admin.layouts.index')
@section('content')
<style>
.panel-sub-heading {
        color: #FFFFFF;
        background: #0a8;
        border-color: #0a8 !important;
        height: 33px;
        font-size: 16px;
        clear: both;
        text-align: center;
        padding-top: 7px;
}
</style>
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">View Product And Size</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'updateProduct','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						   {{ Form::hidden('id', $productdetails['id'], array('name'=>'id')) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">Product Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', $productdetails['name'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Product Name")) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">GST <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('gst', $productdetails['gst'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Enter GST")) }}
										  <span class="text-danger">{{ $errors->first('gst') }}</span>
									  </div>
								   </div>
								</div>
                                 <div class="form-group {{ $errors->has('hsn') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">HSN <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('hsn', $productdetails['hsn'], array('class' => 'form-control','placeholder'=>"Enter HSN")) }}
										  <span class="text-danger">{{ $errors->first('hsn') }}</span>
									  </div>
								   </div>
								</div>
								 <hr/>
                                <div class="panel-sub-heading">View Size </div>
                                <br>
                                 <div class="col-md-3"></div>
								<div class="col-md-9">
                                   <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                      <thead>                                          
                                       <tr>
                                           <th width="50%" >Size</th>
                                           <th width="40%" >Price</th>
                                       </tr>
                                      </thead>
                                      <tbody>
                                      @php ($i=0)
                                      @foreach($categorydetails as $categorydetail)
                                      <tr>
                                          <td>{{ Form::text('size', $categorydetail['name'], array('disabled'=>true,'class' => 'form-control','placeholder'=>"Enter Size",'name'=>'size[]')) }}</td>
                                          <td>{{ Form::number('price', $categorydetail['rate'], array('disabled'=>true,'class' => 'form-control addNew ','placeholder'=>"Enter Price",'name'=>'price[]','min'=>0)) }}</td>
                                      </tr>
                                       @php (++$i)
                                      @endforeach
                                      </tbody>                                       
                                   </table>                                    
								</div>
							 </div>							 
							</div>								
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 {!! link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']) !!}
								 </div>
							 </div>
						  {{ Form::close() }}
					   </div>
					</div>
				 </div>
				 </div>
               <!--END CONTENT-->
  @endsection