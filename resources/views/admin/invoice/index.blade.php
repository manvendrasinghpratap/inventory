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
                                 <th width="2%">S.No.</th>
                                 <th width="10%">Invoice</th>
                                 <th width="10%">State Name</th>
                                 <th width="10%">Bank Name</th>
                                 <th width="10%">Branch Name</th>
                                 <th width="5%">GST No.</th>
                                 <th width="5%">Total Amount</th>
                                 <th width="1%">Discount</th>
                                 <th width="5%">GST</th>
                                 <th width="5%">Net Pay</th>
                                 <th width="5%">Invoice <br>Date</th>
                                 <th width="2%">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @php( $i=0)
                              @foreach($invoices as $row)
                                 <tr id="hide_{{ $row->invoice }}">
                                    <td>{{ ++$i }}</td>                                    
                                    <td>{{ $row->invoice }}</td>                                    
                                    <td>{{ $row->statename }}</td>                                    
                                    <td>{{ $row->bank_name }}</td>                                    
                                    <td>{{ $row->branch_name }}</td>                                    
                                    <td>{{ $row->gst_no }}</td>                                                   
                                    <td>{{ $row->totalamount }}</td>                                                   
                                    <td>{{ $row->discount }}</td>                                                   
                                    <td>{{ $row->gst }}</td>                                    
                                    <td>{{ $row->netpayableamount }}</td>                                    
                                    <td>{{ date('d-m-Y',strtotime($row->invoice_date)) }}</td>                                    
                                    <td>
                                       <a target='_blank' class="btn btn-default btn-xs edit" href="{{ URL::to('print/'.\App\Helpers\Common::encodeParam($row->invoice) ) }}" title="Print Invoice"> <i class="fa fa-print"></i></a>
                                       <button type="button" data-deleteColumnName = "invoice" class="btn btn-default btn-xs confirmDeleteStatus" data-siteurl ="{{ url('/')}}" data-tablename="invoices" data-record-id="{{ $row->invoice }}" data-record-title="Are you sure you want to delete this Invoice?" data-toggle="modal" data-target="modal-confirm" data-succuss="Product deleted successfully">
                                          <i class="fa fa-trash-o "></i></button>
                                    </td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                        </div>
                        <div style="float:right;">
                           {{ $invoices->links() }}
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

