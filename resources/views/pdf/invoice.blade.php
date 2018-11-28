<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />	
	<title>Invoice</title>
	<link type="text/css" rel="stylesheet" href="{!! asset('public/EditableInvoice/css/printstyle.css') !!}" />
	<link type="text/css" rel="stylesheet" href="{!! asset('public/EditableInvoice/css/print.css') !!}"  media="print" />
	<script src="{!! asset('public/EditableInvoice/js/jquery-1.3.2.min.js') !!}"></script>
	<script src="{!! asset('public/EditableInvoice/js/example.js') !!}"></script>
</head>
<body>
	<div id="page-wrap">
		<textarea id="header">INVOICE</textarea>		
		<div id="identity">		
            <div id="address">Chris Coyier<br>
			123 Appleseed Street<br>
			Appleville, WI 53719
			<br>Phone: (555) 555-5555<br>
			</div>
            <div id="logo">
              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
			  {{ Html::image('public/EditableInvoice/images/logo.png', 'Logo') }}
            </div>		
		</div>
		
		<div style="clear:both"></div>
		<textarea id="customer-title">{{$data->customer_name}} <br> {{$data->person_name}}</textarea>
		<div id="customer_">
            
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>{{$invoiceNo}}</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><textarea id="date">{{date('d-m-Y')}} {{ $data->service_group }}/textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$875.00</div></td>
                </tr>

            </table>
		
		</div>
		<div style="clear:both"></div>
		<table id="items">		
		  <tr>
		      <th style='width: 75%;'>Service</th>
		      <th>Cost</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">Service Name1</td>
			  <td style="text-align:right">52</td>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">Service Name2</td>
			  <td style="text-align:right">100</td>
		  </tr>	  
		  
		</table>
		<div style="float:right; width:30%;">
		<table id="items">
		<tr>
			<td>Total Services</td>
			<td>2</td>
		</tr>
		<tr>
			<td>Total Cost</td>
			<td>152</td>
		</tr>
		</table>
		</div>
	</div>	
</body>

</html>