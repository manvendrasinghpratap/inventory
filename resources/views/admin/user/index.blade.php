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
                        <div class="table-responsive">
                           <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
                                 <th width="9%">Zone Name</th>
                                 <th width="9%">Pin code</th>
                                 <th width="9%">Action</th>
                              </tr>
                              <tbody>
                              @foreach($zonedetails as $row)
                                 <tr>
                                 <td>{{ $row->name }}</td>
                                 <td>{{ $row->pincode }}</td>
                                 <td>
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-delete"></i>&nbsp; Delete</button>
                                 </td>
                                 </tr>
                              @endforeach
                              </tbody>
                              </thead>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END CONTENT-->
   <script src="{!! asset('public/vendors/DataTables/media/js/jquery.dataTables.js ') !!}"></script>
   <script src="{!! asset('public/vendors/DataTables/media/js/dataTables.bootstrap.js ') !!}"></script>
   <script src="{!! asset('public/vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js ') !!}"></script>
   <script src="{!! asset('public/js/table-datatables.js ') !!}"></script>
  @endsection
<!--LOADING SCRIPTS FOR PAGE-->

