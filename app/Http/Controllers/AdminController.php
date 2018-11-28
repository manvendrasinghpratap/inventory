<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Product;
use App\Invoice;
use App\BankDetails;
use Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $this->p(Auth::user());
            return redirect()->route('dashboard');
        }
        $breadcrumb = array('/invoices'=>'Invoices','/generateInvoice'=>'Generate New Invoice');
        return view('admin.dashboard')->with('page_title','Dashboard')->with('breadcrumb',$breadcrumb);
    }
    public function dashboard()
    {
        $totalinvoices = Invoice::count();
        $todaysinvoices = Invoice::where('created_at', '>=', Carbon\Carbon::today())->count();
        //$this->p($todaysinvoices); die();
        $totalProducts = Product::count();
        $totalBanks = BankDetails::count();
        $breadcrumb = array('/invoices'=>'Invoices','/generateInvoice'=>'Generate New Invoice');
        return view('admin.dashboard')
            ->with('page_title','Dashboard')
            ->with('breadcrumb',$breadcrumb)
            ->with('totalProducts',$totalProducts)
            ->with('todaysinvoices',$todaysinvoices)
            ->with('totalBanks',$totalBanks)
            ->with('totalinvoices',$totalinvoices);
    }
    public function login(){
        //return view('user.dashboard');
    }
}
