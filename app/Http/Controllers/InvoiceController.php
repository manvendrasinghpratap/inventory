<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categories;
use App\BankDetails;
use App\State;
use Session;
use Redirect;
use App\Invoice;
use App\InvoiceDetail;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $breadcrumb = array('/invoices'=>'Invoices','/generateInvoice'=>'Generate New Invoice');
    protected $listing = array('/generateInvoice'=>'Generate New Invoice');
    protected $page_title = 'Invoices';

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
        {     
            $invoices = Invoice::select('*')->orderBy('invoice', 'desc')->paginate($this->rowPerPage);
                return view('admin.invoice.index')
                        ->with('page_title',$this->page_title)
                        ->with('invoices',$invoices)
                        ->with('listing',$this->listing)
                        ->with('breadcrumb',$this->breadcrumb);

            //
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $request->session()->forget('key');        
        Session::forget('productsArray');
        $invoice = strtotime("now");
        $bankDetail = BankDetails::pluck('bank_name','id')->toArray();
        $states = State::pluck('name','id')->toArray();
        $product = Product::with('categoryDetails')->get();
      //  $this->p($product);
        //die();
        $options = '';
        foreach($product as $pro){
            $dd = $pro->categoryDetails->toArray();
            //$this->p(count($dd));
             $this->p($dd);
            if(count($dd)>1){
                echo $dd[0]['rate']; echo '<br>';
            }else{
               // echo $dd['rate']; echo '<br>';
            }
        }
        echo $options;
        die();
        Session::push('productsArray', $product); 
        $categories = Categories::pluck('name','id')->toArray();
        return view('admin.invoice.create')
                ->with('page_title',$this->page_title)
                ->with('listing',$this->listing)
                ->with('states',$states)
                ->with('bankDetail',$bankDetail)
                ->with('product',$product)
                ->with('options',$options)
                ->with('invoice',$invoice)
                ->with('breadcrumb',$this->breadcrumb);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        //echo $request->submitbutton;
        $data = $request->all();
        //$this->p($data); die();
        //$this->p($data['quantity']);
        //$invoice = strtotime("now");
        
        $totalAmount = $data['totalAmount'];
        $invoice = $data['invoice'];
        $invoice_date = $data['invoice_date'];
        $branch_name = $data['branch_name'];
        $state_id = $data['state_id'];
        $shippingcharges = $data['shippingcharges'];
        $bank_id = $data['bank_id'];
        $main_gst = $data['main_gst'];
        $gst_no = $data['gst_no'];
        $date = date('d-M-Y H:i:s',strtotime($invoice_date));
        $netPayableAmount = $data['netPayableAmount'];
        $discountAmount = $data['discountAmount'];
        $productIds = array_filter($data['product_id']);
        $sub_categoryIds = array_filter($data['sub_category']);
        $quantities = array_filter($data['quantity']);
        $ratebyquantities = array_filter($data['ratebyquantity']);
        //$this->p($quantities); 
        //$this->p($sub_categoryIds);  
        //echo count($quantities);
        $bankdetails = BankDetails::select('bank_details.bank_name')
                        ->where('bank_details.id', $bank_id)
                        ->first();
        $stateDetails = State::select('name')
                        ->where('id', $state_id)
                        ->first();
        ///$categoryDetails = Categories::whereIn('id',$sub_categoryIds)->get();
        $categoryDetails = Categories::whereIn('id',$sub_categoryIds)->with('productDetails')->get();
       // $productGst = $categoryDetails->productDetails->gst; 
        //$this->p($categoryDetails[0]->productDetails['id']); 
        //$this->p($categoryDetails[0]->productDetails['name']); 
        //die();
        $y=0;
        foreach($categoryDetails as $row){
            $catNameArray[$y] = $row['name'];
            $catIdArray[$y]   = $row['id'];
            ++$y;
        }
        // $this->p($catNameArray); 
         //$this->p($catIdArray); 
        //die();
        
        
       // $productDetails = Product::select('*')->whereIn('id',$productIds)->get();
         //$this->p($productDetails);
        $state_name = $stateDetails->name;
        $bank_name = $bankdetails->bank_name;
        $i=0;
        
            $invoiceInsert = new Invoice;
            $invoiceInsert->invoice = $invoice;
            $invoiceInsert->gst_no = $gst_no;
            $invoiceInsert->invoice_date = date('Y-m-d H:i:s',strtotime($invoice_date));
            $invoiceInsert->statename = $state_name;
            $invoiceInsert->bank_id = $bank_id;
            $invoiceInsert->bank_name = $bank_name;
            $invoiceInsert->branch_name = $branch_name;
            $invoiceInsert->discount = $discountAmount;
            $invoiceInsert->totalamount = $totalAmount;
            $invoiceInsert->shipping_charges = $shippingcharges;
            $invoiceInsert->netpayableamount = $netPayableAmount;
            $invoiceInsert->gst = $main_gst;
            $invoiceInsert->save();
        
        foreach($categoryDetails as $row)
        {
            if(count($quantities)>$i){
                $invoiceInsert = new InvoiceDetail;
                $invoiceInsert->invoice = $invoice;
                $invoiceInsert->quantity = $quantities[$i];
                $invoiceInsert->price = $ratebyquantities[$i];
                $invoiceInsert->rate = $row['rate'];
                $invoiceInsert->product_id      =   $categoryDetails[$i]->productDetails['id']; 
                $invoiceInsert->productname     =   $categoryDetails[$i]->productDetails['name']; 
                $invoiceInsert->category_id     =   $catIdArray[$i];
                $invoiceInsert->categoryname    =   $catNameArray[$i];
                $invoiceInsert->save();
                $i++;
            }
        }
        switch($request->submitbutton) {

        case 'Save And Print': 
            $invoice = \App\Helpers\Common::encodeParam($invoice);
                return redirect()->route('print', ['invoice' => $invoice]);
            // return Redirect::route('print',['id'=>1]);
            //return redirect()->route('print', ['id' => 1]);
            return view('admin.invoice.print')
            ->with('productDetails',$categoryDetails)
            ->with('quantity',$quantities)
            ->with('ratebyquantities',$ratebyquantities)
            ->with('discountAmount',$discountAmount)
            ->with('totalAmount',$totalAmount)
            ->with('shippingcharges',$shippingcharges)
            ->with('main_gst',$main_gst)
            ->with('invoice',$invoice)
            ->with('bank_name',$bank_name)
            ->with('branch_name',ucwords($branch_name))
            ->with('state_name',$state_name)
            ->with('date',$date)
            ->with('netPayableAmount',$netPayableAmount);
        break;

        case 'Submit Only': 
            $request->session()->flash('alert-success', trans('message.invoivesavesuccess'));
            return redirect('generateInvoice');
        break;
        }
        
        
        
    }

    /**
     * Print the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printpreview($invoice)
    {
        if(!empty($invoice)) {
            $invoice = \App\Helpers\Common::decodeParam($invoice);
            $invoiceData = Invoice::select('*')->with('invoiceDetails')->where('invoice', $invoice)->get();
            //echo $invoiceData[0]['totalamount'];
            //$this->p($invoiceData[0]->invoiceDetails); die();
            //$this->p($invoiceData); die();
            return view('admin.invoice.printpreview')
                ->with('page_title',$this->page_title)
                ->with('breadcrumb',$this->breadcrumb)
                ->with('listing',$this->listing)
                ->with('invoiceData',$invoiceData);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
