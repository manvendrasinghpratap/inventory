<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PincodeStateCityMapping;
use App\State;
use App\City;
use App\Categories;
use App\BankDetails;
use App\Product;
use App\Invoice;
use Common;
use DB;
use Session;
use Config;


class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($tableName,$id)
    {
        if(!empty(Config::get('app.mysql_table_prefix'))){
            //$tableName  =   Config::get('app.mysql_table_prefix').$tableName;
        }
        echo $status = DB::table($tableName)->where('id','=',$id)->delete();
    }
    public function destroyByCustomColumn($tableName,$id,$columnName)
    {
        echo $status = DB::table($tableName)->where($columnName,'=',$id)->delete();
    }

	public function getStatenames($pincode_state_city_mapping_id){
		echo $ddd = Common::getBankState($pincode_state_city_mapping_id);
	}
	public function getCitynames($pincode_state_city_mapping_id){
		echo $ddd = Common::getBankCity($pincode_state_city_mapping_id);
	}
	public function getLocationArea($pincode_state_city_mapping_id){
		echo $ddd = Common::getLocationArea($pincode_state_city_mapping_id);
	}
	public function banktypelist($search){

    }
    public function getproductDetails($product_id){
        $data = array();        
        $categoryArray = Categories::where('product_id',$product_id)->pluck('name','id')->toArray();
        /*return view('admin.invoice.categorydropdown')
                        ->with('categoryArray',$categoryArray);
            exit();*/
       // $this->p($categoryArray);
        if(count($categoryArray)>1){
            return view('admin.invoice.categorydropdown')
                        ->with('categoryArray',$categoryArray);
            exit();
        }
        else{
            foreach($categoryArray as $key=>$value){
                $data['id'] = $key;
                $data['value'] = $value;
                //return json_decode($data);
                //exit();
            }
           // json_decode($data);
            echo json_encode($data); exit;
            
        }
    }
    
    /**/
    public function getRateAndGst($category_id)
    {
        $rate = Categories::where('id',$category_id)->with('productDetails')->first();
        $productGst = $rate->productDetails->gst;
        $data['rate'] = $rate['rate'];
        $data['gst'] = $rate->productDetails->gst;
        print json_encode($data);
        exit();
    }
    /**/
    
    /* Get Product Dropdown start */
    public function addProductDropdown($product_id,$tr_id)
    {
        //$product = Product::pluck('name','id')->toArray();
        $productsArray = Session::get('productsArray');
        $product = $productsArray[0];
        return view('admin.invoice.addnewrow')
                        ->with('products',$product)
                        ->with('tr_id',$tr_id);
        exit;
        
    }
    /* Get Product Dropdown End */
    /**/
    public function checkInvoice($invoice)
    {
        $invoiceData = Invoice::where('invoice', $invoice)->count();
        
        echo $invoiceData;
        exit;

    }
}
