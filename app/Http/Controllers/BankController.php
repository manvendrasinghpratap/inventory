<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PincodeStateCityMapping;
use App\BankDetails;
use App\Http\Requests\BankRequest;

class BankController extends Controller
{
    protected $breadcrumb = array('/banks'=>'Banks List','/addbank'=>'Add New Bank');
    protected $listing = array('/addbank'=>'Add New Bank');
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $bankdetails = BankDetails::select('bank_details.*')->orderBy('id', 'desc')
            ->paginate($this->rowPerPage);
            return view('admin.bank.index')->with('page_title','Banks')
            ->with('bankdetails',$bankdetails)
            ->with('listing',$this->listing)
            ->with('breadcrumb',$this->breadcrumb);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
		$breadcrumb = array();
		$pincode=array();
		//$pincode = PincodeStateCityMapping::pluck('pincode','id')->toArray();
		return view('admin.bank.create')
				->with('page_title','Banks')
                ->with('breadcrumb',$this->breadcrumb)
                ->with('listing',$this->listing);
				return redirect('banks');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
		$data = $request->all();
		$bankDetails = new BankDetails;
		$bankDetails->bank_name                                     =   $request->name;		
		$bankDetails->status                                        =   1;
		$bankDetails->save();
        $request->session()->flash('alert-success', trans('message.bankaddedsuccess'));
        return redirect('banks');
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
        $id=  \App\Helpers\Common::decodeParam($id);
        $breadcrumb = array();
        $pincode=array();      
        $bankdetails = BankDetails::select('bank_details.*')
                        ->where('bank_details.id', $id)
                        ->first();
        return view('admin.bank.edit')->with('page_title','Banks')
            ->with('bankdetails',$bankdetails)
            ->with('listing',$this->listing)
            ->with('breadcrumb',$this->breadcrumb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request)
    {
        $id = $request->id;
        if(!empty($id)) {
            $bankDetails = BankDetails::find($id);
            $bankDetails->bank_name = $request->name;
            $bankDetails->save();
            $request->session()->flash('alert-success', trans('message.bankupdatesuccess'));
            return redirect('banks');
        }
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
    public function ajaxIndex()
    {
        $breadcrumb = array('/banks'=>'Banks','/addbank'=>'Add New Bank');
        $bankdetails = BankDetails::select('bank_details.*','bank_types.name as bank_type_name','pincode_state_city_mapping.pincode','pincode_state_city_mapping.city_id','pincode_state_city_mapping.state_id')
            ->join('bank_types','bank_details.bank_type_id','=','bank_types.id')
            ->join('pincode_state_city_mapping','bank_details.pincode_state_city_mapping_id','=','pincode_state_city_mapping.id')
            ->get();
        return view('admin.ajax.bankindex')->with('page_title','Banks')
            ->with('bankdetails',$bankdetails)
            ->with('breadcrumb',$breadcrumb);
    }

}
