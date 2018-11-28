@extends('admin.layouts.index')
@section('content')
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/jquery.dataTables.css')!!}" />
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css')!!}" />
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css')!!}" />
   <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
   <div class="page-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="portlet box">
               <div class="portlet-body">
                  <div class="row mbm">
                     <div class="col-lg-12">
                        <div class="portlet portlet-white">
                           <div class="portlet-header pam mbn">
                              <div class="caption">{{ array_values($breadcrumb)[0] }}</div>
                              <div class="actions">
                                 <a href="{{ url(key($listing)) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-plus"></i>&nbsp;
                                    {{ array_values($listing)[0] }}
                                 </a>&nbsp;
                              </div>
                           </div>
                            @include('admin.common.flash_mesage')
                           <div class="portlet-body pan">
                              <table id="myTable" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
							     <th width="9%">Sr.No.</th>
                                 <th width="9%">User Name</th>
                                 <th width="9%">Email</th>
								 <th width="9%">User Type</th>
								 <th width="9%">Status</th>
                                 <th width="9%">Action</th>
                              </tr>
                              <tbody>
							  <?php //print_r($userdetail);?>
							  @if(count($userdetail))
							  <?php $count=1; //echo '<pre>';print_r($userdetail);?>
							  @foreach($userdetail as $row)
							  <tr>
							  <td>{{(($userdetail->currentPage() - 1 ) * $userdetail->perPage() ) + $loop->iteration}}</td> 
							  <td>{{$row->name}}</td> 
							  <td>{{$row->user_official_email}}</td> 
							  <td>
							  @if($row->user_type_id == 1)
								<span class="label label-success" style="padding: 2px 15px 5px 18px;">Bank</span>
							  @elseif($row->user_type_id == 2)
								<span class="label label-primary" style="padding: 2px 15px 5px 8px;">NBFC</span>
								@elseif($row->user_type_id == 3)
								<span class="label label-info" style="padding: 2px 15px 5px 8px;">Corporate</span>
								@else
								<span class="label label-default" style="padding: 2px 15px 5px 8px;">Normal User</span>
							  @endif
							  </td> 
							  <td>
							  @if($row->status == 1)
								  <span class="label label-success" style="padding: 2px 24px 5px 18px;">Enabled</span>
						      @else
								  <span class="label label-danger" style="padding: 2px 24px 5px 18px;">Disabled</span>
							  @endif
							  </td> 
							   <td>
								   @if($row->status == 1)
									  <a href="signup_action/{{$row->user_id}}" alt="Add more details">
									  <button type="button" class="btn btn-default btn-xs" alt="Click for Disable User" onclick="return confirm('Are you sure to Disable?');"><i class="fa fa-ban" aria-hidden="true"></i></button>
									  </a>
								    @else
									  <a href="signup_action/{{$row->user_id}}" alt="Add more details">
									  <button type="button" class="btn btn-default btn-xs" alt="Click for Enable User" onclick="return confirm('Are you sure to Enable?');"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
									  </a>
															  
								    @endif
									<!-- @if($row->main_user_type == 1)
										<?php //$d=Common::checkUserDetail($row->user_id);?>
									@if($d == 0)
                                    <a href="adddetails/{{$row->user_id}}">
									<button type="button" alt="Add more details" class="btn btn-default btn-xs"><i class="fa fa-plus-square-o"></i></button>
									<!--@else
									<a href="editdetails/{{$row->user_id}}">
									<button type="button" alt="Add more details" class="btn btn-default btn-xs"><i class="fa fa-pencil">Edit</i></button>-->
										
									<!--@endif
									
									@else-->
									<?php $d=Common::checkUserDetail($row->user_id);?>
								    <!--@if($d == 0)
                                    <a href="addass_userdetail/{{$row->user_id}}">
									<button type="button" alt="Add more details" class="btn btn-default btn-xs"><i class="fa fa-plus-square-o"></i></button>
									
									@endif-->
									@endif									
									<!--<a href="edit/{{$row->user_id}}" alt="Add more details">
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button>
									</a>-->
									 @if($row->status == 1)
									  <a href="#" alt="">
									  <button type="button" class="btn btn-default btn-xs"  onclick="return alert('First Disable User then Delete?');"><i class="fa fa-trash-o"></i></button>															  
								       </a>
								     @else
								       <a href="signup_user_delete/{{$row->user_id}}" alt="">
									  <button type="button" class="btn btn-default btn-xs"  onclick="return confirm('Are you sure to Delete?');"><i class="fa fa-trash-o"></i></button>															  
								       </a>
									@endif
                                    
                                 </td>							 
							  </tr>
							  <?php $count++;?>
							  @endforeach
							  @else
							  <tr><td>Records not found</td></tr>  
							  @endif
                              </tbody>
                              </thead>
                           </table>
                              <div style="float:right;">
                                 {{ $userdetail->links() }}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END CONTENT-->
@endsection
<!--LOADING SCRIPTS FOR PAGE-->
@push('scripts')
    <script src="{!! asset('public/js/jquery.dataTables.min.js') !!}"></script>
@endpush
