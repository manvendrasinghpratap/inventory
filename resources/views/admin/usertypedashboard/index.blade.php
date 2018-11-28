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
                              <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                 <thead>
                                 <tr>
                                    <th width="25%">User Type Name</th>
                                    <th width="65%">Dashboard URL</th>
                                    <th>Action</th>
                                 </tr>
                                 <tbody>
                                 @foreach($usertypedashboarddetails as $row)
                                    <tr id="hide_{{ $row['id'] }}">
                                       <td>{{ $row['name'] }}</td>
                                       <td>{{ $row['dashboard_url'] }}</td>
                                       <td>
                                          <a class="btn btn-default btn-xs edit" href="{{ URL::to('edituserTypeDashboard/'.\App\Helpers\Common::encodeParam($row['id']) ) }}" title="Edit User Types Dashboards"> <i class="fa fa-edit"></i></a>
                                          <button type="button" class="btn btn-default btn-xs confirmDelete" data-siteurl ="{{ url('/')}}" data-tablename="user_types_dashboards" data-record-id="{{ $row['id'] }}" data-record-title="Are you sure you want to delete this User Types Dashboards?" data-toggle="modal" data-target="modal-confirm" data-succuss="User Type Dashboard deleted successfully">
                                             <i class="fa fa-trash-o "></i></button>
                                       </td>
                                    </tr>
                                 @endforeach
                                 </tbody>
                                 </thead>
                              </table>
                           </div>
                        </div>
                        <div style="float:right;">
                           {{$usertypedashboarddetails->links() }}
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