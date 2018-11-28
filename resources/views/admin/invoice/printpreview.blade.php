
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
    <style>
    *
    {
    border: 0;
    box-sizing: content-box;
    color: inherit;
    font-family: inherit;
    font-size: inherit;
    font-style: inherit;
    font-weight: inherit;
    line-height: inherit;
    list-style: none;
    margin: 0;
    padding: 0;
    text-decoration: none;
    vertical-align: top;
    }

    /* content editable */

    *[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

    *[contenteditable] { cursor: pointer; }

    *[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

    span[contenteditable] { display: inline-block; }

    /* heading */

    h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

    /* table */

    table { font-size: 75%; table-layout: fixed; width: 100%; }
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
    th, td { border-radius: 0.25em; border-style: solid; }
    th { background: #EEE; border-color: #BBB; }
    td { border-color: #DDD; }

    /* page */

    html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
    html { background: #999; cursor: default; }

    body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
    body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

    /* header */

    header { margin: 0 0 3em; }
    header:after { clear: both; content: ""; display: table; }

    header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
    header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
    header address p { margin: 0 0 0.25em; }
    header span, header img { display: block; float: right; }
    header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
    header img { max-height: 100%; max-width: 100%; }
    header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

    /* article */

    article, article address, table.meta, table.inventory { margin: 0 0 3em; }
    article:after { clear: both; content: ""; display: table; }
    article h1 { clip: rect(0 0 0 0); position: absolute; }

    article address { float: left; font-size: 20px; font-weight: bold; }

    /* table meta & balance */

    table.meta, table.balance { float: right; width: 36%; }
    table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

    /* table meta */

    table.meta th { width: 40%; }
    table.meta td { width: 60%; }

    /* table items */

    table.inventory { clear: both; width: 100%; }
    table.inventory th { font-weight: bold; text-align: center; }

    table.inventory td:nth-child(1) { width: 26%; }
    table.inventory td:nth-child(2) { width: 38%; }
    table.inventory td:nth-child(3) { text-align: right; width: 12%; }
    table.inventory td:nth-child(4) { text-align: right; width: 12%; }
    table.inventory td:nth-child(5) { text-align: right; width: 12%; }

    /* table balance */

    table.balance th, table.balance td { width: 50%; }
    table.balance td { text-align: right; }

    /* aside */

    aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
    aside h1 { border-color: #999; border-bottom-style: solid; }

    /* javascript */

    .add, .cut
    {
    border-width: 1px;
    display: block;
    font-size: .8rem;
    padding: 0.25em 0.5em;	
    float: left;
    text-align: center;
    width: 0.6em;
    }

    .add, .cut
    {
    background: #9AF;
    box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
    background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
    border-radius: 0.5em;
    border-color: #0076A3;
    color: #FFF;
    cursor: pointer;
    font-weight: bold;
    text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
    }

    .add { margin: -2.5em 0 0; }

    .add:hover { background: #00ADEE; }

    .cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
    .cut { -webkit-transition: opacity 100ms ease-in; }

    tr:hover .cut { opacity: 1; }

    @media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0; }
    span:empty { display: none; }
    .add, .cut { display: none; }
    }

    @page { margin: 0; }
    @page {size: A4 portrait;}
    </style>
	</head>
	<body>
	<div style="margin-top: -35px;float: right;"><a onclick="window.print()">Print</a>
	{!! link_to(URL::previous(), trans('message.goback'), ['class' => 'btn btn-default']) !!}
	</div>
	<div id="yourdiv">
		<header>
			<h1>Invoice</h1>
			<address contenteditable_>
				<p>Dharamswaroop Trading Company</p>
				<p>Allahabad bank</p>
				<p>Account No: 50375019944</p>
				<p>IFSC CODE: ALLA0210336</p>
				<p>Branch Name: Gola Gokaran Nath Kheri</p>
				<p><i>Address:</i></p>
				<p>Near Nanak Police Chauki Lakhimpur Road Gola Gokaran Nath Kheri</p>
				<p>Distt Lakhimpur Kheri </p>
				<p>City Gola Gokaran Nath Kheri</p>
				<p>Pincode 262802 (U.P)</p>
				<p>GSTIN 09GOOPS1113E1ZU</p>
				<p>Mobile No. 9889304609</p>
			</address>
			<span>
			{{ Html::image('public/images/new_logo.png', 'Profile Pic',array('class' => 'img-responsive img-circle')) }}
			</span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address >
				<p>{{ @$invoiceData[0]['bank_name'] }}<br>{{ @$invoiceData[0]['branch_name'] }}<br>{{ @$invoiceData[0]['statename'] }}</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td>{{ @$invoiceData[0]['invoice'] }}</td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td>{{ @$invoiceData[0]['invoice_date'] }}</td>
				</tr>
				<tr>
					<th><span contenteditable>Net Amount</span></th>
					<td>{{ @$invoiceData[0]['netpayableamount'] }}</td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Product Name</span></th>
						<th><span>Size</span></th>
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
                @php( $i=0)
				    @foreach($invoiceData[0]->invoiceDetails as $row)
					<tr>
						<td><span>{{ @$row['productname'] }}</span></td>
						<td><span>{{ @$row['categoryname'] }}</span></td>
						<td><span>{{ @$row['rate'] }}</span></td>
						<td><span>{{ @$row['quantity'] }}</span></td>
						<td><span>{{ @$row['price'] }}</span></td>
					</tr>
					@php ($i++)
					@endforeach
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th>Total</th>
					<td>{{ @$invoiceData[0]['totalamount'] }}</td>
				</tr>
				@if(@$invoiceData[0]['discount']>0)
				<tr>
					<th>Discount(in Rs)</th>
					<td>{{ @$invoiceData[0]['discount'] }}</td>
				</tr>
				@endif
				<tr>
					<th>GST(%)</th>
					<td>{{ @$invoiceData[0]['gst'] }}</td>
				</tr>
				<tr>
					<th>Shipping Charges</th>
					<td> @php($nil = 'Nill')@if(@$invoiceData[0]['shipping_charges']>0){{ @@$invoiceData[0]['shipping_charges'] }} @else {{ $nil}} @endif</td>
				</tr>
				<tr>
					<th>Net Payable Amount</th>
					<td>{{ @$invoiceData[0]['netpayableamount'] }}</td>
				</tr>
			</table>
		</article>
		<aside>
			<h1></h1>
		</aside>
        </div>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script>        
            $(document).ready(function(){
                window.print();
            });
        </script>
	</body>
	
</html>









