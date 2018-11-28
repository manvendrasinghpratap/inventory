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
			<div class="flash-message">
						  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
							@if(Session::has('alert-' . $msg))
							<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
							@endif
						  @endforeach
						</div>
               <div class="portlet-body">			  
                  <div class="row mbm">
				   <div class="portlet-header pam mbn">			        
                           <div class="actions" style="float: right;margin-bottom: 10px;">                              
                           </div>
				    </div>
                     <div class="col-lg-12">
                        <div class="table-responsive">
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
							  <?php $count=1;?>
							  @foreach($userdetail as $row)
							  <tr>
							  <td>{{(($userdetail->currentPage() - 1 ) * $userdetail->perPage() ) + $loop->iteration}}</td> 
							  <td>{{$row->name}}</td> 
							  <td>{{$row->email}}</td> 
							  <td>
							   @if($row->user_type_id == 1)
								  <span class="label label-success" style="padding: 2px 24px 5px 18px;">Bank User</span>
						      @elseif($row->user_type_id == 2)
								  <span class="label label-info" style="padding: 2px 24px 5px 18px;">NBFC</span>
							  @elseif($row->user_type_id == 3)
								  <span class="label label-warning" style="padding: 2px 24px 5px 18px;">Corporate</span>
							  @else
								  <span class="label label-primary" style="padding: 2px 24px 5px 18px;">Individual</span>
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
									  <a href="user/user_action/{{$row->id}}" alt="Add more details">
									  <button type="button" class="btn btn-default btn-xs" alt="Click for Disable User" onclick="return confirm('Are you sure to Disable?');"><i class="fa fa-ban" aria-hidden="true"></i></button>
									  </a>
								    @else
									  <a href="user/user_action/{{$row->id}}" alt="Add more details">
									  <button type="button" class="btn btn-default btn-xs" alt="Click for Enable User" onclick="return confirm('Are you sure to Enable?');"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
									  </a>
															  
								    @endif							        
									 @if($row->status == 1)
									 
								     @else
								       <a href="user/user_delete/{{$row->id}}">
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
   <!--END CONTENT-->
    <link src="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script src="{!! asset('public/vendors/DataTables/media/js/jquery.dataTables.js ') !!}"></script>
   <script src="{!! asset('public/vendors/DataTables/media/js/dataTables.bootstrap.js ') !!}"></script>
   <script src="{!! asset('public/vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js ') !!}"></script>

   <script src="{!! asset('public/js/table-datatables.js ') !!}"></script>
   <script>
   $(document).ready(function(){
    $('#myTable').DataTable();
});
   </script>
   
  @endsection
<!--LOADING SCRIPTS FOR PAGE-->

